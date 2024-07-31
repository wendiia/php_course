<?php

namespace App;

use PDO;
use stdClass;

class Db
{
    protected object $dbh;

    public function __construct()
    {
        $config = Config::getInstance();
        $dsn = "{$config->data['db']['db']}:
                host={$config->data['db']['host']};
                dbname={$config->data['db']['dbname']}";
        $this->dbh = new PDO(
            $dsn,
            $config->data['db']['login'],
            $config->data['db']['password']
        );
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function getLastInsertId(): int
    {
        return $this->dbh->lastInsertId();
    }

    public function query(string $sql, array $params = [], $class = stdClass::class): array|false
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if (false === $res) {
            return false;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }
}
