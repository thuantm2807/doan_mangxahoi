<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Graph;
use App\UserFriend;

class ShortPathController extends Controller
{
	private $userFriend;

	public function __construct(){
		$this->userFriend = new UserFriend;
	}

    public function run(){
    	$arr = $this->userFriend->getArr();
    	// dd($arr);

    	$result = new Graph($arr);

        // least number of hops between D and C
        $result->breadthFirstSearch('1', '14');
        // outputs:
        // D to C in 3 hops
        // D->E->F->C
        echo "<br/>";
        
    }

    public function checkUnique(){
    	$arr = $this->userFriend->getArrUnique();
    	dd($arr);
    }
}
