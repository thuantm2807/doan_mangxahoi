<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserFriend extends Model
{
    protected $table = "user_friend";

    protected $fillable = [
        // 'id',
        'user_id',
        'friend_id',
        'relationship',
        'created_at',
        'updated_at',
        'status',
    ];

    protected $guarded = [];

    public function createSeed(){
        $user = new User;
        $maxUserId = $user->maxId();

        if($maxUserId == 0){
            return "please insert user";
        }

        $arr = $this->randArrInsert($maxUserId);
        // dd($arr);
        $sumSave = 0;
        foreach ($arr as $key => $value) {
            try {
                $arrSave = $arr[$key];
                // dd($arrSave);
                self::insert($arrSave);
                $sumSave++;
            } catch (\Exception $e) {
                \Log::info($e);
                continue;
            }
        }
        // dd($arr);
        

        return $sumSave;
    }

    public function createSeedV2(){
        $getAll = $this->getAll();
        $sumSave = 0;

        foreach ($getAll as $value) {
            try {
                $arrSave = [           
                'user_id' => $value->friend_id,
                'friend_id' => $value->user_id,
                'relationship' => 1
            ];  
            self::insert($arrSave);
            $sumSave++;
            } catch (\Exception $e) {
                continue;
            }
        }
        return $sumSave;
    }

    private function checkUnique($userId, $friendId){
        return self::select("id")
                    ->where("user_id",$userId)
                    ->where("friend_id",$friendId)
                    ->count();
    }

    private function randArrInsert($maxUserId){
        $arr = [];
        // $maxUserId = 7;
        for ($i=0; $i < 50; $i++) { 
            $userId = rand(1, $maxUserId);

            $friendId = rand(1, $maxUserId);

            while($friendId == $userId){
                $friendId = rand(1, $maxUserId);            
            }

            $arr[] = [           
                'user_id' => $userId,
                'friend_id' => $friendId,
                'relationship' => 1
            ];  
            
        }
        // die;
        // dd($arr);
        return $arr;
    }

    public function getAll(){
        return self::where("relationship",1)
            ->where("status",1)
            ->get();
    }

    public function getArrUnique(){
        $arr = [];
        $getAll = $this->getAll();
        // echo $getAll ; die;

        foreach ($getAll as $key1 => $value1) {
            foreach ($getAll as $key2 => $value2) {
                if($key1 == $key2){
                    continue;
                }

                if($value1->user_id == $value2->user_id && $value1->friend_id == $value2->friend_id2){
                    $arr[] = [           
                        'user_id' => $value1->user_id,
                        'friend_id' => $value2->user_id
                    ]; 
                }
            }
        }

        return $arr;
    }

    private function getAllUserId(){
        $arr = [];
        $user = new User;
        $allUser = $user->getAll();

        foreach ($allUser as $value) {
            $arr[$value->id] = [];
        }
        return $arr;
    }

    public function getArr(){
        
        $userFriend = $this->getAll();
        $arrUserId = $this->getAllUserId();
        // $arr = 
        // dd($arrUserId);
        foreach ($arrUserId as $keyArrUserId => $valueArrUserId) {
            // echo $keyArrUserId."<br>";
            foreach ($userFriend as $keyUserFriend => $valueUserFriend) {
                if($keyArrUserId == $valueUserFriend->user_id){

                    array_push($arrUserId[$keyArrUserId], $valueUserFriend->friend_id);

                }
            }

        } 
        // dd($arrUserId);

        return $arrUserId;
    }

    public function getByUserId($userId){
        return $this->select(
                    'friend_id'
                )
                ->where('user_id',$userId)
                ->where('relationship',1)
                ->where('status',1)
                ->get();
    }

    public function formatQueryToArr($query){
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[] = $value->friend_id;
        }
        return $arr;
    }

    public function getByPrimaryKey($userId, $friendId){
        return $this->where('user_id',$userId)
                    ->where('friend_id',$friendId)
                    ->where('status',1)
                    ->first();
    }

    public function deleteByPrimaryKey($userId, $friendId){
        return $this->where('user_id',$userId)
                    ->where('friend_id',$friendId)
                    ->where('status',1)
                    ->delete();
    }

    public function createByArr($arr){
        return $this->create($arr);
    }

    // public function checkDirection($userId, $friendId){
    //     return $this->select('user_id','friend_id')
    //                 ->where('user_id',$friendId)
    //                 ->where('friend_id',$userId)
    //                 ->where('relationship',1)
    //                 ->first();
    // }

    // public function getNameAll(){
    //     return $this->select(
    //         // 'users.name as',
    //         )
    //         ->where("relationship",1)
    //         ->where("user_friend.status",1)
    //         ->join('users','users.id','user_friend.user_id')
    //         ->join('users','users.id','user_friend.friend_id')
    //         ->get();
    // }
    // 
    
    // public function joinUserId(){
    //   return $this->hasOne('users', 'users.id', 'user_friend.user_id');
    // }

    // public function joinUserFriendId(){
    //   return $this->hasOne('users', 'users.id', 'user_friend.friend_id');
    // }
}
