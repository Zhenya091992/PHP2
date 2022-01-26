<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin;
use App\Models\News;
use App\Models\Author;
use App\Models\User;

class AdminController extends Admin
{
    public function actionAllNews()
    {
        $this->view->news = News::findAll();
        $this->view->display(__DIR__ . '/../../../template/tempAdminAllNews.php');
    }

    public function actionEditNews()
    {
        $this->view->news = News::findById((int) $_GET['id']);
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../../template/tempAdminEditNews.php');
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
        $this->view->display(__DIR__ . '/../../../template/tempAdminSave.php');
    }

    public function actionSignIn()
    {

        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            if ($user = User::findInTable('nameUser', $_POST['user'])) {
                if ($user[0]->password == $_POST['password']) {
                    $_SESSION['user'] = $_POST['user'];
                }
            }
        }
        if (!empty($_SESSION['user'])) {
            $this->actionAllNews();
        } else {
            $this->view->display(__DIR__ . '/../../../template/tempAdminSignIn.php');
        }
    }
}
