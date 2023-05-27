<?php


namespace App\Factories\Interfaces;

use App\Products\Interfaces\{ILedTV,ILcdTV};

interface FactoryTV
{
    public function createLcdTv(): ILcdTV;

    public function createLedTv(): ILedTV;

}