<?php

namespace App\Http\Controllers;

use App\Chanel;
use Illuminate\Http\Request;

class ChanelController extends Controller
{
    public function index(){
        return view('chanel.index');
    }
}
