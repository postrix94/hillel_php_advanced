<?php

namespace App\Delivery;

use App\Delivery\Interfaces\IDelivery;

class Email implements IDelivery
{
    public function deliver($format)
    {
        echo "Вывод формата ({$format}) по имейл";
    }

}