<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserFriend;

class SeedController extends Controller
{
    public function createUser(User $user){    	
    	// dd($arr);
    	$check = $user->createSeed();

    	if($check == 1){
    		return "created successfully";

    	}
    }

    public function createUserFriend(UserFriend $userFriend){    	
    	// dd($arr);
    	$check = $userFriend->createSeed();
    	
    	return "created $check rows successfully";    	
    }

    public function createUserFriendV2(UserFriend $userFriend){
        $check = $userFriend->createSeedV2();
        
        return "created $check rows successfully";      
    }
}
