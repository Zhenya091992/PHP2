<?php

use App\Models\News;

require __DIR__ . '/autoload.php';

$news = News::findLast(3);

include __DIR__ . '/template/index.php';
