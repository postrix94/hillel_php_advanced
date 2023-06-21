<?php

namespace App\Models;

use Core\Model;

class Folder extends Model
{
    static protected string|null $tableName = 'folders';
    protected const GENERAL_FOLDER_ID = 0;

    static function getFolders(int $userId): array {
       return static::select(['*'])->where('author_id', $userId)
           ->orWhere('author_id', static::GENERAL_FOLDER_ID)
          ->orderBy('id')->get();
    }

    public function delete(int $id): bool
    {
        if($id === static::GENERAL_FOLDER_ID) return false;
        return parent::delete($id);
    }

}