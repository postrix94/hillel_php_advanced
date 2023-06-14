<?php

namespace App\Services\Users;
use App\Models\User;

class CreateService
{
    static public function call($fields = []): bool {
        unset($fields["confirm_password"]);
        $fields["password"] = password_hash($fields["password"], PASSWORD_BCRYPT);

        return User::create($fields);
    }
}