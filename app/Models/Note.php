<?php

namespace App\Models;

use Core\Model;

class Note extends Model
{
    static protected string|null $tableName = 'notes';
    protected const LENGTH_PREVIEW_TEXT = 30;

    public function getDateCreate(): string {
        return date("d-m-Y", strtotime($this->created_at));
    }

    public function previewNoteText(): string {
        $text = $this->content;

        if(strlen($text) > static::LENGTH_PREVIEW_TEXT) {
            $text = substr($text,0 , static::LENGTH_PREVIEW_TEXT);
        }

        return $text .= '...';
    }

    public function sharedNote(): array {
       return SharedNote::select(['user_id'])->where('note_id', $this->id)->pluck('user_id');
    }

    public function isSharedNoteUser(int $noteId, int $userId): bool {
        return (bool) SharedNote::selectAll()->where('note_id', $noteId)->andWhere('user_id', $userId)->get();
    }


}