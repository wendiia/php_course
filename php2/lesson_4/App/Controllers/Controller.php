<?php

namespace App\Controllers;

use App\View;

abstract class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($name): void
    {
        if ($this->access()) {
            $actionName = 'action' . $name;
            $this->$actionName();
        } else {
            http_response_code(403);
            $this->view->display(__DIR__ . '/../Templates/forbidden.php');
            exit();
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
