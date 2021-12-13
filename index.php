<?php

use App\Models\News;
use App\Models\Author;

require __DIR__ . '/autoload.php';

if ($_GET['action'] == 'create') {
    if (
        !empty($_POST['title']) &&
        !empty($_POST['shortDescription']) &&
        !empty($_POST['text'])
    ) {
        $news = new News();
        $news->title = $_POST['title'];
        $news->shortDescription = $_POST['shortDescription'];
        $news->text = $_POST['text'];
        $news->author = isset($_POST['author']) ?  $_POST['author'] : null;
        $news->author_id = $_POST['author_id'] == 'Select author' ? null : $_POST['author_id'];
        $news->save();
        unset($news, $_POST);
    }
}

if ($_GET['action'] == 'delete') {
    if ($news = News::findById($_GET['id'])) {
        $news[0]->delete();
        unset($news);
    }
}

if ($_GET['action'] == 'update') {
    if ($news = News::findById($_GET['id'])) {
        $news[0]->title = $_POST['newTitle'];
        $news[0]->shortDescription = $_POST['newShortDescription'];
        $news[0]->text = $_POST['newText'];
        $news[0]->author = $_POST['newAuthor'];
        $news[0]->author_id = $_POST['author_id'];
        $news[0]->save();
        unset($news);
    }
}

$data = News::findLast(3);
$authors = Author::findAll();

include __DIR__ . '/template/tempAdminTable.php';
