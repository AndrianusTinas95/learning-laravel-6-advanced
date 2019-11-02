<?php

namespace App\Http\QueryFilter;

class MaxCount extends Filter
{

    protected function applayFilter($builder)
    {
        /**
         * take max_count -> max_count get from method filter 
         */
        return $builder->take(request($this->filter()));
    }
}