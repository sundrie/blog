<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 04/01/2017
 * Time: 14:15
 */
class Autoload
{
    private static $classDirectory = "./class/";

    public static function classAutoloader($class){
        $path = static::$classDirectory . "$class.php";
        if (file_exists($path) && is_readable($path)) require $path;
    }
}
