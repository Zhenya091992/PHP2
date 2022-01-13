<?php

namespace App\traits;

trait MagicGetSetIsset
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
}
