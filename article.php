<?php
require __DIR__ . '/autoload.php';

$news = \App\Models\News::findById($_GET['id']);

include __DIR__ . '/template/article.php';