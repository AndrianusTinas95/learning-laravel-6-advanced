<?php

namespace App\Http\QueryFilter;

use Closure;

class Sort extends Filter
{

    protected function applayFilter($builder)
    {
        /**
         * order by sort -> sort get from method filter 
         */
        return $builder->orderBy('title',request($this->filter()));
    }
}