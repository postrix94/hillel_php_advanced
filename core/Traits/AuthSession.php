<?php

namespace Core\Traits;

trait AuthSession
{

    static public function auth(string $userId): void
    {
        $_SESSION[static::KEY_USER_ID] = $userId;
    }

    static public function check(): bool
    {
        return (isset($_SESSION[static::KEY_USER_ID]) && !empty($_SESSION[static::KEY_USER_ID]));
    }

    static public function destroy(): void
    {

        if (static::check()) {
            unset($_SESSION[static::KEY_USER_ID]);
        }
    }

    static public function getUserId(): int|null
    {
        return static::check() ? $_SESSION[static::KEY_USER_ID] : null;
    }
}