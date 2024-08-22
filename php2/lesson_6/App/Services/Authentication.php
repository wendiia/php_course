<?php

namespace App\Services;

use App\Exceptions\DbException;
use App\Exceptions\Errors;
use App\Models\User;

class Authentication
{
    /**
     * @throws Errors
     * @throws DbException
     */
    public static function registration(string $login, string $password, string $confirmPassword): bool
    {
        $user = new User();
        $user->fill([
            'login' => $login,
            'password' => $password,
            'confirm_password' => $confirmPassword
        ]);
        $user->password = password_hash($password, PASSWORD_DEFAULT);

        return $user->save();
    }

    /**
     * @throws DbException
     */
    public static function login(string $login, string $password): bool
    {
        if (true === self::checkLoginAndPassword($login, $password)) {
            $_SESSION['login'] = $login;
            return true;
        }

        return false;
    }

    /**
     * @throws DbException
     */
    protected static function checkLoginAndPassword(string $login, string $password): bool
    {
        $user = User::findByLogin($login);

        if (!empty($user) && password_verify($password, $user->password)) {
            return true;
        }

        return false;
    }

    /**
     * @throws DbException
     */
    public static function getCurrentUser(): ?User
    {
        try {
            if (!empty($_SESSION['login'])) {
                return User::findByLogin($_SESSION['login']);
            }
        } catch (\TypeError $e) {
            session_destroy();
            header('Location: /');
        }

        return null;
    }

    public static function logout(): void
    {
        session_destroy();
    }
}
