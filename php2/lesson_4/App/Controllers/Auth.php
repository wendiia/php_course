<?php

namespace App\Controllers;

use App\Authentication;

class Auth extends Controller
{
    protected function actionLogin(): void
    {
        $this->view->display(__DIR__ . '/../Templates/Authentication/login.php');
    }

    protected function actionRegister(): void
    {
        $this->view->display(__DIR__ . '/../Templates/Authentication/registration.php');
    }

    protected function actionLoginUser(): void
    {
        if (false === Authentication::login($_POST['login'], $_POST['password'])) {
            $this->view->loginFail = 'Неверный логин или пароль';
            $this->actionLogin();
            exit();
        }

        header('Location: /');
        exit();
    }

    protected function actionRegisterUser(): void
    {
        $resultRegister = Authentication::register($_POST['login'], $_POST['password'], $_POST['confirm_password']);

        if (false === $resultRegister) {
            $this->view->registerFail = 'Данные введены неверно!';
            $this->actionRegister();
            exit();
        }

        Authentication::login($_POST['login'], $_POST['password']);
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
