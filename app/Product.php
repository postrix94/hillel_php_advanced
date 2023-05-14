<?php

namespace App;

use App\Product\AbstractProduct;
use App\Traits\{TActionProduct, TUI_Product};

class Product extends AbstractProduct {
    use TActionProduct, TUI_Product;

    protected ActionProduct $action;
    protected UI_Product $productUI;

}