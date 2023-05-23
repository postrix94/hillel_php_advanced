<?php


namespace App\Creator;

use App\TaxiDelivery\BoltTaxi;
use App\TaxiDelivery\Interfaces\ITaxiDelivery;

class BoltCreator extends TaxiCreator {

    protected function createTaxi(): ITaxiDelivery
    {
        return new BoltTaxi();
    }

}