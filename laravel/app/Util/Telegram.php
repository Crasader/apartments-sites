<?php namespace App\Util;

class Telegram {
    public static function fetch($method,array $args){
        return function() use($method,$args){
            return json_decode(
                file_get_contents(
                    str_replace("_MEHTOD_",$method,
                        sprintf(
                            ENV("TELEGRAM"),
                            trim(
                                file_get_contents(ENV("TELEGRAM_KEY_FILE"))
                            )
                        )
                    ) . 
                    implode("&",
                        ('foobar' == array_walk($args,function(&$item,$key){
                                $item = "{$key}=" . urlencode($item);
                                }
                            )       
                        ) ? $args : $args
                    )
                ),
                $convertToAssociatedArray = true
            );
        };
    }

}
