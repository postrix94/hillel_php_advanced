<?php


namespace App\Products\Sony;

use App\Products\Interfaces\ILedTV;

class SonyLedTv implements ILedTV
{

    public function getLedTV(): void
    {
        echo "Sony Led TV" . "<br>";
    }
}