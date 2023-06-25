<?php

namespace App\Services;
use App\Models\SharedNote;

class SharedNoteService
{
    public function shared(int $noteId, array $usersId): void {
        foreach ($usersId as $id) {
            SharedNote::create(['note_id' => $noteId, 'user_id' => $id]);
        }
    }

    public function update(array $usersId, int $noteId):void {
        $this->delete($noteId);
        $this->shared($noteId, $usersId);
    }

    public function delete(int $noteId): bool {
        $sharedRelations = SharedNote::selectAll()->where('note_id', $noteId)->get();
        if(!count($sharedRelations)) return true;

        foreach ($sharedRelations as $relation) {
            $relation->deleteBy('note_id', $noteId);
        }

        return true;
    }




}