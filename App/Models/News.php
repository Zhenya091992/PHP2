<?php

namespace App\Models;

use App\Model;

class News extends Model
{
    const TABLE = 'news';

    public $title;
    public $shortDescription;
    public $text;
    public $author;

}
