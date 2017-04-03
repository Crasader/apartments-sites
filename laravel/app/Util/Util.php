<?php

namespace App\Util;

class Util 
{
    public static function isFpm(){
        return strcmp(php_sapi_name(),env('FPM_NAME')) == 0;
    }
}
