<?php


namespace App\Validators\Auth;


class SigninValidator extends BaseAuthValidator
{
    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{5,}/',
    ];

    protected array $errors = [
        "email" => "Неправильно введен Email или пароль",
        "password" => "Неправильно введен Email или пароль",
    ];

    public function validate(array $fields = []): bool
    {
        $validate = [
            parent::validate($fields),
            $this->checkAuthUser(),
        ];

        return in_array(false, $validate);
    }
}