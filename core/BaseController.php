<?php

namespace Core;

use App\Services\Auth\AuthService;

class BaseController
{
    public function before(string $action):bool {
        return true;
    }

    public function after(string $action) {

    }

}