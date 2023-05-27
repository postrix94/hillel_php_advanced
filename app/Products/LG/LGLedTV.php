<?php


namespace App\Products\LG;

use App\Products\Interfaces\ILedTV;

class LGLedTV implements ILedTV
{
    public function getLedTV(): void
    {
        echo "LG Led TV" . "<br>";
    }
}