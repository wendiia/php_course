<?php

function fileRead($filePath): ?array
{
    $file = fopen($filePath, "r");
    $data = null;

    while (!feof($file)) {
        $dataTemp = trim(fgets($file));
        if ('' !== $dataTemp) {
            $data[] = $dataTemp;
        }
    }

    fclose($file);

    return $data;
}

function getUsersList(): array
{
    return [
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

function existsUser($login): bool
{
    $users = getUsersList();

    return in_array($login, array_column($users, 'login'));
}

function getIndexUser($login): ?int
{
    $users = getUsersList();

    if (true === existsUser($login)) {
        return array_search($login, array_column($users, 'login'));
    }

    return null;
}

function checkPassword($login, $password): bool
{
    $users = getUsersList();

    if (true === existsUser($login)) {
        return password_verify($password, $users[getIndexUser($login)]['password']);
    }

    return false;
}

function getCurrentUser(): ?string
{
    if (isset($_SESSION['login'])) {
        return $_SESSION['login'];
    }

    return null;
}
