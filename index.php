<?php

use App\Exceptions\ExceptionDB;
use App\Exceptions\Exception404;
use App\Router;
use App\View;
use App\Logger;
use SebastianBergmann\Timer\Timer;
use SebastianBergmann\Timer\ResourceUsageFormatter;

require __DIR__ . '/autoload.php';

$timer = new Timer();
$timer->start();

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
} finally {
    $log = new Logger();
    $log->debug('Duration index.php ' . (new ResourceUsageFormatter)->resourceUsage($timer->stop()));
}
