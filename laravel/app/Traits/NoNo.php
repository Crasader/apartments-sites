<?php

namespace App\Traits;

use App\Util\Util;

trait NoNo {
    public static function devDie(){
        if(!Util::isDev()){
            die("<img src='https://media.giphy.com/media/5ftsmLIqktHQA/giphy.gif'>");
        }
    }
}
