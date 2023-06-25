<?php

namespace App\Validators\Note;

use App\Validators\Base\BaseValidator;

class ValidatorNote extends BaseValidator
{
    protected array $fieldsAllowed = ['title', 'content', 'folder_id', 'shared', 'pinned', 'completed'];

    protected array $rules = [
        'title' => '/^[0-9A-Za-z\s]{5,100}/i',
        'content' => '/^[0-9A-Za-z\s]{10,255}/i'
    ];

    protected array $errors = [
        "title" => "Заголовок заметки должен быть от 5 до 50 символов",
        "content" => "Текст заметки должен быть от 10 до 255 символов",
    ];

    public function checkAllowedFields(array $keys, array $values): array {
        foreach ($keys as $index => $value) {
            if(!in_array( $value,$this->fieldsAllowed)) {
                unset($keys[$index]);
                unset($values[$index]);
            }
        }

       return array_combine($keys, $values);
    }

    public function validate(array $fields = []): bool
    {
        foreach ($fields as $key => $value) {
            if (!empty($this->rules[$key]) && preg_match($this->rules[$key], trim($value))) {
                unset($this->errors[$key]);
            }
        }

        return empty($this->errors);
    }

}