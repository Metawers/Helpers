<?php declare (strict_types = 1);

namespace Metawers\Helpers;

/**
 * Class Hydra
 * @package Wers\Helpers
 */
class Hydra
{
    /**
     * @var array
     */
    private $array = [];

    /**
     * Hydra constructor.
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * @param string $offset
     * @param string $default
     * @return string
     */
    public function offsetGetString(string $offset, string $default = '') : string
    {
        if (!empty($this->array[$offset]) && is_string($this->array[$offset])) {
            return $this->array[$offset];
        }
        return $default;
    }

    /**
     * @param string $offset
     * @param int $default
     * @return int
     */
    public function offsetGetInt(string $offset, int $default = 0) : int
    {
        if (!empty($this->array[$offset]) && is_int($this->array[$offset])) {
            return $this->array[$offset];
        }
        return $default;
    }

    /**
     * @param string $offset
     * @param float $default
     * @return float
     */
    public function offsetGetFloat(string $offset, float $default = 0) : float
    {
        if (!empty($this->array[$offset]) && is_float($this->array[$offset])) {
            return $this->array[$offset];
        }
        return $default;
    }

    /**
     * @param string $offset
     * @param bool $default
     * @return bool
     */
    public function offsetGetBool(string $offset, bool $default = false) : bool
    {
        if (!empty($this->array[$offset]) && is_bool($this->array[$offset])) {
            return $this->array[$offset];
        }
        return $default;
    }

    /**
     * @param string $offset
     * @param string $object
     * @return mixed
     */
    public function offsetGetObject(string $offset, string $object = '\stdClass')
    {
        if (!empty($this->array[$offset]) && $this->array[$offset] instanceof $object) {
            return $this->array[$offset];
        }
        return new $object;
    }

    public function offsetGetMixed($offset, $default = null)
    {
        if (!empty($this->array[$offset])) {
            return $this->array[$offset];
        }
        return $default;
    }
}
