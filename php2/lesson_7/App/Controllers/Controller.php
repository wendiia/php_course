<?php

namespace App\Controllers;

use App\Exceptions\DbException;
use App\Exceptions\ItemNotFoundException;
use App\Services\Authentication;
use App\Exceptions\Http403Exception;
use App\Exceptions\Http404Exception;
use App\View;

abstract class Controller
{
    protected View $view;

    /**
     * @throws DbException
     * @throws ItemNotFoundException
     */
    public function __construct()
    {
        $this->view = new View();

        if (null !== Authentication::getCurrentUser()) {
            $this->view->login = $_SESSION['login'];
        }
    }

    /**
     * @throws Http403Exception
     * @throws Http404Exception
     */
    public function action(string $name): void
    {
        if (true === $this->access()) {
            $actionName = 'action' . $name;

            if (!method_exists($this, $actionName)) {
                throw new Http404Exception();
            }

            $this->$actionName();
            return;
        }

        throw new Http403Exception();
    }

    protected function access(): bool
    {
        return true;
    }
}