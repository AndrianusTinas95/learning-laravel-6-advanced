<?php

namespace App\Http\Controllers;

use App\Chanel;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create(){
        return view('post.create');
    }
}
