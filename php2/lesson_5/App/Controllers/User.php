<?php

namespace App\Controllers;

use App\Exceptions\AuthErrors;
use App\Exceptions\DbException;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\LoginException;
use App\Services\Authentication;

class User extends Controller
{
    /**
     * @throws DbException
     */
    protected function actionLogin(): void
    {
        if (null === Authentication::getCurrentUser()) {
            $this->view->display(__DIR__ . '/../Templates/Authentication/login.php');
            exit();
        }

        header('Location: /');
        exit();
    }

    /**
     * @throws DbException
     */
    protected function actionRegister(): void
    {
        if (null === Authentication::getCurrentUser()) {
            $this->view->display(__DIR__ . '/../Templates/Authentication/registration.php');
            exit();
        }

        header('Location: /');
        exit();
    }

    /**
     * @throws ItemNotFoundException
     * @throws DbException
     * @throws LoginException
     */
    protected function actionLoginUser(): void
    {
        try {
            Authentication::login($_POST['login'], $_POST['password']);
            header('Location: /');
        } catch (LoginException $e) {
            $this->view->authFail = $e->getMessage();
            $this->actionLogin();
        }
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
        } catch (AuthErrors $exception) {
            $this->view->errors = $exception->getErrors();
            $this->actionRegister();
        }
    }

    protected function actionLogoutUser(): void
    {
        Authentication::logout();
        header('Location: /');
        exit();
    }
}
