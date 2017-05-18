<?php

namespace App\Util;

class UrlHelpers{
    static function GetRedirect($url, $getParams = []){
        foreach($getParams as $counter => $param){
            $param = urlencode($param);
            $getParams[$counter] = "{$counter}={$param}";

        }
        $getParams = implode("&", $getParams);
        return "{$url}?{$getParams}";
    }
}
