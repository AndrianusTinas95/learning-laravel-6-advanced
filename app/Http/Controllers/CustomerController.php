<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository =  $customerRepository;
    }
    public function index(){
        $customers = $this->customerRepository->all();

        return $customers;
    }

    public function show($costumerID){
        return $this->customerRepository->findById($costumerID);
    }

    public function update($costumerID){
        $this->customerRepository->update($costumerID);

        return redirect('customers/'.$costumerID); 
    }

    public function destroy($costumerID){
        $this->customerRepository->delete($costumerID);

        return redirect('customers'); 
    }
}
