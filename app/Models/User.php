<?php

namespace App\Models;

use App\Services\Auth\AuthService;
use Core\Model;

class User extends Model
{
    static protected string|null $tableName = 'users';

    static public function getOtherUsers(): array {
        return static::selectAll()->where('id', AuthService::user()->id, '!=')->orderBy(['id' => 'ASC'])->get();
    }

    public function folders() {
       return  Folder::getFolders($this->id);
    }

}