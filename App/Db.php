<?php

namespace App;

use App\Exceptions\Exception404;
use App\Exceptions\ExceptionDB;
use PDO;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Db
 * @package App
 */
class Db implements LoggerAwareInterface
{
    /**
     * contain PDO object
     *
     * @var PDO $dbh
     */
    protected $dbh;
    /**
     * contain Config object
     *
     * @var Config
     */
    protected $config;

    private $logger;

    /**
     * creates a connection to the database
     */
    public function __construct()
    {
        $this->setLogger(new Logger());                              //подключаем логер
        $this->config = Config::instance();                          //конфигурация БД

        try {
            $this->dbh = new \PDO(
                $this->config->configData['db']['driver'] .         //DSN
                ':host=' . $this->config->configData['db']['host'] .
                ';dbname=' . $this->config->configData['db']['dbname'],

                $this->config->configData['db']['user'],                //user
                $this->config->configData['db']['password']             //password
            );
        } catch (\PDOException $err) {
            throw  new ExceptionDB(' ошибка соединения базы данных.');
        }
    }

    /**
     * executes the request
     *
     * @param string $sql request
     * @param array|null $data array with placeholders|null
     * @return bool
     */
    public function execute(string $sql, array $data = null): bool
    {
        $sth = $this->dbh->prepare($sql);

        if ($result = $sth->execute($data)) {
            if (!empty($result)) {
                return $result;
            } else {
                throw new Exception404('нет совпадений в базе данных');
            }
        } else {
            throw new ExceptionDB('ошибка в запросе');
        }
    }

    /**
     * executes the request and returns the data
     *
     * @param string $sql request
     * @param string|null $class name class
     * @param array|null $data array with placeholders|null
     * @return array
     */
    public function query(string $sql,string $class = null, $data = null): array
    {
        $sth = $this->dbh->prepare($sql);
        if ($sth->execute($data)) {
            if (null == $class) {
                $result = $sth->fetchAll();
                if (!empty($result)) {
                    return $result;
                } else {
                    throw new Exception404('нет совпадений в базе данных');
                }
            } else {
                $result = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
                if (!empty($result)) {
                    return $result;
                } else {
                    throw new Exception404('нет совпадений в базе данных');
                }
            }
        } else {
            throw new ExceptionDB('ошибка в запросе');
        }
    }

    public function queryEach(string $sql,string $class = null, $data = null)
    {
        $sth = $this->dbh->prepare($sql);
        if ($sth->execute($data)) {
            if (null == $class) {
                while ($result = $sth->fetch()) {
                    yield $result;
                }
            } else {
                $sth->setFetchMode(PDO::FETCH_CLASS, $class);
                while ($result = $sth->fetch()) {
                    yield $result;
                }
            }
        } else {
            throw new ExceptionDB('ошибка в запросе');
        }
    }

    /**
     * return last insert id
     *
     * @return string
     */
    public function lastInsertId(): string
    {
        return $this->dbh->lastInsertId();
    }

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
