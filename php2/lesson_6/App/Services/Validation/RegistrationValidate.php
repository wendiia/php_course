<?php

namespace App\Services\Validation;

use App\Exceptions\AuthErrors;
use App\Exceptions\ModelException;
use App\Exceptions\RegistrationException;
use App\Models\User;

class RegistrationValidate
{
    protected AuthErrors $errors;

    /**
     * @throws AuthErrors
     */
    public function validate($data): void
    {
        $this->errors = new AuthErrors();

        try {
            $this->checkLogin($data['login']);
            $this->checkPassword($data['password'], $data['confirmPassword']);
        } catch (\TypeError  $e) {
            throw new ModelException('Таких свойств модели не существует!');
        }

        if (!empty($this->errors->getErrors())) {
            throw $this->errors;
        }
    }

    protected function checkLogin(string $login): void
    {
        if (!empty($login)) {
            if (strlen($login) < 3) {
                $this->errors->addError(
                    'login',
                    new RegistrationException('Логин должен быть не менее 3 символов')
                );
            }
            if (!empty(User::findByLogin($login))) {
                $this->errors->addError('login', new RegistrationException('Такой логин уже существует'));
            }
            return;
        }

        $this->errors->addError('login', new RegistrationException('Заполните поле "Логин"'));
    }

    protected function checkPassword(string $password, ?string $confirmPassword): void
    {
        if (!empty($password)) {
            if (strlen($password) < 6) {
                $this->errors->addError(
                    'password',
                    new RegistrationException('Пароль должен быть не менее 6 символов')
                );
            }
            if ($password !== $confirmPassword && !empty($confirmPassword)) {
                $this->errors->addError('password', new RegistrationException('Пароли не совпадают'));
            }
            return;
        }

        $this->errors->addError('password', new RegistrationException('Заполните поле "Пароль"'));
    }
}