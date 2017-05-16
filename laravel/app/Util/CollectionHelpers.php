<?php

namespace App\Util;

use Illuminate\Support\Collection;

class CollectionHelpers
{
    public static function isCollection($item)
    {
        return is_a($item, 'Illuminate\Support\Collection');
    }
    public static function isIterable($item)
    {
        return is_array($item) || self::isCollection($item);
    }
    public static function returnAsCollection($item)
    {
        if (is_array($item)) {
            return collect($item);
        }
        if (self::isCollection($item)) {
            return $item;
        }
        $item = [ $item ];
        return collect($item);
    }
}
