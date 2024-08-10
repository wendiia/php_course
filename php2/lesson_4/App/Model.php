<?php

namespace App;

abstract class Model
{
    protected ?int $id = null;
    protected static string $table = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public static function findAll(): array | false
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Db();

        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id): object | false
    {
        $sql = 'SELECT * FROM ' . static::$table . " WHERE id = :id";
        $db = new Db();
        $record = $db->query($sql, ['id' => $id], static::class);

        return !empty($record) ? $record[0] : false;
    }

    public function update(): bool
    {
        $db = new Db();
        $sets = [];
        $data = [];
        $fields = get_object_vars($this);

        foreach ($fields as $name => $value) {
            $data[':' . $name] = $value;
            if ($name !== 'id') {
                $sets[] = $name . "=:" . $name;
            }
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' .
            implode(', ', $sets) .
            " WHERE id=:id";

        return $db->execute($sql, $data);
    }

    public function insert(): bool
    {
        $db = new Db();
        $sets = [];
        $data = [];
        $keys = [];
        $fields = get_object_vars($this);

        foreach ($fields as $name => $value) {
            if ($name !== 'id') {
                $data[':' . $name] = $value;
                $sets[] =  ":" . $name;
                $keys[] = $name;
            }
        }

        $sql = 'INSERT INTO ' . static::$table .
            ' (' . implode(', ', $keys) . ')
            VALUES (' . implode(', ', $sets) . ')';

        $res = $db->execute($sql, $data);

        if (true === $res) {
            $this->id = $db->getLastInsertId();
            return true;
        }

        return false;
    }

    public function save(): bool
    {
        if (!empty($this->id)) {
            return $this->update();
        }

        return $this->insert();
    }

    public function delete(): bool
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . " WHERE id=:id";
        return $db->execute($sql, ['id' => $this->id]);
    }
}
