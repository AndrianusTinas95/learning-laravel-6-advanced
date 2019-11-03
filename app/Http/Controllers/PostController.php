<?php

namespace App\Http\Controllers;

use App\Chanel;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        return $posts  = Post::allPost();
        
        return view('post.index',compact('posts'));
    }

    public function create(){
        return view('post.create');
    }
}
