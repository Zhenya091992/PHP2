<?php

namespace App\Models;

use App\Exceptions\ExceptionFillNews;
use App\Exceptions\MultiException;
use App\Logger;
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
        if ($this->data[$name]) {
            echo $name . '<br>';
            return $this->data[$name];
        } else if ($name == 'author') {
            return Author::findById((int) $this->data['author_id'])[0]->nameAuthor;
        } else {

            return null;
        }
    }

    public function fill(array $arr)
    {
        foreach ($arr as $property => $value) {
            $this->$property = $value;
        }

        $errs = new MultiException();
        if ('' == $arr['title']) {
            $errs[] = new ExceptionFillNews('заполните заголовок');
        }
        if ('' == $arr['shortDescription']) {
            $errs[] = new ExceptionFillNews('заполните короткое описание');
        }
        if ('' == $arr['text']) {
            $errs[] = new ExceptionFillNews('заполните новость');
        }
        if ('' == $arr['author_id']) {
            $errs[] = new ExceptionFillNews('выберите автора');
        }
        if (!empty($errs[0])) {
            $log = new Logger();
            $log->log(Logger::NOTICE, 'неудачная попытка заполнения новости');
            throw $errs;
        }
    }
}
