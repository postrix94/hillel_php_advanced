<?php


namespace App\Validators\Folder;


use App\Models\Folder;
use App\Services\Auth\AuthService;

class FolderValidator extends \App\Validators\Base\BaseValidator
{

    protected array $rules = [
        'folder_name' => '/^[0-9A-Za-z\s]{5,50}/i',
    ];

    protected array $errors = [
        "folder_name" => "Название папки должно быть от 5 до 50 символов",
    ];


    public function validate(array $fields = []): bool
    {
        foreach ($fields as $key => $value) {
            if (!empty($this->rules[$key]) && preg_match($this->rules[$key], trim($value))) {
                unset($this->errors[$key]);
            }
        }

        if($this->checkNameFolder($fields['folder_name'])) {
            $this->setError('folder_name', "Такая папка уже существует!");
        }

        return empty($this->errors);
    }

    protected function checkNameFolder(string $folderName): bool {
       return (bool) Folder::select(['title'])->where('author_id', AuthService::user()->id)->andWhere('title', $folderName)->get();
    }

}