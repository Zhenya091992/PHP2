<?php

namespace App;

/**
 * Class Config
 *
 * @package App
 */
class Config
{
    /**
     * @var array contain array config data
     */
    public $configData;
    /**
     * @var null|self contain object self class
     */
    protected static $instance = null;

    /**
     * create singleton Config
     *
     * @return Config
     */
    public static function instance()
    {
        if (!static::$instance) {
            return static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Config protected constructor.
     *
     * read config.php file and fill $configData
     */
    protected function __construct()
    {
        $this->configData = include __DIR__ . '../../config.php';
    }
}
