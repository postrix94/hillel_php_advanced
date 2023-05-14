<?php

namespace App\Interfaces;

interface IDelivery
{
    public function deliver(string $format);
}