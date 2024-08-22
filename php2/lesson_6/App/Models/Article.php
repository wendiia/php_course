<?php

namespace App\Models;

use App\Db;
use App\Exceptions\DbException;
use App\Exceptions\Errors;
use App\Model;
use Exception;

/**
 * @property Author $author
 */
class Article extends Model
{
    protected static string $table = 'news';
    protected ?int $author_id = null;
    protected string $title;
    protected string $lead;

    /**
     * @throws DbException
     */
    public function __get(string $key): mixed
    {
        if ('author' === $key) {
            $db = new Db();
            $sql = "SELECT * FROM authors WHERE id = :id";
            return $db->query($sql, ['id' => $this->author_id], Author::class)[0];
        } elseif (isset($this->$key)) {
            return $this->$key;
        }

        return null;
    }

    /**
     * @throws DbException
     * @throws Errors
     */
    protected function validateAuthorId(int $author_id): void
    {
        $errors = new Errors();

        if (!empty($author_id)) {
            if (false === Author::findById($author_id)) {
                $errors->addError(new Exception('Такого автора не существует'));
            }
        } else {
            $errors->addError(new Exception('Поле автора статьи не может быть пустым'));
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }

    /**
     * @throws Errors
     */
    protected function validateTitle(string $title): void
    {
        $errors = new Errors();

        if (!empty($title)) {
            if (strlen($title) > 20) {
                $errors->addError(new Exception('Название должно быть менее 20 символов'));
            }
            if (str_contains($title, '!')) {
                $errors->addError(new Exception('Название не должно иметь символ "!"'));
            }
        } else {
            $errors->addError(new Exception('Название статьи не может быть пустым'));
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }

    /**
     * @throws Errors
     */
    protected function validateLead(string $lead): void
    {
        $errors = new Errors();

        if (!empty($lead)) {
            if (strlen($lead) < 10) {
                $errors->addError(new Exception('Описание должно быть не менее 10 символов'));
            }
            if (str_contains($lead, '*')) {
                $errors->addError(new Exception('Описание не должно иметь символ "*"'));
            }
        } else {
            $errors->addError(new Exception('Описание статьи не может быть пустым'));
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }
}
