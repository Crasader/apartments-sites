<?php

namespace App\Util;

class UrlHelpers
{
    public static function getUrl($url, $getParams = [])
    {
        foreach ($getParams as $counter => $param) {
            $param = urlencode($param);
            $getParams[$counter] = "{$counter}={$param}";
        }
        if(Util::isHttpsException() == false){
            $url = secure_url($url);
        }
        $getParams = implode("&", $getParams);
        return "{$url}?{$getParams}";
    }
}
