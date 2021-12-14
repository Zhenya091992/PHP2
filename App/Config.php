<?php

namespace App;

class Config
{

    public $configData;
    protected static $instance = null;

    protected function __construct()
    {
        $this->configData = include __DIR__ . '../../config.php';
    }

    public static function instance()
    {
        if (static::$instance) {
            return static::$instance;
        }

        return static::$instance = new static();
    }
}
