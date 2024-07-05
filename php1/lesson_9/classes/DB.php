<?php

namespace App;

use PDO;

class DB
{
    protected string $dsn;
    protected object $dbh;
    protected object $sth;

    public function __construct()
    {
        $this->dsn = file_get_contents(__DIR__ . '/../data/config.txt');
        $this->dbh = new PDO($this->dsn, 'root', '');
    }

    public function execute(string $sql, array $data = null): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        return $this->sth->execute($data);
    }

    public function getLastInsertId(): int
    {
        return $this->dbh->lastInsertId();
    }

    public function query(string $sql, array $data = null): array|false
    {
        $this->sth = $this->dbh->prepare($sql);
        $res = $this->sth->execute($data);

        if (false === $res) {
            return false;
        }

        return $this->sth->fetchAll();
    }
}
