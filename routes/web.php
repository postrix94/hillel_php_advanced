<?php

use App\Controllers\{AuthController, FoldersController};
use Core\Router;

Router::add("login", [AuthController::class, 'login', "GET"]);
Router::add("registration", [AuthController::class, 'register', "GET"]);
Router::add("auth/signup", [AuthController::class, 'signup', "POST"]);
Router::add("auth/verify", [AuthController::class, 'verify', "POST"]);
Router::add("logout", [AuthController::class, 'logout', "POST"]);
Router::add("dashboard", [FoldersController::class, 'index', "GET"]);
Router::add("folder/{id:\d+}", [FoldersController::class, 'show', "GET"]);
Router::add("folder/create", [FoldersController::class, 'store', "POST"]);
