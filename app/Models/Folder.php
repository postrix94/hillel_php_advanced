<?php

namespace App\Models;

use Core\Model;

class Folder extends Model
{
    static protected string|null $tableName = 'folders';

    static protected function getTableName():string {
        return static::$tableName;
    }
}