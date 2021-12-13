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

    public function __construct()
    {

    }

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
        if ($this->__isset($name)) {
            if ($name == 'author') {
                if ($this->author_id) {
                    $author = Author::findById($this->author_id);

                    return $author[0];
                }
            }

            return $this->data[$name];
        } else {

            return null;
        }
    }
}
