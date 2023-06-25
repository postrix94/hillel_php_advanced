<?php

namespace App\Controllers;

use App\Models\Folder;
use App\Services\Auth\AuthService;
use App\Services\FolderService;
use App\Validators\Folder\FolderValidator;
use Core\Exception\ClientErrorException;
use Core\Session;

class FoldersController extends \Core\BaseController
{
    const SHARED_FOLDER = 0;

    public function before(string $action): bool
    {
        if (AuthService::check()) {
            return true;
        }

        redirect('login');
    }


    public function index()
    {
        $user = AuthService::user();
        return view('pages/dashboard', ['title' => 'Главная', 'user' => $user, 'activeFolder' => 1]);
    }

    public function show(int $id)
    {
        $user = AuthService::user();

        if($id !== static::SHARED_FOLDER) {
            if (!Folder::find($id)) throw new ClientErrorException("Папка {$id} не найдена!", 404);
        }

        return view('pages/dashboard', ['title' => 'Главная', 'user' => $user, 'activeFolder' => $id]);
    }

    public function store()
    {
        $folder_name = $_POST["folder_name"] ?? null;
        $validator = new FolderValidator();

        if ($validator->validate(compact("folder_name"))) {
            $folderId = Folder::create(['author_id' => AuthService::user()->id, 'title' => $folder_name]);
            responseJson(["url" => "/folder/{$folderId}"], 201);
        }

        responseJson($validator->getErrors(), 422);
    }

    public function update($id)
    {
        $folder_name = $_POST["folder_name"] ?? null;
        $validator = new FolderValidator();

        if (!$validator->validate(compact("folder_name"))) {
            responseJson($validator->getErrors(), 422);
        }

        if (FolderService::update($id, ['title' => $folder_name])) {
            responseJson(["url" => "/folder/{$id}"], 200);
        }

        responseJson(['folder_name' => "Папка не найдена"], 404);
    }

    public function delete($id)
    {
        if (FolderService::delete($id)) {
            Session::flash("message", "Папка удалена!");
            Session::flash("alert", "success");
        } else {
            Session::flash("message", "Папка не удалена!");
            Session::flash("alert", "danger");
        }

        redirect('dashboard');;
    }
}