<?php


namespace App\Services;


use App\Models\Folder;
use Core\Session;

class FolderService
{
    public static function delete(int $id): bool
    {
        $folder = Folder::find($id);

        if($folder) {
           return $folder->delete($id);
        }

        return $folder;
    }

    public static function update(int $id, array $fields): bool {
       $folder = Folder::find($id);

       if(!$folder) return false;

       return $folder->update($fields);
    }


}