<?php

namespace App;

abstract class Model
{
    protected ?int $id = null;
    protected static string $table = '';
    public static function findAll(): array | false
    {
        $db = new Db();
        $sql = "SELECT * FROM " . static::$table;

        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id): object | false
    {
        $db = new Db();
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $record = $db->query($sql, ['id' => $id], static::class);

        return !empty($record) ? $record[0] : false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
