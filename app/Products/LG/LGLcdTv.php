<?php


namespace App\Products\LG;

use App\Products\Interfaces\ILcdTV;

class LGLcdTv implements ILcdTV
{
    public function getLcdTV(): void
    {
        echo "LG Lcd TV" . "<br>";
    }
}