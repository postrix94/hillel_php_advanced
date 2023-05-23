<?php

namespace App\Car;

 class Car
{
    protected string $model;
    protected string $brand;
    protected float $price;

    public function __construct(string $model,string $brand,float $price)
    {
        $this->model = $model;
        $this->brand = $brand;
        $this->price = $price;
    }

    public function getModel(): string {
        return "Car: {$this->brand} {$this->model}";
    }

    public function getPrice():float {
        return $this->price;
    }
}