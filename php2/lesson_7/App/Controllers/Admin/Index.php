<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Exceptions\DbException;
use App\Exceptions\Http404Exception;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\ModelException;
use App\Models\Article;
use App\Models\Author;
use App\Services\AdminDataTable;

class Index extends AdminController
{
    /**
     * @throws DbException
     * @throws ItemNotFoundException
     */
    protected function actionAll(): void
    {
        $fns = [
            'id' => function ($model) {
                return $model->id;
            },
            'author_id' => function ($model) {
                return $model->author_id;
            },
            'title' => function ($model) {
                return $model->title;
            },
            'lead' => function ($model) {
                return $model->lead;
            }
        ];

        $adminTbl = new AdminDataTable(Article::findAll(), $fns);
        $adminTbl->render();
    }

    /**
     * @throws DbException
     */
    public function actionCreate(): void
    {
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../Templates/News/Admin/create.php');
    }

    /**
     * @throws DbException
     * @throws Http404Exception
     */
    public function actionEdit(): void
    {
        try {
            $this->view->authors = Author::findAll();
            $this->view->article = Article::findById($_GET['id']);
            $this->view->display(__DIR__ . '/../../Templates/News/Admin/edit.php');
        } catch (ItemNotFoundException $e) {
            throw new Http404Exception($e);
        }
    }

    /**
     * @throws DbException
     * @throws ItemNotFoundException
     * @throws Http404Exception
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
     * @throws DbException
     * @throws Http404Exception
     */
    public function actionSave(): void
    {
        $action = 'actionCreate';

        if (!empty($_GET['id'])) {
            try {
                $article = Article::findById($_GET['id']);
                $action = 'actionEdit';
            } catch (ItemNotFoundException $e) {
                throw new Http404Exception($e);
            }
        } else {
            $article = new Article();
        }

        try {
            $article->fill(
                [
                    'author_id' => trim($_POST['author_id']),
                    'title' => trim($_POST['title']),
                    'lead' => trim($_POST['lead'])
                ]
            );
            $article->save();
            header('Location: /admin');
        } catch (ModelException $exception) {
            $this->view->article = $article;
            $this->view->errors = $exception->getErrors();
            $this->$action();
        }
    }
}