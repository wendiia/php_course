<?php

namespace App;

use PDO;

class DB
{
    protected string $pathConfig = __DIR__ . '/../data/config.txt';
    protected string $dsn;
    protected object $dbh;
    protected object $sth;

    public function __construct()
    {
        $this->dsn = file_get_contents($this->pathConfig);
        $this->dbh = new PDO($this->dsn, 'root', '');
    }

    public function execute(string $sql): bool
    {
        $this->prepare($sql);
        return $this->sth->execute();
    }

    public function query(string $sql, array $data = []): array | false
    {
        $this->prepare($sql);
        $res = $this->sth->execute($data);

        if (false === $res) {
            return false;
        }

        return $this->sth->fetchAll();
    }

    public function prepare(string $sql): void
    {
        $this->sth = $this->dbh->prepare($sql);
    }
}
