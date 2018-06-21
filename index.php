<?php
require_once __DIR__.'/vendor/autoload.php';

use prj\src\MemoryCacheStorage;
use prj\src\YAMLStorage;
use prj\src\JsonStorage;

/*$ex1=new MemoryCacheStorage();
$n1= $ex1->set("first","cow");
    var_dump($n1);
    $n1=$ex1->get("first").PHP_EOL;
    echo $n1;
$n1=$ex1->has("first").PHP_EOL;
echo $n1;*/

$n1=new YAMLStorage();
//$n1->set("First","Jenya");
//echo $n1->get("First").PHP_EOL;
//echo $n1->has("First").PHP_EOL;
$n1->remove("First","Jenya");
echo $n1->has("First").PHP_EOL;

$m1=new JsonStorage();
$m1->set("First","Anton");

echo $m1->get("First");