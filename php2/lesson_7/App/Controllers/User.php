<?php

namespace App\Controllers;

use App\Services\Authentication;
use Exception;

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
        if (true === Authentication::login($_POST['login'], $_POST['password'])) {
            header('Location: /admin');
        }

        $this->view->authFail = false;
        $this->actionLogin();
    }

    protected function actionRegisterUser(): void
    {
        try {
            Authentication::registration(
                $_POST['login'],
                $_POST['password'],
                $_POST['confirm_password']
            );
            header('Location: /');
        } catch (Exception $exception) {
            $this->view->errors = $exception->getErrors();
            $this->actionRegister();
        }
    }

    protected function actionLogoutUser(): void
    {
        Authentication::logout();
        header('Location: /');
    }
}
