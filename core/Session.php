<?php

namespace Core;

use Core\Traits\AuthSession;

class Session
{
    use AuthSession;
    protected const KEY_USER_ID = '_uid';
    protected const KEY_FLASH_MESSAGE = 'flash';
    protected const KEY_ERRORS_MESSAGE = 'errors';
    protected const KEY_COUNT_FLASH = 'count_flash_session';


    static public function flash(string $key, $value)
    {
        $_SESSION[static::KEY_FLASH_MESSAGE][$key] = $value;
    }

    static public function getFlash(string $key)
    {
        if(!isset($_SESSION[static::KEY_FLASH_MESSAGE])) return "";

        if(!isset($_SESSION[static::KEY_FLASH_MESSAGE][$key])) return "";

        return $_SESSION[static::KEY_FLASH_MESSAGE][$key];
    }

    static public function addErrors(array $errors = []): void
    {
        if (count($errors)) {
            $_SESSION[static::KEY_ERRORS_MESSAGE] = $errors;
        }
    }

    static public function getErrors(): array
    {
        $errors = isset($_SESSION[static::KEY_ERRORS_MESSAGE]) ? $_SESSION[static::KEY_ERRORS_MESSAGE] : [];
        unset($_SESSION[static::KEY_ERRORS_MESSAGE]);
        return $errors;
    }

    static public function destroyFlashSession(): void
    {
        if(!isset($_SESSION[static::KEY_COUNT_FLASH])) {
            $_SESSION[static::KEY_COUNT_FLASH] = 0;
        }

        $_SESSION[static::KEY_COUNT_FLASH] += 1;

        if ($_SESSION[static::KEY_COUNT_FLASH] > 1) {
            $_SESSION[static::KEY_COUNT_FLASH] = 0;
            unset($_SESSION[static::KEY_FLASH_MESSAGE]);
        }
    }


}