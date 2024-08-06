<?php

namespace App\Models;

use App\Db;
use App\Model;

class User extends Model
{
    protected static string $table = 'users';
    public string $login;
    public string $password;

    public static function findByLogin(string $login): ?User
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE login = :login";
        $db = new Db();
        $record = $db->query($sql, ['login' => $login], static::class);

        return !empty($record) ? $record[0] : null;
    }
}
