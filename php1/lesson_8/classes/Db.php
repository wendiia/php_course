<?php

class Db
{
    protected string $pathConfig = __DIR__ . '/../data/config.txt';
    protected array $dsn;
    protected object $dbh;
    protected object $sth;

    public function __construct()
    {
        $this->dsn = explode('   ', file_get_contents($this->pathConfig));
        $password =  true === !empty($this->dsn[2])  ? '' : $this->dsn[2];
        $this->dbh = new PDO($this->dsn[0], $this->dsn[1], $password);
    }

    public function execute(string $sql): bool
    {
        $this->sth = $this->dbh->prepare($sql);
        return $this->sth->execute();
    }

    public function query(string $sql, array $data = []): array | false
    {
        $this->sth = $this->dbh->prepare($sql);
        $res = $this->sth->execute($data);

        if (false === $res) {
            return false;
        }

        return $this->sth->fetchAll();
    }
}
