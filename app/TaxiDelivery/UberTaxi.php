<?php

namespace App\TaxiDelivery;

use App\Car\Car;
use App\TaxiDelivery\Interfaces\ITaxiDelivery;

class UberTaxi implements ITaxiDelivery
{
    public function econom():Car
    {
        return new Car('Huinday', 'Accent', 120);
    }

    public function standart():Car
    {
        return new Car('Audi', 'A4', 250);
    }

    public function lux():Car
    {
        return new Car('BMW', '7', 700);
    }
}