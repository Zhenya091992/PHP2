<?php

include __DIR__ . '/../autoload.php';

//checking object App\Db()
$connect = new App\Db();

//checking the method execute()
assert(true === $connect->execute('SELECT * FROM test WHERE `id`=:id', [':id' => 1]));
assert(true === $connect->execute('SELECT * FROM test'));

//checking the method query()
assert(false != $connect->query('SELECT * FROM test WHERE `id`=:id', 'App\Models\User', [':id' => 1]));
assert(false != $connect->query('SELECT * FROM test', 'App\Models\User'));

//checking object App\Model()
$connect = new App\Models\News();

//checking the method findById()
$connect = new App\Models\News();
assert(false != $connect->findById(13));
$connect = new App\Models\User();
assert(false != $connect->findById(1));
