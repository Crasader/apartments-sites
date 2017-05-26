<?php

namespace App\Util\Html;

class Input
{
    public static function type(string $t)
    {
        $class = 'App\\Util\\Html\\Input\\';
        $class .= ucfirst($t);
        return app()->make($class);
    }
}
