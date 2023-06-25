<?php

namespace App\Models;

use App\Services\Auth\AuthService;
use Core\Model;

class Folder extends Model
{
    static protected string|null $tableName = 'folders';
    protected const GENERAL_FOLDER_ID = 0;

    static function getFolders(int $userId): array {
       $folders = static::selectAll()->where('author_id', $userId)
           ->orWhere('author_id', static::GENERAL_FOLDER_ID)
          ->orderBy(['id' => 'ASC'])->get();

//        array_unshift($folders, ["Shared" => static::sharedNotes()]);
        return $folders;
    }

    public function delete(int $id): bool
    {
        if($id === static::GENERAL_FOLDER_ID) return false;
        return parent::delete($id);
    }

    public function notes(): array {
      return Note::selectAll()->where('folder_id', $this->id)->andWhere('author_id', AuthService::user()->id)
          ->orderBy([
              'pinned' => 'DESC',
              'completed' => 'ASC',
              'created_at' => 'DESC']
          )->get();
    }

    public function allNotes(): array {
        return Note::selectAll()->where('author_id', AuthService::user()->id)
            ->orderBy([
                'pinned' => 'DESC',
                'completed' => 'ASC',
                'created_at' => 'DESC'
            ])->get();
    }

    static protected function sharedNotes(): array {
        return Note::selectAll()->join("shared_notes", "id", "note_id")
           ->where('author_id', AuthService::user()->id, '!=')->get();
    }


    public function isGeneral(): bool {
        return $this->id === 1;
    }

}