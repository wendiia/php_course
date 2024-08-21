<?php

namespace App\Controllers;

use App\Exceptions\DbException;
use App\Exceptions\Http404Exception;
use App\Exceptions\ItemNotFoundException;
use App\Models\Article;

class Index extends Controller
{
    /**
     * @throws DbException
     */
    protected function actionAll(): void
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/News/index.php');
    }

    /**
     * @throws Http404Exception
     * @throws DbException
     */
    protected function actionOne(): void
    {
        try {
            $this->view->article = Article::findById($_GET['id']);
            $this->view->display(__DIR__ . '/../Templates/News/article.php');
        } catch (ItemNotFoundException $e) {
            throw new Http404Exception($e);
        }
    }
}