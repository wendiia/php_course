<?php

namespace App\Controllers;

use App\Exceptions\Http403Exception;
use App\View;

abstract class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();

        if (!empty($_SESSION['login'])) {
            $this->view->login = $_SESSION['login'];
        }
    }

    /**
     * @throws Http403Exception
     */
    public function action($name): void
    {
        if (true === $this->access()) {
            $actionName = 'action' . $name;
            $this->$actionName();
            exit();
        }

        throw new Http403Exception();
    }

    protected function access(): bool
    {
        return true;
    }
}
