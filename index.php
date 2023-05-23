<?php


use App\Creator\Abstraction\TaxiCreator;
use App\Creator\BoltCreator;
use App\Creator\UberCreator;

require __DIR__ . '/vendor/autoload.php';

taxiDelivery(new UberCreator(), 'lux');
taxiDelivery(new BoltCreator());
function taxiDelivery(TaxiCreator $taxi, string $type = 'standart') {
    $car = $taxi->getTaxi($type);

    echo get_class($taxi) . "</br>";
    echo $car->getModel() . "</br>";
    echo $car->getPrice() . "</br>";
    echo "<hr>";
}
