<?php

namespace App\Controllers;

use App\Authentication;
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

    public function action(string $name): void
    {
        if ($this->access()) {
            $actionName = 'action' . $name;

            if (!method_exists($this, $actionName)) {
                $this->actionNotFound();
            }

            $this->$actionName();
        } else {
            http_response_code(403);
            $this->view->display(__DIR__ . '/../Templates/forbidden.php');
        }
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
