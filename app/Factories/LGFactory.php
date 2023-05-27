<?php


namespace App\Factories;

use App\Factories\Interfaces\FactoryTV;
use App\Products\LG\{LGLcdTv, LGLedTv};
use App\Products\Interfaces\{ILcdTV,ILedTV};

class LGFactory implements FactoryTV
{

    public function createLcdTv(): ILcdTV
    {
        return new LGLcdTv();
    }

    public function createLedTv(): ILedTV
    {
        return new LGLedTv();
    }
}