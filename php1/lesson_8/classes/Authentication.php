<?php

class Authentication
{
    protected array $users;

    public function __construct()
    {
        $this->users = [
            [
                'login' => 'biba',
                'password' => '$2y$10$BF0nhl5d66js6YG/F74oaO8CapbRTkVXbpPn7j.IBHJUHPvrY0bSa'
            ],
            [
                'login' => 'boba',
                'password' => '$2y$10$2Du1UUuym6f9z/veh7dkduOh06jdmHEFYKZl.Exy7A.Sn9dRdnXh.'
            ],
            [
                'login' => 'pupa',
                'password' => '$2y$10$XflHJmZy4IIJQ9V4CP2AEuZ62W2gf3P7T7ypkuXKtEX5dNl19C74a'
            ],
            [
                'login' => 'lupa',
                'password' => '$2y$10$01xwxCXxEt/ygbFwhDhR.uRvU8HntRphxF41uZbc9eV/mbhSbXgzu'
            ],
            [
                'login' => 'starpony',
                'password' => '$2y$10$jPG0j2R.rNA9sVz9DxlsDOoJyN5X/vd7A4i0Hh.qfWL5wBPhl6CKq'
            ],
        ];
    }

    public function getUsersList(): array
    {
        return $this->users;
    }

    public function existsUser(string $login): bool
    {
        return in_array($login, array_column($this->users, 'login'));
    }

    public function getIndexUser(string $login): ?int
    {
        if (true === $this->existsUser($login)) {
            return array_search($login, array_column($this->users, 'login'));
        }

        return null;
    }

    public function checkPassword(string $login, string $password): bool
    {
        if (true === $this->existsUser($login)) {
            return password_verify($password, $this->users[$this->getIndexUser($login)]['password']);
        }

        return false;
    }

    public static function getCurrentUser(): string|null
    {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }

        return null;
    }
}
