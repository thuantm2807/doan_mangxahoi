<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Helper\Image;
use Auth;

class PostController extends Controller
{
    private $post;

    public function __construct(){
    	$this->post = new Post;
    	$this->imageHelper = new Image;
    }

    public function getPostByUserId(Request $request){
    	$take = 10;
    	$skip = $request->page * $take;

    	$data = $this->post->getByUserId($request->userId ,$take , $skip);

        return response()->json(['status'=>1, 'data'=>$data]);
    }

    public function createPost(Request $request){
    	$description = $this->imageHelper->uploadImageSummerNote($request->description);

    	$arr = [
    		'user_id' => Auth::user()->id,
    		'description' => $description
    	];

    	// dd($request->description);

    	$this->post->createByArr($arr);

    	return response()->json(['status'=>1,'data'=>['msg'=>"Saved successfully"]]);
    }
}
