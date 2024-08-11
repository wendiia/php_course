<?php

namespace App\Controllers;

use App\Authentication;

class User extends Controller
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
            $this->view->authFail = false;
            $this->actionLogin();
            return;
        }

        header('Location: /');
    }

    protected function actionRegisterUser(): void
    {
        $resultRegistration = Authentication::register(
            $_POST['login'],
            $_POST['password'],
            $_POST['confirm_password']
        );

        if (false === $resultRegistration) {
            $this->view->authFail = false;
            $this->actionRegister();
            return;
        }

        header('Location: /');
    }

    protected function actionLogoutUser(): void
    {
        Authentication::logout();
        header('Location: /');
    }
}
