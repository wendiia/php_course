<?php

function getUsersList(): array
{
    return [
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

function existsUser($login) : int | false
{
    $users = getUsersList();

    return array_search($login, array_column($users, 'login'));
}

function checkPassword($login, $password): bool
{
    $findIndexLogin = existsUser($login);

    $users = getUsersList();
    if (
        $findIndexLogin !== false &&
        password_verify($password, $users[$findIndexLogin]['password'])
    ) {
        return true;
    }

    return false;
}

function getCurrentUser() : string | null
{
    if (
        isset($_SESSION['login']) &&
        existsUser($_SESSION['login']) !== false
    ) {
        return $_SESSION['login'];
    }

    return null;
}
