<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Exceptions\ExceptionDB;
use App\Models\News;

class NewsController extends Guest
{
    public function actionAllNews()
    {
        $this->view->news = News::findAll();
        $this->view->display(__DIR__ . '/../../template/tempAllNews.php');
    }

    public function actionOneNews()
    {
        $this->view->news = News::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../template/tempOneNews.php');
    }
}
