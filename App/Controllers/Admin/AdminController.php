<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin;
use App\Exceptions\Exception404;
use App\Exceptions\MultiException;
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

        $this->view->news = News::findById((int) $_GET['id'])[0];
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../../template/tempAdminEditNews.php');
    }

    /**
     * if there is a news item with an "id", we save its object
     */
    public function actionSaveNews()
    {
        $news = new News();
        $this->view->authors = Author::findAll();
        $arrayPropertys = [
            'id' => $_GET['id'],
            'title' => $_POST['newTitle'],
            'shortDescription' => $_POST['newShortDescription'],
            'text' => $_POST['newText'],
            'author_id' => $_POST['author_id']
        ];
        try {
            $news->fill($arrayPropertys);
        } catch (MultiException $errs) {
            $this->view->errs = $errs;
            $this->view->news = $news;
            $this->view->display(__DIR__ . '/../../../template/tempAdminEditNews.php');
        }

        if (!isset($this->view->errs)) {
            $news->save();
            $this->view->news = $news;
            $this->view->display(__DIR__ . '/../../../template/tempAdminSave.php');
        }
/*

*/
    }

    public function actionSignIn()
    {
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            try {
                if ($user = User::checkUser($_POST['user'], $_POST['password'])) {
                    $_SESSION['user'] = $_POST['user'];
                }
            } catch (Exception404 $err) {
                $this->view->err = 'неверный логин или пароль';
                $this->view->display(__DIR__ . '/../../../template/tempErrors.php');
            }
        }

        if (!empty($_SESSION['user'])) {
            $this->actionAllNews();
        } else if (empty($err)) {
            $this->view->display(__DIR__ . '/../../../template/tempAdminSignIn.php');
        }
    }
}
