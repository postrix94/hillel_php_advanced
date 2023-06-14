<?php

namespace App\Validators\Auth;

use App\Models\User;
use App\Validators\Base\BaseValidator;

class BaseAuthValidator extends BaseValidator
{
    public function checkEmailOnExists(string $email): bool
    {
        $isExistUser = (bool) User::findBy("email", $email);

        if($isExistUser) {
            $this->setError("email", "Такой пользователь уже существует");
        }

        return $isExistUser;
    }
}