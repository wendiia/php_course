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

    protected function access(): bool
    {
        return true;
    }
}
