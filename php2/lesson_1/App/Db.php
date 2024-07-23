<?php

namespace App;

use PDO;

class Db
{
    protected object $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): array|false
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if (false === $res) {
            return false;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }
}
