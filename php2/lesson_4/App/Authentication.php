<?php

namespace App;

use App\Models\User;

class Authentication
{
    public static function register(string $login, string $password, string $confirmPassword): bool
    {
        if (
            empty(User::findByLogin($login)) &&
            !empty($login) &&
            !empty($password) &&
            $password === $confirmPassword
        ) {
            $user = new User();
            $user->login = $login;
            $user->password = password_hash($password, PASSWORD_DEFAULT) ;
            return $user->save();
        }

        return false;
    }

    public static function login(string $login, string $password): bool
    {
        if (true === self::checkLoginAndPassword($login, $password)) {
            $_SESSION['login'] = $login;
            return true;
        }

        return false;
    }

    protected static function checkLoginAndPassword(string $login, string $password): bool
    {
        $user = User::findByLogin($login);

        if (!empty($user)) {
            return password_verify($password, $user->password);
        }

        return false;
    }

    public static function getCurrentUser(): ?User
    {
        if (!empty($_SESSION['login'])) {
            return User::findByLogin($_SESSION['login']);
        }

        return null;
    }

    public static function logout(): void
    {
        session_destroy();
    }
}
