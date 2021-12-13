<?php

namespace App;

use App\traits\Singleton;

/**
 * Class Db
 * @package App
 */
class Db
{
    use Singleton;

    /**
     * contain PDO object
     *
     * @var \PDO
     */
    protected $dbh;
    /**
     * contain Config object
     *
     * @var Config
     */
    protected $config;

    /**
     * creates a connection to the database
     */
    protected function __construct()
    {
        $this->config = Config::instance();                          //конфигурация БД

        $this->dbh = new \PDO(
            $this->config->configData['db']['driver'] .         //DSN
            ':host=' . $this->config->configData['db']['host'] .
            ';dbname=' . $this->config->configData['db']['dbname'],

            $this->config->configData['db']['user'],                //user
            $this->config->configData['db']['password']);           //password
    }

    /**
     * executes the request
     *
     * @param string $sql request
     * @param array|null $data array with placeholders|null
     * @return bool
     */
    public function execute(string $sql, array $data = null) :bool
    {
        $sth = $this->dbh->prepare($sql);

        return $sth->execute($data);
    }

    /**
     * executes the request and returns the data
     *
     * @param string $sql request
     * @param string|null $class name class
     * @param array|null $data array with placeholders|null
     * @return array
     */
    public function query(string $sql,string $class = null, $data = null) :array
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

    /**
     * return last insert id
     *
     * @return string
     */
    public function lastInsertId() :string
    {
        return $this->dbh->lastInsertId();
    }
}
