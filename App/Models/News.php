<?php

namespace App\Models;

use App\Model;
use App\Models\Author;

/**
 * Class News
 * @package App\Models
 *
 * @const string TABLE
 *
 * @property string $title Title news
 * @property string $shortDescription Short description news
 * @property string $text Text news
 * @property string $author Name author, if isset
 * @property int $author_id Id author, if isset
 */

class News extends Model
{
    /**
     * @var string TABLE constant
     */
    const TABLE = 'news';

    /**
     * __get property
     *
     * if name property 'author' then checked property 'author_id' if it not empty return object App\Models\Author
     *
     * @param string $name Name property.
     * @return mixed|null
     */
    public function __get(string $name)
    {
        return $this->data[$name] ? $this->data[$name] :
            ($name == 'author' ? Author::findById((int) $this->data['author_id'])[0] : null);
    }
}
