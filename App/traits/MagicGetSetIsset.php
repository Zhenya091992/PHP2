<?php

namespace App\traits;

trait MagicGetSetIsset
{
    protected $data = [];

    public function __get($name)
    {
        if ($this->__isset($name)) {

            return $this->data[$name];
        } else {

            return null;
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}
