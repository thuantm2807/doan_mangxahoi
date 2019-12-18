<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserFriend;
use Auth;

class FriendController extends Controller
{
    private $friend;

    public function __construct(){
    	$this->friend = new UserFriend;
    }

    public function getByPrimaryKey(Request $request){
    	$userId = Auth::user()->id;

    	$get = $this->friend->getByPrimaryKey($userId, $request->friendId);

    	$follow = 0;
    	if($get){
    		$follow = 1;
    	}

    	return response()->json(['status'=>1,'data'=>['follow'=>$follow]]);
    }

    public function deleteByPrimaryKey(Request $request){
    	$userId = Auth::user()->id;

    	$this->friend->deleteByPrimaryKey($userId, $request->friendId);

    	return response()->json(['status'=>1,'data'=>['msg'=>"UnFollowed successfully"]]);
    }

    public function createByPrimaryKey(Request $request){
    	$userId = Auth::user()->id;

    	$arr = [
    		'user_id' => $userId,
    		'friend_id' => $request->friendId,
    		'relationship' => 1
    	];
    	
    	$this->friend->createByArr($arr);

    	return response()->json(['status'=>1,'data'=>['msg'=>"Followed successfully"]]);
    }
}
