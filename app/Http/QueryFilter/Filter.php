<?php

namespace App\Http\QueryFilter;

use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    
    public function handle($request, Closure $next){
        if(! request()->has($this->filter()) ){
            return $next($request);
        }

        $builder = $next($request);

        return $this->applayFilter($builder);

    }

    protected abstract function applayFilter($builder);

    /**
     * returning class name 
     */
    protected function filter(){
        return Str::snake(class_basename($this));
    }
}