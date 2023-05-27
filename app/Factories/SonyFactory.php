<?php

namespace App\Factories;

use App\Products\Interfaces\{ILcdTV,ILedTV};
use App\Products\Sony\{SonyLcdTv,SonyLedTv};


class SonyFactory implements Interfaces\FactoryTV
{
    public function createLcdTv(): ILcdTV
    {
        return new SonyLcdTv();
    }

    public function createLedTv(): ILedTV
    {
        return new SonyLedTv();
    }
}