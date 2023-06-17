<?php

namespace App\Validators\Auth;

class SignupValidator extends BaseAuthValidator
{
    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{5,}/',
    ];

    protected array $errors = [
        "email" => "Неправильно введен Email",
        "password" => "Неправильно введен пароль",
    ];

    public function passwordConfirmation(string $password, string $confirmPassword): bool
    {
        if ($password !== $confirmPassword) {
            $this->setError("confirm_password", "Пароль подтверждения не совпадает");
            return false;
        }

        return true;
    }

    public function validate(array $fields = []): bool
    {
        $result = [
            parent::validate($fields),
            $this->passwordConfirmation($fields["password"], $fields["confirm_password"]),
            !$this->checkEmailOnExists($fields["email"]),
        ];

        return !in_array(false, $result);
    }
}