<?php

namespace App;

use App\Controllers\Controller;
use App\Controllers\NewsController;
use App\Exceptions\Exception404;

class Router
{
    /**
     * @var Controller $controller contain controller
     */
    protected Controller $controller;

    /**
     * @param string $uri request URI
     *
     * если в $uri только /php2/, тогда открываем начальную страницу News/AllNews.
     * из URI запроса формируется полное имя контроллера, а так же имя экшна.
     * если полученный контроллер или экшн не существует, даем ошибку 404
     * затем запускается контроллер и его экшн
     * @throws Exception404
     */
    public function routing(string $uri)
    {
        if ($uri == '/php2/') {
            $this->controller = new NewsController();
            $this->controller->action('actionAllNews');
        } else {
            preg_match('#[^(PHP2/)][\w{1,}/]{1,}/(\w{1,})#', $uri, $matches);
            $matches[2] = preg_replace('#/' . $matches[1] . '$#', '', $matches[0]);
            $nameController = 'App/Controllers/' . $matches[2] . 'Controller';
            $nameControllerNamespace = str_replace('/', '\\', $nameController);
            $nameAction = 'action' . $matches[1];

            if (
                file_exists(__DIR__ . '/../' . $nameController . '.php') &&
                $nameController != 'App/Controllers/Controller'
            ) {
                if (method_exists($nameControllerNamespace, $nameAction)) {
                    $this->controller = new $nameControllerNamespace();
                    $this->controller->action($nameAction);
                } else {
                    throw new Exception404('action not found.');
                }
            } else {
                throw new Exception404( 'controller not found.');
            }
        }
    }
}
