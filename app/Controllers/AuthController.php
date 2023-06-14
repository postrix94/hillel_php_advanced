<?php

namespace App\Controllers;

use App\Services\Users\CreateService;
use App\Validators\Auth\SignupValidator;

class AuthController extends \Core\BaseController
{
    public function login() {
        return view("pages/login", ["title" => "Авторизация"]);
    }

    public function register() {
        return view("pages/registration", ["title" => "Регистрация"]);
    }

    public function signup() {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SignupValidator();

        if($validator->validate($fields) && CreateService::call($fields)) {
            redirect("login");
        }

        redirect("registration");
    }

    public function verify() {}
}