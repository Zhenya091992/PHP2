<?php
session_start();

spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    if (file_exists($path = __DIR__ . '/' . $className . '.php')) {
        include $path;
    }
});

require __DIR__ . '/vendor/autoload.php';
