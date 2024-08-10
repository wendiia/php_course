<?php

namespace App\Controllers;

use App\Authentication;

class User extends Controller
{
    protected function actionLogin(): void
    {
        $this->view->display(__DIR__ . '/../Templates/Authentication/login.php');
        exit();
    }

    protected function actionRegister(): void
    {
        $this->view->display(__DIR__ . '/../Templates/Authentication/registration.php');
        exit();
    }

    protected function actionLoginUser(): void
    {
        if (false === Authentication::login($_POST['login'], $_POST['password'])) {
            $this->view->authFail = 'Неверный логин или пароль';
            $this->actionLogin();
        }

        header('Location: /');
        exit();
    }

    protected function actionRegisterUser(): void
    {
        $resultRegistration = Authentication::register(
            $_POST['login'],
            $_POST['password'],
            $_POST['confirm_password']
        );

        if (false === $resultRegistration) {
            $this->view->authFail = 'Данные введены неверно!';
            $this->actionRegister();
        }

        header('Location: /');
        exit();
    }

    protected function actionLogoutUser(): void
    {
        Authentication::logout();
        header('Location: /');
        exit();
    }
}