<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 21.06.18
 * Time: 15:11
 */
namespace prj\src;

use Symfony\Component\Yaml\Yaml;

class YAMLStorage implements KeyValueStorage
{
    const FILE_N = 'strg.yaml';

    public function set($key, $value)
    {
        $arr=array(
            $key=>$value
        );
        $yaml=Yaml::dump($arr);
        file_put_contents(self::FILE_N,$yaml,FILE_APPEND | LOCK_EX);
    }


    public function get($key)
    {
        $yaml=Yaml::parseFile(self::FILE_N);
        return $yaml[$key];
    }


    public function has($key)
    {
        $yaml=Yaml::parseFile(self::FILE_N);
        return isset($yaml[$key]);
    }

    public function remove($key)
    {
        $yaml=Yaml::parseFile(self::FILE_N);
        unset($yaml[$key]);
        return file_put_contents(self::FILE_N,$yaml,LOCK_EX);
    }

    public function clear($key)
    {
        $yaml=Yaml::parseFile(self::FILE_N);
        $yaml[$key]='';
        return file_put_contents(self::FILE_N,$yaml,LOCK_EX);
    }
}