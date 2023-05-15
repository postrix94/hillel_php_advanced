<?php

namespace App;

use App\Product\AbstractProduct;

class Product extends AbstractProduct {


    protected ActionProduct $action;
    protected UI_Product $productUI;

    public function saveProduct($productName): void {}

    public function updateProduct($productName):void {}

    public function deleteProduct($productName):void {}

    public function showProduct($productName):void {}

    public function printProduct($productName) {}


}