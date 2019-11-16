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

}
