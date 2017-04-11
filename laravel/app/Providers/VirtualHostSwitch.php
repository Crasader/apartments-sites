<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Property\Entity as PropertyEntity;
use App\Legacy\Property as LegacyProperty;
use App\Property\Site as Site;
use App\Util\Util;

class VirtualHostSwitch extends ServiceProvider
{
    public function register(){
        
    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $tempThis = $this;
        $this->app->bind(Site::class,function() use($tempThis) {
            if(Site::$instance){
                return Site::$instance;
            }
            $entity = PropertyEntity::where('fk_legacy_property_id',$tempThis->_resolveSiteId())->get()->first();
            if($entity === null){
				$prop = new PropertyEntity;
				$legacy = LegacyProperty::where('url','like','%' . $_SERVER['SERVER_NAME'] . '%')->get()->first();

				$cbCounter = 5;
				$fileSystemId = $prop->generateFilesystemId($legacy,function() use($cbCounter) {
					if($cbCounter-- <= 0){
						return null;
					}
					else{
						return 'retry';
					}
				});
				$entity = $prop->createNew([
					'_property_group_name' => [
						'name' => 'Dinali'
					],
					'property_group_id' => 0,
					'property_name' => $legacy->name,
					'filesystem_id' => $fileSystemId
				],$legacy);
            }
            return Site::$instance = new Site($entity);
        });
    }

    private function _resolveSiteId(){
        if(!Util::isFpm()){ return 0; }
        if(preg_match('|^www\.|',$_SERVER['SERVER_NAME'])){
            $site = LegacyProperty::where('url','like','http://' . $_SERVER['SERVER_NAME'] . '%')->get();
        }else{
            $site = LegacyProperty::where('url','like','http://www.' . $_SERVER['SERVER_NAME'] . '%')->get();
        }
        if(count($site)){
            Site::$site_id_set = true;
            return Site::$site_id = $site->first()->id;
        }
    }

}
