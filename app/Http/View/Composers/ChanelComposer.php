<?php

namespace App\Http\View\Composers;

use App\Chanel;
use Illuminate\View\View;

class ChanelComposer
{
    public function compose(View $view){
        $view->with('chanels',Chanel::orderBy('name','desc')->get());
    }
}