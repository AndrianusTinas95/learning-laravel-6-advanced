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
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Router;

Route::get('/', function () {
    // return Response::errorJson('error code boom');
    dd(Str::partNumber('8675757'));
    // dd(Str::prefix('8675757','ABCD-'));
    return view('welcome');
});

Route::get('/pay','PayOrderController@store');

Route::get('chanels','ChanelController@index');
Route::get('posts','PostController@index');
Route::get('posts/create','PostController@create');

Route::get('/postcard',function(){
    $postService =new  PostCardSendingService('id',4,6); 

    $postService->hallo('Hallo From Nanas \n Ganas id','test@test.com');
});

Route::get('/facades',function(){
     PostCard::hallo('Hallo From Nanas \n Ganas id','test@test.com');
});

Route::get('/customers','CustomerController@index');
Route::get('/customers/{customer}','CustomerController@show');
Route::get('/customers/{customer}/update','CustomerController@update');
Route::get('/customers/{customer}/delete','CustomerController@destroy');

Route::get('/lazy',function(){
    // $collection = Collection::times(1000000)->map(function($number){
    //     return pow(2,$number);
    // })->all();

    $collection = LazyCollection::times(1000000)->map(function($number){
        return pow(2,$number);
    })->all();

    // dump($collection);
    dd('done');
});

// Route::get('generator',function(){
//     function happyFunction($strings){
//         foreach ($strings as $string) {
//             dump('start');
//             yield $string;
//             dump('end');
//         }
//     }

//     foreach (happyFunction(['one','two','three']) as $result) {
//         // if($result=='two'){
//         //     return;
//         // }
//         dump($result);
//     }
// });

Route::get('generator',function(){
    function nothappyFunction($number){
        $return =[];
        for ($i=1; $i < $number; $i++) { 
            $return[] = $i; 
        }
        return $return;
    }

    function happyFunction($number){
        $return =[];
        for ($i=1; $i < $number; $i++) { 
            yield $i; 
        }
        return $return;
    }

    foreach (happyFunction(10000000) as $number) {
        if($number % 1000 == 0){
            dump('hallo');
        }
    }
});