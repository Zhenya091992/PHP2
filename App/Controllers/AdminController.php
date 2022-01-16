<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\News;
use App\Models\Author;

class AdminController extends Controller
{
    public function actionAllNews()
    {
        $this->view->news = News::findAll();
        $this->view->display(__DIR__ . '/../../template/tempAdminAllNews.php');
    }

    public function actionEditNews()
    {
        $this->view->news = News::findById((int) $_GET['id']);
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../template/tempAdminEditNews.php');
    }

    /**
     * if there is a news item with an "id", we save its object
     */
    public function actionSaveNews()
    {
        if  ($news = News::findById($_GET['id'])) {
            $news[0]->title = $_POST['newTitle'];
            $news[0]->shortDescription = $_POST['newShortDescription'];
            $news[0]->text = $_POST['newText'];
            $news[0]->author_id = $_POST['author_id'];
            $news[0]->save();
        }
        $this->view->news = $news;
        $this->view->display(__DIR__ . '/../../template/tempAdminSave.php');
    }
}
