<?php

namespace App\Controllers;

use App\Exceptions\Exception404;
use App\View;
use App\ViewTwig;

abstract class Controller
{
    /**
     * @var View|bool
     */
    protected $view;

    protected $viewEngine;

    /**
     * Controller constructor.
     * create new object View
     */
    public function __construct()
    {
        if ($this->viewEngine === 'php') {
            $this->view = new View();
        } elseif ($this->viewEngine === 'twig') {
            $this->view = new ViewTwig(__DIR__ . '/../../public/template/');
        } else {
            throw new Exception404('Ошибка 404 - не найден или некорректен файл viewEngine');
        }
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
