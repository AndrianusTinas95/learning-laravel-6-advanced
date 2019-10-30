<?php

namespace App\Orders;

use App\Billing\PayMentGatewayContract;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PayMentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;    
    }

    public function all(){
        $this->paymentGateway->setDiscount(500);

        return [
            'name'      => 'nanas',
            'address'   => '123',
        ];
    }
}