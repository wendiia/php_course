<?php

namespace App;

use App\Models\User;

class Users
{
    public function getAllUsers(string $sortValue = null, string $typeSort = 'ASC'): ?array
    {
        $db = new DB();
        $sql = "SELECT * FROM users";

        if (!empty($sortValue)) {
            $sql = "SELECT * FROM users ORDER BY {$sortValue} {$typeSort}";
        }

        $usersParts = $db->query($sql);
        $listUsers = [];

        if (!empty($usersParts)) {
            foreach ($usersParts as $userParts) {
                $user = new User(
                    $userParts['login'],
                    $userParts['password'],
                );
                $user->setId($userParts['id']);
                $listUsers[$user->getId()] = $user;
            }
            return $listUsers;
        }

        return null;
    }

    public function getUserByValue(string $name, string $value): ?User
    {
        $db = new DB();
        $sql = "SELECT * FROM users WHERE $name = :value";
        $res = $db->query($sql, ['value' => $value]);

        if (!empty($res)) {
            $user = new User($res[0]['login'], $res[0]['password']);
            $user->setId($res[0]['id']);
            return $user;
        }

        return null;
    }
}
