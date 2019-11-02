<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Services\PostCard;
use App\Services\PostCardSendingService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

Route::get('/', function () {
    // return Response::errorJson('error code boom');
    dd(Str::partNumber('8675757'));
    // dd(Str::prefix('8675757','ABCD-'));
    return view('welcome');
});

Route::get('/pay','PayOrderController@store');

Route::get('chanels','ChanelController@index');
Route::get('posts/create','PostController@create');

Route::get('/postcard',function(){
    $postService =new  PostCardSendingService('id',4,6); 

    $postService->hallo('Hallo From Nanas \n Ganas id','test@test.com');
});

Route::get('/facades',function(){
     PostCard::hallo('Hallo From Nanas \n Ganas id','test@test.com');
});