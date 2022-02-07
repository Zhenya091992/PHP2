<?php

use App\Exceptions\ExceptionDB;
use App\Exceptions\Exception404;
use App\Router;
use App\View;

require __DIR__ . '/autoload.php';

try {
    $router = new Router();
    $router->routing($_SERVER['REQUEST_URI']);
} catch (ExceptionDB $err) {
    $view = new View();
    $view->err = $err->getMessage();
    $view->display(__DIR__ . '/template/tempErrors.php');
} catch (Exception404 $err) {
    $view = new View();
    $view->display(__DIR__ . '/template/tempError404.php');
}
