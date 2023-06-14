<?php

use App\Controllers\AuthController;
use Core\Router;

Router::add("login", [AuthController::class, 'login', "GET"]);
Router::add("registration", [AuthController::class, 'register', "GET"]);
Router::add("auth/signup", [AuthController::class, 'signup', "POST"]);
Router::add("auth/verify", [AuthController::class, 'verify', "POST"]);
