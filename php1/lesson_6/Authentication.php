<?php

class Authentication
{
    protected array $users;

    public function __construct()
    {
        $this->users = [
            [
                'login' => 'biba',
                'password' => password_hash('biba', PASSWORD_DEFAULT)
            ],
            [
                'login' => 'boba',
                'password' => password_hash('boba', PASSWORD_DEFAULT)
            ],
            [
                'login' => 'pupa',
                'password' => password_hash('pupa', PASSWORD_DEFAULT)
            ],
            [
                'login' => 'lupa',
                'password' => password_hash('lupa', PASSWORD_DEFAULT)
            ],
            [
                'login' => 'starpony',
                'password' => password_hash('starpony', PASSWORD_DEFAULT)
            ],
        ];
    }

    public function getUsersList(): array
    {
        return $this->users;
    }

    public function existsUser($login): int|false
    {
        return array_search($login, array_column($this->users, 'login'));
    }

    public function checkPassword($login, $password): bool
    {
        $findIndexLogin = $this->existsUser($login);

        if (
            $findIndexLogin !== false &&
            password_verify($password, $this->users[$findIndexLogin]['password'])
        ) {
            return true;
        }

        return false;
    }

    public function getCurrentUser(): string|null
    {
        if (
            isset($_SESSION['login']) &&
            $this->existsUser($_SESSION['login']) !== false
        ) {
            return $_SESSION['login'];
        }

        return null;
    }
}