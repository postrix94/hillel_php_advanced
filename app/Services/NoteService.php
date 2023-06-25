<?php

namespace App\Services;

use App\Models\Note;
use App\Models\SharedNote;
use App\Services\Auth\AuthService;

class NoteService
{
    protected const NO_SHARED_NOTE = "default";
    protected SharedNoteService $sharedNote;

    public function __construct()
    {
        $this->sharedNote = new SharedNoteService();
    }

     public function create(array $fields): int
    {
        $fields['author_id'] = AuthService::user()->id;
        $fields['pinned'] = isset($fields['pinned']) ? 1 : 0;
        $shared = $fields['shared'];
        unset($fields['shared']);

        $noteId = Note::create($fields);

        if ($this->checkSharedNote($shared)) {
            $this->sharedNote->shared($noteId, array_values($shared));
        }

        return $noteId;
    }

    public function update(array $fields, int $noteId): bool {
        $note = Note::find($noteId);
        if(!$note || $note->author_id !== AuthService::user()->id) return false;

        $fields['pinned'] = isset($fields['pinned']) ? 1 : 0;
        $fields['completed'] = isset($fields['completed']) ? 1 : 0;
        $shared = $fields['shared'];
        unset($fields['shared']);

        $note->update($fields);
        $this->checkSharedNote($shared);
        $this->sharedNote->update(array_values($shared), $note->id);

        return true;
    }

    public function delete(int $id):bool {
       $note = Note::find($id);
       if(!$note || $note->author_id !== AuthService::user()->id) return false;

       $note->delete($note->id);

       return $this->sharedNote->delete($id);
    }

     protected function checkSharedNote(array &$shared): bool
    {
        if (in_array(static::NO_SHARED_NOTE, $shared)) {
            $index = array_search(static::NO_SHARED_NOTE, $shared);
            unset($shared[$index]);
        }

        return (bool)count($shared);
    }


}