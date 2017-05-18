<?php

namespace App\System;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;
use App\Property\Site;

class Settings extends Model
{
    const CUSTOM_NAV = 'customnav'; 
    protected $table ='system_settings';

    public static function site($forceGet=false){
        $site = app()->make(Site::class);
        $fetcher = function() use($site){ $settings = self::where('fk_property_id',$site->getEntity()->fk_legacy_property_id)
                ->where('scope','site')
                ->get();
            if(count($settings)){
                return Util::flatten(['str_key' => 'str_value'],$settings->toArray());
            }else{
                return [];
            }
        };
        if($forceGet){
            $return = $fetcher();
            return $return;
        }
        $settings = Util::redisFetchOrUpdate(Util::redisKey('site-settings'),$fetcher,true);
        return $settings;
    }

    /*
     * @param $label string label of the link
     * @param $after string which label to insert this na afte.. i.e.: "Gallery" or "Floor Plans"
     * @param $liAttributes array optional array of li-attributes to attach
     * @param $aAttributes array optional array of a attributes to attach
     * @return array ['inserted' => N, 'updated' => M] where N is inserted rows, M is updated rows
     */
    public function addCustomNav($label,$href,$after,$liAttributes=[],$aAttributes=[]){
        return $this->setSiteSetting(
            [self::CUSTOM_NAV => 
                json_encode([
                    'label' => $label,
                    'href' => $href,
                    'after' => $after,
                    'li-attributes' => [ $liAttributes ],
                    'a-attributes' => [ $aAttributes ]
                    ]
                )
            ]
        );
    }

    /*
     * @param $setting array ['key' => 'value'  /*
     * @return void
     */
    public function setSiteSetting(array $setting){
        $results = ['updated' => 0,'inserted' => 0];
        $site = app()->make(Site::class);
        $keys = array_keys($setting);
        $existing = self::where('fk_property_id',$site->getEntity()->fk_legacy_property_id)
                ->whereIn('str_key',$keys)
                ->where('scope','site')
                ->get();
        $processed = [];
        if(count($existing)){
            foreach($existing as $record){
                $record->str_value = $setting[$record->str_key];
                $record->save();
                $processed[] = $record->str_key;
                $results['updated']++;
            }
        }
        $leftOvers = array_diff(array_keys($setting),$processed);
        foreach($leftOvers as $settingIndex){
            $value = $setting[$settingIndex];
            $save = new self();
            $save->fk_property_id = $site->getEntity()->fk_legacy_property_id;
            $save->str_key = $settingIndex;
            $save->str_value = $value;
            $save->scope = 'site';
            $save->save();
            $results['inserted']++;
        }
        return $results;
    }

    public function removeSiteSetting($setting){
        $site = app()->make(Site::class);
        self::where('fk_property_id',$site->getEntity()->fk_legacy_property_id)
                ->where('str_key',$setting)
                ->where('scope','site')
                ->delete();
    }
}
