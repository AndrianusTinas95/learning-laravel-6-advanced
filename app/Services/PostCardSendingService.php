<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class PostCardSendingService
{
    private $country;
    private $width;
    private $heigth;

    public function __construct($country,$width,$heigth)
    {
        $this->country = $country;
        $this->width = $width;
        $this->heigth = $heigth;
    }

    public function hallo($message,$email){
        Mail::raw($message,function($message) use($email){
            $message->to($email);
        });

        dump('Postcard was sent with the message: '. $message);

    }

}