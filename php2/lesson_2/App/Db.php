<?php

namespace App;

class Db
{
    protected object $dbh;
    protected object $sth;

    public function __construct()
    {
        $config = Config::init();
        $dsn = "{$config->data['db']['db']}:
                host={$config->data['db']['host']};
                dbname={$config->data['db']['dbname']}";
        $this->dbh = new \PDO(
            $dsn,
            $config->data['db']['login'],
            $config->data['db']['password']
        );
    }

    public function execute(string $sql, array $params = []): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        return $this->sth->execute($params);
    }

    public function getLastInsertId(): int
    {
        return $this->dbh->lastInsertId();
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
