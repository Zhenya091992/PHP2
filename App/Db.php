<?php

namespace App;

class Db
{
    protected $dbh;
    protected $config;

    public function __construct()
    {
        $this->config = Config::instance();                         //конфигурация БД

        $this->dbh = new \PDO(
            $this->config->configData['db']['driver'] .         //DSN
            ':host=' . $this->config->configData['db']['host'] .
            ';dbname=' . $this->config->configData['db']['dbname'],

            $this->config->configData['db']['user'],                //user
            $this->config->configData['db']['password']);           //password
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