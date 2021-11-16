<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=test', 'root', 'root');
    }

    public function execute($sql, array $data = null)
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function query($sql, $class, $data = null)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        var_dump($sth->errorInfo());
        return [];
    }
}