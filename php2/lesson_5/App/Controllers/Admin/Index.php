<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Exceptions\DbException;
use App\Exceptions\Http404Exception;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\ModelErrors;
use App\Exceptions\ModelException;
use App\Models\Article;
use App\Services\Authentication;
use App\View;

class Index extends Controller
{
    /**
     * @throws DbException
     */
    protected function access(): bool
    {
        if (null !== Authentication::getCurrentUser()) {
            return true;
        }

        return false;
    }

    /**
     * @throws DbException
     */
    protected function actionAll(): void
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../Templates/News/Admin/index.php');
    }

    public function actionCreate(): void
    {
        $this->view->display(__DIR__ . '/../../Templates/News/Admin/create.php');
    }

    /**
     * @throws Http404Exception
     * @throws DbException
     */
    public function actionEdit(): void
    {
        try {
            $this->view->article = Article::findById($_GET['id']);
            $this->view->display(__DIR__ . '/../../Templates/News/Admin/edit.php');
        } catch (ItemNotFoundException $e) {
            throw new Http404Exception($e);
        }
    }

    /**
     * @throws Http404Exception
     * @throws DbException
     */
    public function actionDelete(): void
    {
        try {
            $article = Article::findById($_GET['id']);
            $article->delete();
            header('Location: /admin');
        } catch (ItemNotFoundException $e) {
            throw new Http404Exception($e);
        }
    }

    /**
     * @throws Http404Exception
     * @throws DbException
     * @throws ModelException
     */
    public function actionSave(): void
    {
        if (!empty($_GET['id'])) {
            try {
                $article = Article::findById($_GET['id']);
                $template = __DIR__ . '/../../Templates/News/Admin/edit.php';
            } catch (ItemNotFoundException $e) {
                throw new Http404Exception($e);
            }
        } else {
            $article = new Article();
            $template = __DIR__ . '/../../Templates/News/Admin/create.php';
        }

        try {
            $article->fill(['title' => trim($_POST['title']), 'lead' => trim($_POST['lead'])]);
            $article->save();
            header('Location: /admin');
        } catch (ModelErrors $exception) {
            $view = new View();
            $view->article = $article;
            $view->errors = $exception->getErrors();
            $view->display($template);
        }
    }
}