<?php

namespace App;

use App\Exceptions\DbException;
use PDO;
use PDOException;
use stdClass;
use Generator;

class Db
{
    protected object $dbh;

    /**
     * @throws DbException
     */
    public function __construct()
    {
        try {
            $config = Config::getInstance();
            $dsn = $config->data['db']['db'] .
                ':host=' . $config->data['db']['host'] .
                ';dbname=' . $config->data['db']['dbname'];
            $this->dbh = new PDO(
                $dsn,
                $config->data['db']['login'],
                $config->data['db']['password']
            );
        } catch (PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * @throws DbException
     */
    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);

        try {
            return $sth->execute($params);
        } catch (PDOException $e) {
            throw new DbException($e);
        }
    }

    public function getLastInsertId(): int
    {
        return $this->dbh->lastInsertId();
    }

    /**
     * @throws DbException
     */
    public function query(string $sql, array $params = [], string $class = stdClass::class): array|false
    {
        $sth = $this->dbh->prepare($sql);

        try {
            $sth->execute($params);
            return $sth->fetchAll(PDO::FETCH_CLASS, $class);
        } catch (PDOException $e) {
            throw new DbException($e);
        }
    }

    /**
     * @throws DbException
     */
    public function queryEach(string $sql, array $params = [], string $class = stdClass::class): Generator
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            $sth->setFetchMode(PDO::FETCH_CLASS, $class);

            while ($record = $sth->fetch(PDO::FETCH_CLASS)) {
                yield $record;
            }
        } catch (PDOException $e) {
            throw new DbException($e);
        }
    }
}
