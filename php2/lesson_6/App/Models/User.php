<?php

namespace App\Models;

use App\Db;
use App\Exceptions\DbException;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\ModelErrors;
use App\Exceptions\ModelException;
use App\Model;

class User extends Model
{
    protected static string $table = 'users';
    protected string $login;
    protected string $password;

    /**
     * @throws DbException
     * @throws ItemNotFoundException
     */
    public static function findByLogin(string $login): User | false
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE login = :login";
        $db = new Db();
        $record = $db->query($sql, ['login' => $login], static::class);

        if (empty($record)) {
            throw new ItemNotFoundException('Item not found');
        }

        return $record[0];
    }

    /**
     * @throws ModelErrors
     * @throws DbException
     */
    protected function validateLogin(string $login): void
    {
        $errors = new ModelErrors();

        if (!empty($login)) {
            if (strlen($login) < 3) {
                $errors->addError(new ModelException('Логин должен быть не менее 3 символов'));
            }
            if (!empty(User::findByLogin($login))) {
                $errors->addError(new ModelException('Такой логин уже существует'));
            }
        } else {
            $errors->addError(new ModelException('Введите логин'));
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }

    /**
     * @throws ModelErrors
     */
    protected function validatePassword(string $password): void
    {
        $errors = new ModelErrors();

        if (!empty($password)) {
            if (strlen($password) < 6) {
                $errors->addError(new ModelException('Пароль должен быть не менее 6 символов'));
            }
            if (str_contains($password, 'qwer')) {
                $errors->addError(new ModelException('Пароль не должен содержать qwer'));
            }
        } else {
            $errors->addError(new ModelException('Введите пароль'));
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }
}
