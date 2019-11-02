<?php

namespace App\Http\QueryFilter;

use Closure;

class Status extends Filter
{
    protected function applayFilter($builder){
        /**
         * filter by status -> status get from method filter 
         */
        return $builder->where($this->filter(),request($this->filter()));

    }
}