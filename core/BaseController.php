<?php

namespace Core;


class BaseController
{
    public function before(string $action):bool {
        return true;
    }

    public function after(string $action) {

    }
}