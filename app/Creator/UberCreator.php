<?php


namespace App\Creator;

use App\TaxiDelivery\UberTaxi;
use App\TaxiDelivery\Interfaces\ITaxiDelivery;

class UberCreator extends TaxiCreator
{
    public function createTaxi(): ITaxiDelivery
    {
        return new UberTaxi();
    }
}