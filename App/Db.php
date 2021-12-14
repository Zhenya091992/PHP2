<?php

namespace App;

class Db
{
    use Singleton;

    protected $dbh;
    protected $config;

    protected function __construct()
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

    public function query($sql, $class = null, $data = null)
    {
        $sth = $this->dbh->prepare($sql);
        if ($sth->execute($data)) {
            if (null == $class) {

                return $sth->fetchAll();
            } else {

                return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            }
        }

        return [];
    }

    public function lastIncertId()
    {
        return $this->dbh->lastInsertId();
    }
}
