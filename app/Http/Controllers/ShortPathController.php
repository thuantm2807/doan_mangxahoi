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

    	// $result = new Graph($arr);

        $dest = new Graph($arr);

        // least number of hops between D and C

        $result = $dest->breadthFirstSearch('1', '5');
        echo $dest->getLength($result). ' || '. $dest->getShortPath($result);

        echo "<br/>";
        
    	// dd($arr);
    }

    public function checkUnique(){
    	$arr = $this->userFriend->getArrUnique();
    	dd($arr);
    }
}
