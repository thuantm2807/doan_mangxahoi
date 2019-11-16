<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public static function get(){
        return self::select('id','name','url','image')
                    ->where('status',1)
                    ->get();
    }
}
