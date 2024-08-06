<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\Article;

class Index extends AdminController
{
    protected function actionAll(): void
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../Templates/News/Admin/index.php');
    }

    public function actionCreate(): void
    {
        $this->view->display(__DIR__ . '/../../Templates/News/Admin/create.php');
    }

    public function actionEdit(): void
    {
        if (!empty($_GET['id'])) {
            $this->view->article = Article::findById($_GET['id']);

            if (false !== $this->view->article) {
                $this->view->display(__DIR__ . '/../../Templates/News/Admin/edit.php');
                exit();
            }
        }

        $this->actionNotFound();
    }

    public function actionDelete(): void
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);

            if (false !== $article) {
                $article->delete();
                header('Location: /admin');
                exit();
            }
        }

        $this->actionNotFound();
    }

    public function actionSave(): void
    {
        if (
            !empty($_POST['title']) &&
            !empty($_POST['lead'])
        ) {
            if (!empty($_GET['id'])) {
                $article = Article::findById($_GET['id']);
            } else {
                $article = new Article();
            }

            $article->title = trim($_POST['title']);
            $article->lead = trim($_POST['lead']);
            $article->save();
        }

        header('Location: /admin');
        exit();
    }
}
