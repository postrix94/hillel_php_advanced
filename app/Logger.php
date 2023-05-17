<?php

namespace App;

use App\Delivery\Interfaces\IDelivery;
use App\Format\Interfaces\IFormat;

class Logger
{
    private IFormat $format;
    private IDelivery $delivery;

    public function __construct(IFormat $format,IDelivery $delivery)
    {
        $this->format = $format;
        $this->delivery = $delivery;
    }

    public function log(string $string): void
    {
        $this->delivery->deliver($this->format->getFormat($string));
    }


}