<?php

namespace App\Models;

use App\Db;
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

    public function __get($key): ?object
    {
        if (isset($this->$key)) {
            $db = new Db();
            $sql = "SELECT * FROM authors WHERE id = :id";
            return $db->query($sql, ['id' => $this->author_id], Author::class)[0];
        }

        return null;
    }

    public function __isset(string $name): bool
    {
        if ('author' === $name) {
            return isset($this->author_id);
        }

        return isset($this->$name);
    }
}
