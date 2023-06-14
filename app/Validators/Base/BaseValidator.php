<?php


namespace App\Validators\Base;


class BaseValidator
{
    protected array $rules = [];

    protected array $errors = [];

    public function validate(array $fields = []): bool
    {
        foreach ($fields as $key => $value) {
            if (!empty($this->rules[$key]) && preg_match($this->rules[$key], $value)) {
                unset($this->errors[$key]);
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setError(string $key, string $message): void
    {
        $this->errors[$key] = $message;
    }
}