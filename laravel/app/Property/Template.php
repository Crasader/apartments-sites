<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;

class Template extends Model
{
    //
    protected $table = 'property_template';
    public static function getGMapKey($siteInstance = null){
        if(!$siteInstance){
            $siteInstance = app()->make('App\Property\Site');
        }
            $url = self::select('gmap_key')
            ->where(
                'property_id',
                $siteInstance
                    ->getEntity()
                    ->fk_legacy_property_id
            )
            ->first();
            if($url){
                if(strlen(trim($url['gmap_key']))){
                    return (trim($url['gmap_key']));
                }
            }
            return '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>';
    }
}

                                // <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php
                                // echo Util::redisFetchOrUpdate('google-maps-src-api',function() {
                                //     $url = PropertyTemplate::select('gmap_key')->where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)->get();
                                //     if(count($url)){
                                //         if(strlen(trim($url[0]['gmap_key']))){
                                //             return $url[0]['gmapy_key'];
                                //         }
                                //     }
                                //     return "AIzaSyBKPvpp1b3YxfaEfOZQ6ySdzcpkDSfwqs8";
                                //     });
                                // "></script>
