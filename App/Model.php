<?php

namespace App;

abstract class Model
{
    const TABLE = '';

    protected static $db;

    public static function connectDB()
    {
        if (empty(static::$db)) {
            static::$db = new Db();
        }
    }

    public static function findAll()
    {
        static::connectDB();

        return static::$db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findById($id)
    {
        static::connectDB();

        return static::$db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE `id`=:id',
            static::class,
            [':id' => $id]
        );
    }

    public static function findLast($quantity)
    {
        static::connectDB();

        return static::$db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY `id` DESC LIMIT ' . $quantity,
            static::class
        );
    }
}
