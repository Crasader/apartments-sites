<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;

class Template extends Model
{
    //
    public $timestamps = false;
    protected $table = 'property_template';
    public static function getGMapKey($siteInstance = null)
    {
        return Util::redisFetchOrUpdate('gmap_key', function () use ($siteInstance) {
            if (!$siteInstance) {
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
            if ($url) {
                if (strlen(trim($url['gmap_key']))) {
                    return (trim($url['gmap_key']));
                }
            }
            return '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>';
        });
    }
}
