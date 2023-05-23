<?php


namespace App\Creator;


use App\TaxiDelivery\Interfaces\ITaxiDelivery;

abstract class TaxiCreator
{
    abstract protected function createTaxi(): ITaxiDelivery;

    public function getTaxi(string $type) {
        $taxi = $this->createTaxi();

        switch ($type) {
            case 'econom':
                return $taxi->econom();
            case 'standart':
                return $taxi->standart();
            case 'lux':
                return $taxi->lux();
            default:
                throw new \Error("Такого тарифа у нас нет!");
        }
    }

}