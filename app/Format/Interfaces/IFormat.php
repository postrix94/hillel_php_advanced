<?php


namespace App\Format\Interfaces;


interface IFormat
{
    public function getFormat(string $string): string;
}