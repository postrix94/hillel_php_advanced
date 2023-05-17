<?php


namespace App\Format;

use App\Format\Interfaces\IFormat;

class Raw implements IFormat
{
    public function getFormat(string $string):string {
        return $string;
    }
}