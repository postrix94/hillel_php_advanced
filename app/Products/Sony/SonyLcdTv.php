<?php


namespace App\Products\Sony;

use App\Products\Interfaces\ILcdTV;

class SonyLcdTv implements ILcdTV
{
    public function getLcdTV(): void
    {
       echo "Sony Lcd TV" . "<br>";
    }
}