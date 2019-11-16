<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    protected $fillable = [
        'id',
        'post_id',
        'user_id',
        'description',
        'like',
        'parent_id',
        'created_at',
        'updated_at',
        'status',
    ];

    protected $guarded = [];

}
