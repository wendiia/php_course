<?php

namespace App\Controllers;

use App\Services\Authentication;
use App\Exceptions\Http403Exception;
use App\Exceptions\Http404Exception;
use App\View;

abstract class Controller
{
    protected View $view;

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

    protected function actionNotFound(): void
    {
        http_response_code(404);
        $this->view->display(__DIR__ . '/../Templates/notFound.php');
        exit();
    }
}
