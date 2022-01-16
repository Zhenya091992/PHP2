<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
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
