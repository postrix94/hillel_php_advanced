<?php

namespace App\Controllers;

use App\Services\Auth\AuthService;
use App\Services\Users\CreateService;
use App\Validators\Auth\SigninValidator;
use App\Validators\Auth\SignupValidator;
use Core\Session;

class AuthController extends \Core\BaseController
{
    public function before(string $action):bool {
         if(AuthService::check() && $action !== "logout") {
             redirect("dashboard");
         }

         return true;
    }

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

        Session::flash('email', $fields["email"]);
        Session::addErrors($validator->getErrors());
        return redirect("registration");
    }

    public function verify() {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SigninValidator();

        if($validator->validate($fields) && AuthService::attempt($fields["email"], $fields["password"])) {
            AuthService::auth();
           return redirect("dashboard");
        }

        Session::flash('email', $fields["email"]);
        Session::addErrors($validator->getErrors());
        redirect("login");
    }

    public function logout() {
        AuthService::destroy();
        redirect("login");
    }
}