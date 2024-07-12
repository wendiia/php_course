<?php

namespace App;

use App\Models\User;

class Authentication
{
    protected Users $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function existsUser(string $login): bool
    {
        if (null !== $this->users->getUserByValue('login', $login)) {
            return true;
        }

        return false;
    }

    public function getCurrentUser(): ?User
    {
        if (!empty($_SESSION['login'])) {
            return $this->users->getUserByValue('login', $_SESSION['login']);
        }
        return null;
    }

    public function checkLoginPassword(string $login, string $password): bool
    {
        $userByLogin = $this->users->getUserByValue('login', $login);

        if (!empty($userByLogin)) {
            return password_verify($password, $userByLogin->getPassword());
        }

        return false;
    }

    public function checkLoginPasswordAndAuth(string $login, string $password): bool
    {
        if (true === $this->checkLoginPassword($login, $password)) {
            $_SESSION['login'] = $_POST['login'];
            return true;
        }

        return false;
    }
}
