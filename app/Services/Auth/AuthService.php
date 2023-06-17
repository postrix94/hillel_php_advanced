<?php

namespace App\Services\Auth;

use App\Models\User;
use Core\Model;
use Core\Session;

class AuthService
{
    static protected Model $user;
    static protected bool $isComparePassword = false;

     static public function attempt(string $email, string $password): bool {
        $user = User::findBy("email", $email);

        if(!$user) return false;
        static::$user = $user;

        if(!static::isComparePassword($password)) return false;

        return true;
    }

    static protected function isComparePassword(string $password): bool {
         static::$isComparePassword = password_verify($password, static::$user->password);
         return static::$isComparePassword;
    }

    static public function getIsComparePassword(): bool {
         return static::$isComparePassword;
    }

    static public function auth(): void {
        Session::auth(static::$user->id);
    }

    static public function check(): bool {
         return Session::check();
    }

    static public function destroy(): void {
         Session::destroy();
    }

    static public function user(): User {
         $userId = Session::getUserId();

         if(is_null($userId)) redirect('login');

         $user = User::find($userId);

         if(!$user) {
             static::destroy();;
             redirect('login');
         }

         return $user;
    }


}