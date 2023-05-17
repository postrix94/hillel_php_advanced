<?php

namespace App\Delivery;

use App\Delivery\Interfaces\IDelivery;

class SMS implements IDelivery
{
    public function deliver(string $format)
    {
        echo "Вывод формата ({$format}) в смс";
    }
}