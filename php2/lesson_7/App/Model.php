<?php

namespace App;

use App\Exceptions\DbException;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\ModelErrors;
use App\Exceptions\ModelException;
use Generator;

abstract class Model
{
    protected ?int $id = null;
    protected static string $table = '';

    public function __get(string $key): mixed
    {
        if (isset($this->$key)) {
            return $this->$key;
        }

        return null;
    }

    public function __set(string | int $key, mixed $value): void
    {
        if (isset($this->$key)) {
            $this->$key = $value;
        }
    }

    public function __isset(string $key): bool
    {
        return isset($this->$key);
    }

    /**
     * @throws ModelException
     * @throws ModelErrors
     */
    protected function setProperty(string $key, $value): void
    {
        $nameValidateMethod = 'validate' . str_replace('_', '', $key);

        if (method_exists($this, $nameValidateMethod)) {
            $this->$nameValidateMethod($value);
            $this->$key = $value;
        } else {
            throw new ModelException('Такого свойства у модели не существует!');
        }
    }

    /**
     * @throws ModelException
     */
    public function fill(array $data): void
    {
        $multiExceptions = new ModelException();

        foreach ($data as $key => $value) {
            try {
                $this->setProperty($key, $value);
            } catch (ModelErrors $e) {
                $multiExceptions->$key = $e->getErrors();
            } catch (ModelException $e) {
                $multiExceptions->$key = $e;
            }
        }

        if (!empty($multiExceptions->getErrors())) {
            throw $multiExceptions;
        }
    }

    /**
     * @throws DbException
     */
    public static function findAll(): Generator
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Db();

        return $db->queryEach($sql, [], static::class);
    }

    /**
     * @throws DbException
     * @throws ItemNotFoundException
     */
    public static function findById(int $id): object|false
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
                $sets[] = ":" . $name;
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
