<?php

namespace App\Controllers;

use App\Models\News;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class NewsController extends Guest
{
    public function __construct()
    {
        $this->viewEngine = 'twig';
        parent::__construct();
    }

    public function actionAllNews()
    {
        $this->view->display(
            'tempAllNews.twig',
            [
            'allNews' => News::findAll(),
            'timer' => isset($_SESSION['timer']) ? $_SESSION['timer'] : null
            ]
        );
    }

    public function actionOneNews()
    {
        $this->view->display(
            'tempOneNews.twig',
            [
                'news' => $news = News::findById($_GET['id'])[0],
                'author' => $news->author,
                'timer' => $_SESSION['timer']
            ]
        );
    }
}
