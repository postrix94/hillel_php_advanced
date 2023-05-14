<?php

namespace App;

use App\Interfaces\IDelivery;
use App\Interfaces\IFormat;

class Logger
{
    private IFormat $format;
    private IDelivery $delivery;

    public function __construct(string $format,string $delivery)
    {
        $this->format = new Format($format);
        $this->delivery = new Delivery($delivery);
    }

    public function log($string)
    {
        $this->delivery->deliver($this->format->getFormat($string));
    }


}