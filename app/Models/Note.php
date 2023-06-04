<?php

namespace App\Models;

use Core\Model;

class Note extends Model
{
    static protected string|null $tableName = 'notes';

    static protected function getTableName():string {
        return static::$tableName;
    }
}