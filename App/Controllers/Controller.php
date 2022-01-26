<?php

namespace App\Controllers;

use App\View;

abstract class Controller
{
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
