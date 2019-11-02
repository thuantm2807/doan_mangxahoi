<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListFriends;
use Auth;

class ListFriendsController extends Controller
{
    public function getList()
    {
        $friend = new ListFriends();
        return $friend->getList();       
    }
}
