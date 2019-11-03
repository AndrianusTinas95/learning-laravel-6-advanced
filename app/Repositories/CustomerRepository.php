<?php

namespace App\Repositories;

use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all(){
        return Customer::orderBy('name')
            ->with('user')
            ->where('active',1)    
            ->get()
            ->map->format();
        // return Customer::orderBy('name')
        //     ->with('user')
        //     ->where('active',1)    
        //     ->get()
        //     ->map(function($customer){
        //         return $this->format($customer);
        //     });

    }

    public function findById($customerId){
        return Customer::where('id',$customerId)
            ->where('active',1)
            ->with('user')
            ->firstOrFail()
            ->format();
        // $customer = Customer::where('id',$customerId)
        //     ->where('active',1)
        //     ->with('user')
        //     ->firstOrFail();

        // return $this->format($customer);
    }

    public function findByname(){
        // 
    }

    public function update($customerId){
        $customer = Customer::where('id',$customerId)->firstOrFail();

        $customer->update(request()->only('name'));

    }

    public function delete($customerId){
        $customer = Customer::where('id',$customerId)->delete();

    }

    // public function format($customer){
    //     return [
    //         'customer_id'   => $customer->id,
    //         'customer_name' => $customer->name,
    //         'created_by'    => $customer->user->email,
    //         'last_updated'  => $customer->updated_at->diffForHumans()
    //     ];
    // }

}