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

    throw new Exception("Производителя {$model} нет.");
}

try {
    $lgFactory = getTVFactory('lg');
    $sonyFactory = getTVFactory('sony');

    $lgFactory->createLcdTv()->getLcdTV();
    $lgFactory->createLedTv()->getLedTV();

    $sonyFactory->createLcdTv()->getLcdTV();
    $sonyFactory->createLedTv()->getLedTV();
}catch (Exception $e) {
    echo $e->getMessage();
}

