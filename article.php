<?php

use App\Models\News;

require __DIR__ . '/autoload.php';

$news = News::findById($_GET['id']);

include __DIR__ . '/template/article.php';
