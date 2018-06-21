<?php

namespace prj\src;


class JsonStorage implements KeyValueStorage
{

    const FILE_N = 'strg_j.json';

    public function set($key, $value)
    {
        $arr=array($key=>$value);
        $json=json_encode($arr);
        file_put_contents(self::FILE_N, $json,FILE_APPEND | LOCK_EX);
    }


    public function get($key)
    {
        $data=file_get_contents(self::FILE_N);
        $arr=json_decode($data,true);
        return $arr[$key];
    }

    public function has($key)
    {
        $data=file_get_contents(self::FILE_N);
        $arr=json_decode($data,true);
        return isset($arr[$key]);
    }

    public function remove($key)
    {
        $data=file_get_contents(self::FILE_N);
        $arr=json_decode($data,true);
        unset($arr[$key]);
        $json=json_encode($arr);
        file_put_contents(self::FILE_N, $json,FILE_APPEND | LOCK_EX);

    }

    public function clear($key)
    {
        $data=file_get_contents(self::FILE_N);
        $arr=json_decode($data);
        $arr[$key]='';
        $json=json_encode($arr);
        file_put_contents(self::FILE_N, $json,FILE_APPEND | LOCK_EX);
    }
}