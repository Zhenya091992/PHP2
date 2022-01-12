<?php

namespace App;

class Router
{
    /**
     * @var object $controller contain controller
     */
    protected $controller;

    /**
     * @param string $uri request URI
     *
     * из URI запроса формируется полное имя контроллера, а так же имя экшна.
     * при запросе '/Admin/admin.php/...' 'admin.php/' исключается из имени контроллера
     * затем запускается контроллер и его экшн
     */
    public function routing(string $uri)
    {
        $uri = preg_replace('#(?<=/php2/Admin/)admin.php/\.*#', '', $uri);

        preg_match('#[^(php2/)][\w{1,}/]{1,}/(\w{1,})#', $uri, $matches);
        $matches[2] = preg_replace('#/' . $matches[1] . '$#', '', $matches[0]);
        $nameController = 'App\controllers\\' . $matches[2] . 'Ctrl';
        $nameController = str_replace('/', '\\', $nameController);
        $this->controller = new $nameController();
        $this->controller->action($matches[1]);
    }
}
