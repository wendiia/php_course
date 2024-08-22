<?php

namespace App\Services;

use App\Exceptions\DbException;
use App\View;
use Generator;

class AdminDataTable
{
    protected Generator $models;
    protected array $fns;

    public function __construct(Generator $models, array $fns)
    {
        $this->models = $models;
        $this->fns = $fns;
    }

    /**
     * @throws DbException
     */
    public function render(): void
    {
        $news = [];

        foreach ($this->models as $row => $model) {
            foreach ($this->fns as $property => $fn) {
                $news[$row][$property] = $fn($model);
            }
        }

        $view = new View();
        $view->login = Authentication::getCurrentUser()?->login;
        $view->news = $news;
        $view->display(__DIR__ . '/../Templates/News/Admin/index.php');
    }
}
