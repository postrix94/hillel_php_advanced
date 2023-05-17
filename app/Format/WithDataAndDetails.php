<?php


namespace App\Format;


class WithDataAndDetails extends WithDate
{
    public function getFormat(string $string): string
    {
        return parent::getFormat($string) . ' - With some details';
    }
}