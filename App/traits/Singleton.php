<?php

namespace App\traits;

trait Singleton
{
    /**
     * contain object
     *
     * @var static|null $instance contain object
     */
    protected static $instance = null;

    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }

    /**
     * @return static|null
     */
    public static function instance()
    {
        if (empty(static::$instance)) {

            return static::$instance = new static();
        } else {

            return static::$instance;
        }
    }
}
