<?php

namespace App\Controllers;

use App\Models\News;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class NewsController extends Guest
{
    public function actionAllNews()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../public/template/');
        $twig = new Environment($loader);
        $template = $twig->load('tempAllNews.twig');
        $template->display([
            'allNews' => News::findAll(),
            'timer' => $_SESSION['timer']
        ]);
    }

    public function actionOneNews()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../public/template/');
        $twig = new Environment($loader);
        $template = $twig->load('tempOneNews.twig');
        $template->display([
            'news' => $news = News::findById($_GET['id'])[0],
            'author' => $news->author,
            'timer' => $_SESSION['timer']
        ]);
    }
}
