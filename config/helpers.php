<?php

use Config\Config;

function config(string $name): string|null
{
    return Config::get($name);
}

function showErrorMessage(Exception $error): void
{
    echo $error->getMessage() . "<br>";
    echo $error->getTraceAsString() . "<br>";
    echo($error->getFile() . " ON LINE " . $error->getLine());
    exit;
}

function view(string $view, array $args = []): void
{
    \Core\View::render($view, $args);
}

function url($path): string
{
    return SITE_URL . "/" . $path;
}

function redirect(string $path): void
{
    header("Location: " . url($path));
    exit;
}

function showPageError(Exception $error): void
{
    switch ($error->getCode()) {
        case 404:
            header("HTTP/1.0 404 Not Found", response_code: 404);
            view("pages/errors/" . $error->getCode());
            break;
        default:
            header("HTTP/1.0 404 Not Found", response_code: 404);
            view("pages/errors/404");
            exit;
    }
}

function errors(): array {
    return \Core\Session::getErrors();
}

function redirectBack(): void {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function responseJson(array $data, int $statusCode = 200): void {
    http_response_code($statusCode);
    header("Content-type:application/json; charset=UTF-8");
    echo json_encode($data);
    exit;
}