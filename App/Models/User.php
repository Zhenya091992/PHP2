<?php

namespace App\Models;

use App\Model;

/**
 * Class User
 *
 * @package App\Models
 *
 * @property $nameUser
 */
class User extends Model
{
    /**
     * @var string TABLE constant
     */
    const TABLE = 'users';

    public static function checkUser(string $nameUser, string $password)
    {
        Model::connectDB();

        $user = static::$db->query(
            'SELECT * FROM ' . static::TABLE . " WHERE nameUser = :nameUser",
            self::class,
            [":nameUser" => $nameUser]
        )[0];

        return password_verify($password, $user['passwordHash']);
    }
}
