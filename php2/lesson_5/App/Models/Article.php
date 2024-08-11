<?php

namespace App\Models;

use App\Db;
use App\Exceptions\DbException;
use App\Model;

/**
 * @property Author $author
 */
class Article extends Model
{
    protected static string $table = 'news';
    public ?int $author_id = null;
    public string $title;
    public string $lead;

    /**
     * @throws DbException
     */
    public function __get(string $key): mixed
    {
        if ('author' === $key) {
            $db = new Db();
            $sql = "SELECT * FROM authors WHERE id = :id";
            return $db->query($sql, ['id' => $this->author_id], Author::class)[0];
        } elseif (isset($key)) {
            return $this->$key;
        }

        return null;
    }

    public function __isset(string $name): bool
    {
        return isset($this->$name);
    }
}
