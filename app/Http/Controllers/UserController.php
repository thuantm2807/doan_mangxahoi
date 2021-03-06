<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    private $user;
    // private $user;

    public function __construct(){
        $this->user = new User;
    }

    public function getLogin(){
    	if(Auth::check()){
    		return back();
    	}

    	return view('user.login');
    }

    public function postLogin(Request $request){
    	$this->validate($request,[
    		'email' =>'required|email',
    		'password' => 'required'
    	],[

    	]);


    	$email = $request->email;
    	$password = $request->password;

    	if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    			return redirect()->route('home');
    	} else {
    			return back()->with('error','Login failed. Please recheck and try again.');
    	}
    }

    public function logout() {
	   Auth::logout();
	   return redirect()->route('login');
	}


    public function getWall($userId){
        $user = $this->user->getById($userId);

        $data = [
            'user' => $user,
        ];

        return view("user.wall", $data);
    }

}
