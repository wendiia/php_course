<?php

namespace App;

use App\Exceptions\DbException;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\ModelException;

abstract class Model
{
    protected ?int $id = null;
    protected static string $table = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @throws ModelException
     */
    public function fill(array $data, string $validateClassName = ''): void
    {
        if (!empty($validateClassName)) {
            $class = $validateClassName;
        } else {
            $modelNameParts = explode('\\', static::class);
            $validateClassName = end($modelNameParts);
            $class = 'App\\Services\\Validation\\' . $validateClassName . 'Validate';
        }

        $validator = new $class();
        $validator->validate($data);

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * @throws DbException
     */
    public static function findAll(): array | false
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Db();

        return $db->query($sql, [], static::class);
    }

    /**
     * @throws DbException
     * @throws ItemNotFoundException
     */
    public static function findById(int $id): object | false
    {
        $sql = 'SELECT * FROM ' . static::$table . " WHERE id = :id";
        $db = new Db();
        $record = $db->query($sql, ['id' => $id], static::class);

        if (empty($record)) {
            throw new ItemNotFoundException('Item not found');
        }

        return $record[0];
    }

    /**
     * @throws DbException
     */
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

    /**
     * @throws DbException
     */
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

    /**
     * @throws DbException
     */
    public function save(): bool
    {
        if (!empty($this->id)) {
            return $this->update();
        }

        return $this->insert();
    }

    /**
     * @throws DbException
     */
    public function delete(): bool
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::$table . " WHERE id=:id";
        return $db->execute($sql, ['id' => $this->id]);
    }
}
