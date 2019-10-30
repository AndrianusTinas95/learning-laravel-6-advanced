<?php

namespace App\Billing;

interface PayMentGatewayContract
{
    public function setDiscount($amount);

    public function charge($amount);
}