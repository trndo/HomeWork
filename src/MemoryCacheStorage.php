<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 21.06.18
 * Time: 14:11
 */

namespace prj\src;


class MemoryCacheStorage implements KeyValueStorage
{
    private $storage = [];

    public function set($key, $value)
    {
        return $this->storage[$key]=$value;
    }

    public function get($key)
    {
        return $this->storage[$key];
    }

    public function has($key)
    {
        return isset($this->storage[$key]);
    }

    public function remove($key)
    {
        unset($this->storage[$key]);
    }


    public function clear($key)
    {
        $this->storage= '';
    }
}