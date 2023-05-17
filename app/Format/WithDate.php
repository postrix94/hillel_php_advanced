<?php

namespace App\Format;

use App\Format\Interfaces\IFormat;

class WithDate implements IFormat
{
    public function getFormat(string $string): string
    {
        return date('Y-m-d H:i:s') . $string;
    }
}