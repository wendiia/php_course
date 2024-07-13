<?php

namespace App;

use App\Models\Article;

abstract class Model
{
    protected ?int $id = null;
    protected static string $table = '';
    public static function findAll(): array | false
    {
        $sql = "SELECT * FROM " . static::$table;
        $db = new Db();

        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id): Article | false
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $db = new Db();
        $article = $db->query($sql, ['id' => $id], static::class);

        return !empty($article) ? $article[0] : false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}