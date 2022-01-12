<?php

use App\Router;

require __DIR__ . '/../autoload.php';

$router = new Router();
$router->routing($_SERVER['REQUEST_URI']);
