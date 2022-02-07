<?php

namespace App\traits;

trait MagicTrait
{
    /**
     * @var array $data properties
     */
    protected array $data = [];

    /**
     * get property
     *
     * @param string $name name property
     * @return mixed|null return property
     */
    public function __get(string $name)
    {
        return $this->data[$name] ?: null;
    }

    /**
     * set property
     *
     * @param string $name name property
     * @param mixed $value value property
     */
    public function __set(string $name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * isset property
     *
     * @param string $name name property
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }

    public function key()
    {
        return key($this->data);

    }

    public function next()
    {
        next($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }

    public function valid()
    {
        return null !== key($this->data);
    }

    public function current()
    {
        return current($this->data);

    }

    public function offsetExists($offset) :bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        is_null($offset) ? $this->data[] = $value : $this->data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
