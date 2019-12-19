<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index(){
    	$userId = Auth::user()->id;
    	$data = [
    		'userId' => $userId
    	];

        return view('dashboard.index',$data);
    }
}
