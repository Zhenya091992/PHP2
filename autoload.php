<?php
session_start();

spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $path = __DIR__ . '/' . $className . '.php';
    require $path;
});
