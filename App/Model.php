<?php

namespace App;

use \App;

abstract class Model
{
    const TABLE = '';

    public $id;

    protected static $db;

    public static function connectDB()
    {
        if (empty(static::$db)) {
            static::$db = Db::instance();
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

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this as $property => $value) {
            if ('id' == $property) {
                continue;
            }
            $columns[] = $property;
            $values[':' . $property] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $columns) . ') 
        VALUES (' . implode(', ', array_keys($values)) . ')';

        static::connectDB();
        if (static::$db->execute($sql, $values)) {
            $this->id = static::$db->lastIncertId();
        }
    }

    public function update()
    {
        $sqlShortFragment = [];
        foreach ($this as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sqlShortFragment[] = "$key = :$key ";
            $sqlFragment = implode(', ', $sqlShortFragment);
        }

        $sqlUpdate = (
            "UPDATE " . static::TABLE .
            " SET " . $sqlFragment .
            " WHERE " . "id = :id"
        );
        static::$db->query($sqlUpdate, static::class, $data);
    }

    public function save()
    {
        if ($this->isNew()) {
            return $this->insert();
        } else {

            return $this->update();
        }
    }

    public function delete()
    {
        $data = [':id' => $this->id];
        $sqlDelete = ("DELETE FROM " . static::TABLE . " WHERE id = :id");
        static::$db->execute($sqlDelete, $data);
    }
}
