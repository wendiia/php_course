<?php

namespace App\Models;

use App\Db;
use App\Exceptions\DbException;
use App\Exceptions\Errors;
use App\Model;
use Exception;

class User extends Model
{
    protected static string $table = 'users';
    protected string $login;
    protected string $password;

    /**
     * @throws DbException
     */
    public static function findByLogin(string $login): User | false
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE login = :login";
        $db = new Db();
        $record = $db->query($sql, ['login' => $login], static::class);

        return !empty($record[0]) ? $record[0] : false;
    }

    /**
     * @throws DbException
     * @throws Errors
     */
    protected function validateLogin(string $login): void
    {
        $errors = new Errors();

        if (!empty($login)) {
            if (strlen($login) < 3) {
                $errors->addError(new Exception('Логин должен быть не менее 3 символов'), 'login');
            }
            if (!empty(User::findByLogin($login))) {
                $errors->addError(new Exception('Такой логин уже существует'), 'login');
            }
        } else {
            $errors->addError(new Exception('Поле логин не может быть пустым'), 'login');
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }

    /**
     * @throws Errors
     */
    protected function validatePassword(string $password): void
    {
        $errors = new Errors();

        if (!empty($password)) {
            if (strlen($password) < 6) {
                $errors->addError(new Exception('Пароль должен быть не менее 6 символов'));
            }
            if (str_contains($password, 'qwer')) {
                $errors->addError(new Exception('Пароль не должен содержать qwer'));
            }
        } else {
            $errors->addError(new Exception('Поле пароль не может быть пустым'));
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }

    /**
     * @throws Errors
     */
    protected function validateConfirmPassword(string $password, string $confirmPassword): void
    {
        $errors = new Errors();

        if (!empty($confirmPassword)) {
            if ($password !== $confirmPassword) {
                $errors->addError(new Exception('Пароли не совпадают'));
            }
        } else {
            $errors->addError(
                new Exception('Поле подтверждения пароля не может быть пустым'),
            );
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }
}
