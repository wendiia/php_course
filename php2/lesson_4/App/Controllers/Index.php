<?php

namespace App\Controllers;

use App\Models\Article;

class Index extends Controller
{
    protected function access(): bool
    {
        if (5 > 3) {
            return true;
        }

        return  false;
    }
    public function action($name): void
    {
        if ($this->access()) {
            $actionName = 'action' . $name;
            $this->$actionName();
        } else {
            http_response_code(403);
            header('Location: /admin/default.php');
            exit();
        }
    }

    protected function actionDefault(): void
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/News/default.php');
    }

    protected function actionOne(): void
    {
        $article = Article::findById($_GET['id']);

        if (false === $article) {
            http_response_code(404);
            header('Location: /../Templates/notFound.php');
            exit();
        }

        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../Templates/News/article.php');
    }
}
