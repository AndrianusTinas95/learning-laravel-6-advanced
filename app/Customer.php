<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function format(){
        return [
            'customer_id'   => $this->id,
            'customer_name' => $this->name,
            'created_by'    => $this->user->email,
            'last_updated'  => $this->updated_at->diffForHumans()
        ];
    }
}
