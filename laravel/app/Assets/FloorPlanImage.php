<?php

namespace App\Assets;

use Illuminate\Database\Eloquent\Model;
use App\Property\Site;
use App\AIM\Floorplans;
use App\Util\Util;
use App\Traits\TextCache;

class FloorPlanImage extends Model
{
    use TextCache;
    const NOT_FOUND = 0;
    const FOUND = 1;
    //
    protected $table = 'assets_floorplan';

    public function probeImageFiles($floorplan){
        $site = $this->getSite();
        $foo = $this;
        return Util::redisFetchOrUpdate('floorplans_images',function() use($foo,$site,$floorplan){
            $rows = self::where(
                ['fk_legacy_property_id' => $site->getEntity()->fk_legacy_property_id],
                ['floorplan_name' =>  $floorplan]
                )->get();
            if(count($rows) == 0){
                return $foo->fetchAll();
            }else{
                return $foo->formatDbResult($rows);
            }
        },true);
    }

    public function getSite(){
        $site = Site::$instance;
        if($site === null){
            $site = app()->make('App\Property\Site');
        }
        return $site;
    }

    public function formatDbResult($rows){
        $ret = [];
        foreach($rows->toArray() as $i => $foo){
            $ret[$foo['floorplan_name']] = $foo['extension'];
        }
        return $ret;
    }


    public function fetchAll(){
        $site = $this->getSite();
        $fp = app()->make('App\AIM\Floorplans');
        $sqlPlans = $fp->getFloorPlans();
        $names = [];
        $floorplanArray = [];
        foreach($sqlPlans as $i => $foo){
            $name = Util::transformFloorplanName($foo->U_MARKETING_NAME);
            foreach(['jpg','jpeg','png','gif'] as $i => $type){
                $url = $site->getEntity()->getWebPublicDirectory('floorplans') . "/$name.{$type}";
                if($this->checkIfFileExists($url) == FloorPlanImage::FOUND){
                    $newObject = new self();
                    $newObject->floorplan_name = $name;
                    $newObject->extension = $type;
                    $newObject->fk_legacy_property_id = $site->getEntity()->fk_legacy_property_id;
                    $newObject->save();
                    $floorplanArray[$name] = $type;
                    break;
                }
            }
        }
        return $floorplanArray;
    }

    public function checkIfFileExists(string $url){
        $ch = \curl_init($url);

        \curl_setopt($ch, CURLOPT_NOBODY, true);
        \curl_exec($ch);
        $retcode = \curl_getinfo($ch, CURLINFO_HTTP_CODE);
        \curl_close($ch);
        if($retcode >= 400){ 
            \Debugbar::info("NOT FOUND: $url");
            return FloorPlanImage::NOT_FOUND;
        }else if($retcode == 200){
            \Debugbar::info("FOUND: $url");
            return FloorPlanImage::FOUND;
        }
    }
}
