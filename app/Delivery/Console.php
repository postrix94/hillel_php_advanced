<?php


namespace App\Delivery;

use App\Delivery\Interfaces\IDelivery;

class Console implements IDelivery
{
    public function deliver(string $format)
    {
        echo "Вывод формата ({$format}) в консоль";
    }

}