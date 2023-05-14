<?php

namespace App\Product;


use App\Product;

abstract class AbstractProduct
{

    protected array $products = [];

    public function get($name): string {}

    public function set($name, $value): void {}

    public abstract function saveProduct($productName): void;

    public abstract function updateProduct($productName):void;

    public abstract function deleteProduct($productName):void;

    public abstract function showProduct($productName):void;

    public abstract function printProduct($productName);
}