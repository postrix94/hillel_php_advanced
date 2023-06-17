<?php

namespace App\Validators\Auth;

use App\Models\User;
use App\Services\Auth\AuthService;
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

    protected function checkAuthUser(): bool {
        $isCompare = AuthService::getIsComparePassword();

        if(!$isCompare) {
            $this->setError("email", "Неправильно введен Email или пароль");
            $this->setError("password", "Неправильно введен Email или пароль");
        }

        return $isCompare;
    }

}