<?php


namespace Core\Traits;

trait AuthSession
{
    static public function auth(string $userId): void {
        $_SESSION["_uid"] = $userId;
    }

    static public function check(): bool {
        return (isset($_SESSION['_uid']) && !empty($_SESSION['_uid']));
    }

    static public function destroy(): void {

        if(static::check()) {
            unset($_SESSION["_uid"]);
        }
    }

    static public function getUserId(): int|null {
        return static::check() ? $_SESSION["_uid"] : null;
    }
}