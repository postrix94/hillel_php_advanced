<?php

use App\Factories\Interfaces\FactoryTV;

require __DIR__ . '/vendor/autoload.php';


function getTVFactory(string $model): FactoryTV {
    switch ($model) {
        case 'sony':
            return new \App\Factories\SonyFactory();
        case 'lg':
            return new \App\Factories\LGFactory();
    }

    throw new Exception('Такого производителя нет.');
}

$lgFactory = getTVFactory('lg');
$lgFactory->createLcdTv()->getLcdTV();
$lgFactory->createLedTv()->getLedTV();

$sonyFactory = getTVFactory('sony');
$sonyFactory->createLcdTv()->getLcdTV();
$sonyFactory->createLedTv()->getLedTV();


