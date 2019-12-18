<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "post";

    protected $fillable = [
        'id',
        'user_id',
        'description',
        'like',
        'share',
        'created_at',
        'updated_at',
        'status',
    ];

    protected $guarded = [];


    public function getByUserId($userId, $take, $skip){
        return $this->select(
                'post.id as post_id',
                'description',
                'like',
                'share',
                'post.created_at as post_created_at',
                'users.name as name',
                )
                ->where('user_id',$userId)
                ->where('post.status',1)
                ->orderBy("post.id","desc")
                ->join("users","users.id","user_id")
                ->take($take)
                ->skip($skip)
                ->get();
    }

    public function getByArrUserId($arrUserId, $take, $skip){
        return $this->select(
                'post.id as post_id',
                'description',
                'like',
                'share',
                'post.created_at as post_created_at',
                'users.name as name',
                )
                ->whereIn('user_id',$arrUserId)
                ->where('post.status',1)
                ->orderBy("post.id","desc")
                ->join("users","users.id","user_id")
                ->take($take)
                ->skip($skip)
                ->get();
    }

    public function createByArr($arr){
        return $this->create($arr);
    }

    // public function getAll(){
    //     return $this->select(
    //             'post.id as post_id',
    //             'description',
    //             'like',
    //             'share',
    //             'post.created_at as post_created_at',
    //             'users.name as name',
    //             )
    //             ->where('status',1)
    // }

}
