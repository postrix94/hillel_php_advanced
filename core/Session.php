<?php

namespace Core;

use Core\Traits\AuthSession;

class Session
{
    use AuthSession;

    static public function flash(string $key, $value)
    {
        $_SESSION['flash'][$key] = $value;
    }

    static public function getFlash(string $key)
    {
        if(!isset($_SESSION['flash'])) return "";

        if(!isset($_SESSION['flash'][$key])) return "";

        return $_SESSION['flash'][$key];
    }

    static public function addErrors(array $errors = []): void
    {
        if (count($errors)) {
            $_SESSION['errors'] = $errors;
        }
    }

    static public function getErrors(): array
    {
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        unset($_SESSION['errors']);
        return $errors;
    }

    static public function destroyFlashSession(): void
    {
        if(!isset($_SESSION['count_flash_session'])) {
            $_SESSION['count_flash_session'] = 0;
        }

        $_SESSION['count_flash_session'] += 1;

        if ($_SESSION['count_flash_session'] > 1) {
            $_SESSION['count_flash_session'] = 0;
            unset($_SESSION['flash']);
        }
    }


}