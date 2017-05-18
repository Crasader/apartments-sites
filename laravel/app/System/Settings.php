<?php

namespace App\System;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;
use App\Property\Site;

class Settings extends Model
{
    const CUSTOM_NAV = 'customnav';
    protected $table ='system_settings';

    public static function site($forceGet=false) : array
    {
        $site = app()->make(Site::class);
        $fetcher = function () use ($site) {
            $settings = self::where('fk_property_id', $site->getEntity()->fk_legacy_property_id)
                ->where('scope', 'site')
                ->get();
            if (count($settings)) {
                return Util::flatten(['str_key' => 'str_value'], $settings->toArray());
            } else {
                return [];
            }
        };
        if ($forceGet) {
            $return = $fetcher();
            return $return;
        }
        $settings = Util::redisFetchOrUpdate(Util::redisKey('site-settings'), $fetcher, true);
        return $settings;
    }

    public static function rawSite($forceGet=false) : array
    {
        $fetcher = function () {
            $site = app()->make(Site::class);
            $settings = self::where('fk_property_id', $site->getEntity()->fk_legacy_property_id)
                ->where('scope', 'site')
                ->get();
            if (count($settings)) {
                return $settings->toArray();
            } else {
                return [];
            }
        };
        if ($forceGet) {
            $return = $fetcher();
            return $return;
        }
        $settings = Util::redisFetchOrUpdate(Util::redisKey('raw-site-settings'), $fetcher, true);
        return $settings;
    }

    public function removeById(int $id) : int
    {
        $site = app()->make(Site::class);
        try {
            $this->find($id)->destroy($id);
        } catch (Exception $e) {
            return 0;
        }
        return 1;
    }
    public static function simplify(string $str){
        return preg_replace("|[^a-z0-9]+|", "", strtolower(strip_tags($str)));
    }

    public static function addCustomNavItemsToArray($origNavItems)
    {
        $settings = self::site();
        $newItems = [];
        foreach ($origNavItems as $origIndex => $origNav) {
            array_push($newItems, $origNav);
            if (!isset($settings[self::CUSTOM_NAV])) {
                return $origNavItems;
            }
            foreach ($settings[self::CUSTOM_NAV] as $i => $json) {
                $element = json_decode($json, 1);
                if(self::simplify($element['after']) == self::simplify($origNav['label'])){
                    array_push($newItems, $element);
                }
            }
        }
        return $newItems;
    }

    /*
     * @param $label string label of the link
     * @param $after string which label to insert this na afte.. i.e.: "Gallery" or "Floor Plans"
     * @param $liAttributes array optional array of li-attributes to attach
     * @param $aAttributes array optional array of a attributes to attach
     * @return array ['inserted' => N, 'updated' => M] where N is inserted rows, M is updated rows
     */
    public function addCustomNav($label, $href, $after, $liAttributes=[], $aAttributes=[])
    {
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
    public function setSiteSetting(array $setting, $update=false)
    {
        $results = ['updated' => 0,'inserted' => 0];
        $site = app()->make(Site::class);
        $keys = array_keys($setting);
        $processed = [];
        if ($update) {
            $existing = self::where('fk_property_id', $site->getEntity()->fk_legacy_property_id)
                    ->whereIn('str_key', $keys)
                    ->where('scope', 'site')
                    ->get();
            if (count($existing)) {
                foreach ($existing as $record) {
                    $record->str_value = $setting[$record->str_key];
                    $record->save();
                    $processed[] = $record->str_key;
                    $results['updated']++;
                }
            }
        }
        $leftOvers = array_diff(array_keys($setting), $processed);
        foreach ($leftOvers as $settingIndex) {
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

    public function removeSiteSetting(string $key, string $value)
    {
        $site = app()->make(Site::class);
        self::where('fk_property_id', $site->getEntity()->fk_legacy_property_id)
                ->where('str_key', $key)
                ->where('str_value', $value)
                ->where('scope', 'site')
                ->delete();
    }

    public function removeSiteSettingMulti(string $key, array $inSettings)
    {
        $site = app()->make(Site::class);
        $ctr = 0;
        foreach (self::site() as $iKey => $value) {
            if ($iKey == $key) {
                if (is_array($value)) {
                    foreach ($value as $ivKey => $vValue) {
                        self::where('fk_property_id', $site->getEntity()->fk_legacy_property_id)
                            ->where('str_key', $key)
                            ->where('str_value', $vValue)
                            ->where('scope', 'site')
                            ->delete();
                        $ctr++;
                    }
                }
            }
        }
        return $ctr;
    }

    public function removeAllSiteSetting($setting)
    {
        $site = app()->make(Site::class);
        self::where('fk_property_id', $site->getEntity()->fk_legacy_property_id)
                ->where('str_key', $setting)
                ->where('scope', 'site')
                ->delete();
    }
}
