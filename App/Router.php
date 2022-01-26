<?php

namespace App;

use App\Controllers\NewsController;

class Router
{
    /**
     * @var object $controller contain controller
     */
    protected $controller;

    /**
     * @param string $uri request URI
     *
     * если в $uri только /php2/, тогда открываем начальную страницу News/AllNews.
     * из URI запроса формируется полное имя контроллера, а так же имя экшна.
     * если полученный контроллер или экшн не существует, даем ошибку 404
     * затем запускается контроллер и его экшн
     */
    public function routing(string $uri)
    {
        if ($uri == '/php2/') {
            $this->controller = new NewsController();
            $this->controller->action('actionAllNews');
        } else {
            preg_match('#[^(php2/)][\w{1,}/]{1,}/(\w{1,})#', $uri, $matches);
            $matches[2] = preg_replace('#/' . $matches[1] . '$#', '', $matches[0]);
            $nameController = 'App\Controllers\\' . $matches[2] . 'Controller';
            $nameController = str_replace('/', '\\', $nameController);
            $nameAction = 'action' . $matches[1];

            if (
                file_exists(__DIR__ . '/../' . $nameController . '.php') &&
                $nameController != 'App\Controllers\Controller'
            ) {
                if (method_exists($nameController, $nameAction)) {
                    $this->controller = new $nameController();
                    $this->controller->action($nameAction);
                } else {
                    echo 'error 404';
                }
            } else {
                echo 'error 404';
            }
        }
    }
}
