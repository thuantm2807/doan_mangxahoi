<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserFriend;
use App\User;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
	private $userFriend;

	public function __construct(){
		$this->userFriend = new UserFriend;
		$this->user = new User;
	}

    public function export(){
    	$data = $this->userFriend->getAll();

    	// echo $data; die;

    	Excel::create('seed',function($excel) use ($data){

            $excel ->sheet('Table', function ($sheet) use ($data)
            {             
            	$i = 1;
                foreach ($data as $key => $value) {                   	

                	$userName = $this->user->getNameById($value->user_id);         
                	// echo ($userName); 	
                	$userFriendName = $this->user->getNameById($value->friend_id);    

                	if(!$userName || !$userFriendName){
                		continue;
                	}  
                	
	            	$sheet->cell('A'.$i, $userName); 
	            	$sheet->cell('B'.$i, $userFriendName); 

                	$i++;
                }      
                
            });
        })->download("csv");

    }
}
