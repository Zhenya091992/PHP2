<?php

namespace App\controllers;

use App\Models\Author;
use App\Models\News;
use App\View;

class Controller
{
    /**
     * @var object Controller
     */
    protected $ctrl;

    /**
     * @var View|bool
     */
    protected $view;

    /**
     * Controller constructor.
     * create new object View
     */
    public function __construct()
    {
        $this->view = !empty($this->view) ?: new View();
    }

    /**
     * @param string $controller name controller
     * @param string $action name action
     *
     * creates a controller object and calls an action
     */
    public final function controller(string $controller, string $action)
    {
        $nameController = 'App\\controllers\\' . $controller . 'Ctrl';
        $this->ctrl = new  $nameController();
        $this->ctrl->action($action);
    }

    /**
     * @param string $action name action
     *
     * calls an action
     */
    public final function action(string $action)
    {
        $nameMethod = 'action' . $action;
        $this->$nameMethod();
    }
}
