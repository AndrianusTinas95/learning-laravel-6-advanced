<?php

namespace App\Http\Controllers;

use App\Billing\PayMentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PayMentGatewayContract $paymentGateway){
        // $paymentGateway = new PaymentGateway();
        $order = $orderDetails->all();

        dd($paymentGateway->charge(9000));
    }
}
