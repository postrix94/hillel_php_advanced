<?php

namespace App\Delivery\Interfaces;

interface IDelivery
{
    public function deliver(string $format);
}