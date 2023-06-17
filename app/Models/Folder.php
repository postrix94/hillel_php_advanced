<?php

namespace App\Models;

use Core\Model;

class Folder extends Model
{
    static protected string|null $tableName = 'folders';
    protected const GENERAL_FOLDER_ID = 0;

    static function getFolders(int $id): array {
       return static::select(['*'])->where('author_id', $id)
           ->orWhere('author_id', static::GENERAL_FOLDER_ID)
          ->orderBy('id')->get();
    }

}