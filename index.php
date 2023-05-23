<?php


use App\Creator\BoltCreator;
use App\Creator\TaxiCreator;
use App\Creator\UberCreator;

require __DIR__ . '/vendor/autoload.php';

taxiDelivery(new UberCreator(), 'lux');

function taxiDelivery(TaxiCreator $taxi, string $type = 'standart') {
    $car = $taxi->getTaxi($type);

    echo $car->getModel() . "</br>";
    echo $car->getPrice();
}
