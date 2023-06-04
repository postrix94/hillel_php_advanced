<?php

namespace Core;

use Core\Traits\Queryable;

abstract class Model
{
    use Queryable;

    abstract static protected function getTableName():string;
}