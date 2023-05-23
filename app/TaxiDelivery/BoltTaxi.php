<?php


namespace App\TaxiDelivery;

use App\Car\Car;

class BoltTaxi implements Interfaces\ITaxiDelivery
{

    public function econom():Car
    {
        return new Car('Opel', 'Astra', 100);
    }

    public function standart():Car
    {
        return new Car('Kia', 'Sorento', 220);
    }

    public function lux():Car
    {
        return new Car('Mercedess', 'S600', 500);
    }
}