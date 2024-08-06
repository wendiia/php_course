<?php

namespace App\Controllers;

use App\Models\Article;

class Index extends Controller
{
    protected function actionAll(): void
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/News/index.php');
    }

    protected function actionOne(): void
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);

            if (false === $article) {
                $this->actionNotFound();
            }

            $this->view->article = $article;
            $this->view->display(__DIR__ . '/../Templates/News/article.php');
            exit();
        }

        $this->actionNotFound();
    }
}
