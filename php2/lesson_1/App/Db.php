<?php

namespace App;

class Db
{
    protected object $dbh;
    protected object $sth;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function execute(string $sql, array $params = []): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        return $this->sth->execute($params);
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): array|false
    {
        $this->sth = $this->dbh->prepare($sql);
        $res = $this->sth->execute($params);

        if (false === $res) {
            return false;
        }

        $data = $this->sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return empty($data) ? false : $data;
    }
}