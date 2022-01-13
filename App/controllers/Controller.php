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
     * @param string $action name action
     *
     * calls an action
     */
    public function action(string $nameMethod)
    {
        $this->$nameMethod();
    }
}
