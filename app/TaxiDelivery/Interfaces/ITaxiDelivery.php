<?php


namespace App\TaxiDelivery\Interfaces;

use App\Car\Car;

interface ITaxiDelivery
{
    public function econom(): Car;

    public function standart(): Car;

    public function lux(): Car;
}