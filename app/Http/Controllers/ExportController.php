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

    public function exportNonDirectionByName(){
    	$arr = $this->getArrNonDirection();

    	// echo $data; die;

    	Excel::create('NonDirectionByName',function($excel) use ($arr){

            $excel ->sheet('Table', function ($sheet) use ($arr)
            {             
            	$i = 1;
                foreach ($arr as $key => $value) {   
                    $checkDirection = $this->userFriend->getByPrimaryKey($value['friend_id'], $value['user_id']);
                    if(!$checkDirection){
                        continue;
                    }                	

                	$userName = $this->user->getNameById($value['user_id']);         
                	// echo ($userName); 	
                	$userFriendName = $this->user->getNameById($value['friend_id']);    

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

    private function getArrNonDirection(){
        $data = $this->userFriend->getAll();
        
        // echo $data; die;
        $arr = [];
        foreach ($data as $key => $value) {
            $checkDirection = $this->userFriend->getByPrimaryKey($value->friend_id, $value->user_id);
            if(!$checkDirection){
                continue;
            }

            $check = 0;
            for($i = 0; $i < $key; $i++){
                if( isset($arr[$i]) ){ //dd('dd');
                    if($arr[$i]['user_id'] == $value->friend_id && $arr[$i]['friend_id'] == $value->user_id){ //dd('dd');
                        $check = 1; break;
                    }
                } //echo $i."\n";
            } //echo "<hr>";

             if($check == 1){
                // dd($check);
                continue;
             }

            $arr[] = [
                'user_id' => $value->user_id,
                'friend_id' => $value->friend_id,
            ];
        } 
        return $arr;
    }

    public function exportNonDirectionById(){
    	$arr = $this->getArrNonDirection();

        // dd($arr);

    	Excel::create('NonDirectionById',function($excel) use ($arr){

            $excel ->sheet('Table', function ($sheet) use ($arr)
            {             
            	$i = 1;                

                foreach ($arr as $key => $value) {               	
              
	            	$sheet->cell('A'.$i, $value['user_id']); 
	            	$sheet->cell('B'.$i, $value['friend_id']); 

                	$i++;
                }      
                
            });
        })->download("csv");
    }


    public function exportDirectionByName(){
        $data = $this->userFriend->getAll();

        // echo $data; die;

        Excel::create('DirectionByName',function($excel) use ($data){

            $excel ->sheet('Table', function ($sheet) use ($data)
            {             
                $i = 1;
                foreach ($data as $key => $value) {   
                    $checkDirection = $this->userFriend->getByPrimaryKey($value->friend_id, $value->user_id);
                    if($checkDirection){
                        continue;
                    }                   

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

    public function exportDirectionById(){
        $data = $this->userFriend->getAll();
        
        // echo $data; die;

        Excel::create('DirectionById',function($excel) use ($data){

            $excel ->sheet('Table', function ($sheet) use ($data)
            {             
                $i = 1;
                foreach ($data as $key => $value) {                 
                    $checkDirection = $this->userFriend->getByPrimaryKey($value->friend_id, $value->user_id);
                    if($checkDirection){
                        continue;
                    }
              
                    $sheet->cell('A'.$i, $value->user_id); 
                    $sheet->cell('B'.$i, $value->friend_id); 

                    $i++;
                }      
                
            });
        })->download("csv");
    }
}
