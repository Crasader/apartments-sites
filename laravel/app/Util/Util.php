<?php

namespace App\Util;

class Util 
{
    public static function isFpm(){
        return strcmp(php_sapi_name(),env('FPM_NAME')) == 0;
    }

    public static function isHome(){
        var_dump($_SERVER['REQUEST_URI']);
        return (
            $_SERVER['REQUEST_URI'] == '/index' ||
            $_SERVER['REQUEST_URI'] == '/home' ||
            $_SERVER['REQUEST_URI'] == '/' ||
            strlen($_SERVER['REQUEST_URI']) == 0
        );
    }
}
