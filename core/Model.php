<?php

namespace Core;

use Core\Traits\Queryable;

abstract class Model
{
    use Queryable;

    static protected function getTableName():string {
        return static::$tableName;
    }
}