<?php

namespace App\Controllers;

use App\Models\Folder;
use App\Services\Auth\AuthService;

class FoldersController extends \Core\BaseController
{
    public function before(string $action): bool
    {
       if(AuthService::check()) {
           return true;
       }

       redirect('login');
    }

    public function index() {
        $user = AuthService::user();
        $folders = Folder::getFolders($user->id);

        return view('pages/dashboard', ['title' => 'Главная', 'user' => $user, 'folders' => $folders, 'activeFolder' => 1]);
    }

    public function show(int $id) {
        $user = AuthService::user();
        $folders = Folder::getFolders($user->id);

        return view('pages/dashboard', ['title' => 'Главная', 'user' => $user, 'folders' => $folders, 'activeFolder' => $id]);
    }

    public function store() {
       $folderName = $_POST["folder_name"] ?? null;

       dd($folderName);
    }
}