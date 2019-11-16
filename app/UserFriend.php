<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserFriend extends Model
{
    protected $table = "user_friend";

    protected $fillable = [
        'id',
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

        self::insert($arr);

        return 1;
    }

    private function randArrInsert($maxUserId){
        $arr = [];
        for ($i=0; $i < 3; $i++) { 
            $userId = rand(1, $maxUserId);

            $friendId = rand(1, $maxUserId);

            while ($friendId == $userId) {
                $friendId = rand(1, $maxUserId);
            }

            $arr[] = [           
                'user_id' => $userId,
                'friend_id' => $friendId,
                'relationship' => 1
            ];
        }
        return $arr;
    }
}
