<?php

namespace App;

use App\Db;
use App\traits\MagicTrait;

/**
 * Class Model
 *
 * a class describing the behavior of the model
 *
 * @package App
 * @property int $id id database
 *
 */
abstract class Model implements \ArrayAccess, \Iterator
{
    use MagicTrait;

    /**
     * @var string TABLE constant
     */
    const TABLE = '';

    /**
     * Contains an object that connects to the database
     *
     * @property
     * @var \App\Db
     */
    protected static Db $db;

    /**
     * Creates a database connection object
     *
     * @return void
     */
    public static function connectDB()
    {
        !empty(static::$db) ?: static::$db = new Db();
    }

    /**
     * Finds all data of database
     *
     * Finds all data of database and returns it as array of objects or false
     *
     * @return \Generator
     */
    public static function findAll()
    {
        static::connectDB();

        return static::$db->queryEach(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    /**
     * Finds a row in the database by id
     *
     * @param int $id
     * @return Model array|false
     */
    public static function findById(int $id): array
    {
        static::connectDB();

        return static::$db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id = :id',
            static::class,
            [':id' => $id]
        );
    }

    /**
     * Finds a some quantity last inserted rows in the database
     *
     * grouped from the last
     *
     * @param int $quantity
     * @return array|false
     */
    public static function findLast(int $quantity)
    {
        static::connectDB();

        return static::$db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $quantity,
            static::class
        );
    }

    /**
     * Checking for the existence of a model
     *
     * @return bool
     */
    public function isNew(): bool
    {
        return empty($this->id);
    }

    /**
     * Insert object in to the database table
     *
     * Create new row in to the database table, and setting id Model
     *
     * @return void
     */
    public function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this->data as $property => $value) {
            if ('id' == $property) {
                continue;
            }
            $columns[] = $property;
            $values[':' . $property] = $value;
        }

        $sql = 'INSERT INTO' . static::TABLE . ' (' . implode(', ', $columns) . ') 
        VALUES (' . implode(', ', array_keys($values)) . ')';

        static::connectDB();
        if (static::$db->execute($sql, $values)) {
            $id = static::$db->lastInsertId();
            $this->id = $id;
        }
    }

    /**
     * Updating an existing row in a database table
     *
     * @return void
     */
    public function update()
    {
        $sqlShortFragment = [];
        foreach ($this->data as $property => $value) {
            $data[':' . $property] = $value;
            if ('id' == $property) {
                continue;
            }
            $sqlShortFragment[] = "$property = :$property ";
            $sqlFragment = implode(', ', $sqlShortFragment);
        }

        $sqlUpdate = (
            "UPDATE " . static::TABLE .
            " SET " . $sqlFragment .
            " WHERE " . "id = :id"
        );

        static::$db->query($sqlUpdate, static::class, $data);
    }

    /**
     * Saves object properties to the database
     *
     * @return void
     */
    public function save()
    {
        $this->isNew() ? $this->insert() : $this->update();
    }

    /**
     * Deletes a row of the corresponding object from the database
     *
     * @return void
     */
    public function delete()
    {
        $data = [':id' => $this->id];
        $sqlDelete = ("DELETE FROM " . static::TABLE . " WHERE id = :id");
        static::$db->execute($sqlDelete, $data);
    }
}
