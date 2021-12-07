<?php

namespace App;

use \App;

abstract class Model
{
    use \App\traits\MagicGetSetIsset;

    const TABLE = '';



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
        foreach ($this->data as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (`' . implode('`, `', $columns) . '`) 
        VALUES (' . implode(', ', array_keys($values)) . ')';

        static::connectDB();
        if (static::$db->execute($sql, $values)) {
            $id = static::$db->query('SELECT LAST_INSERT_ID()');
            $this->id = $id[0]['LAST_INSERT_ID()'];

            return true;
        } else {

            return false;
        }
    }

    public function update()
    {
        $sqlShortFragment = [];
        foreach ($this->data as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sqlShortFragment[] = "`$key` = :$key ";
            $sqlFragment = implode(', ', $sqlShortFragment);
        }

        $sqlUpdate = (
            "UPDATE " . static::TABLE .
            " SET " . $sqlFragment .
            " WHERE " . "`id`=:id"
        );

        return static::$db->query($sqlUpdate, static::class, $data);
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
        $sqlDelete = ("DELETE FROM " . static::TABLE . " WHERE `id`=:id");

        return static::$db->execute($sqlDelete, $data);
    }
}
