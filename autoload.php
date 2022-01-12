<?php
define('ROOT', __DIR__);

spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $path = ROOT . '/' . $className . '.php';
    require $path;
});
