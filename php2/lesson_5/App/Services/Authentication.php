<?php

namespace App\Services;

use App\Exceptions\AuthErrors;
use App\Exceptions\DbException;
use App\Exceptions\Errors;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\LoginException;
use App\Models\User;
use App\Services\Validation\RegistrationValidate;

class Authentication
{
    /**
     * @throws AuthErrors
     * @throws DbException
     * @throws Errors
     */
    public static function registration(string $login, string $password, string $confirmPassword): bool
    {
        $registrationValidator = new RegistrationValidate();
        $registrationValidator->validate($login, $password, $confirmPassword);
        $user = new User();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);

        return $user->save();
    }

    /**
     * @throws LoginException
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
     * @throws LoginException
     * @throws ItemNotFoundException
     */
    protected static function checkLoginAndPassword(string $login, string $password): bool
    {
        $user = User::findByLogin($login);

        if (!empty($user) && password_verify($password, $user->password)) {
            return true;
        }

        throw new LoginException("Неверный логин или пароль!");
    }

    /**
     * @throws DbException
     */
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
