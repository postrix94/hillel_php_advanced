<?php

namespace App\Models;

use Core\Model;

class SharedNote extends Model
{
    static protected string|null $tableName = 'shared_notes';

    static protected function getTableName():string {
        return static::$tableName;
    }
}