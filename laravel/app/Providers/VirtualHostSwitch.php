<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Property\Entity as PropertyEntity;
use App\Legacy\Property as LegacyProperty;
use App\Property\Site as Site;

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
            return Site::$instance = new Site($entity);
        });
    }

    private function _resolveSiteId(){
        if(php_sapi_name() != 'apache2handler'){ return 0; }
        if(preg_match('|^www\.|',$_SERVER['SERVER_NAME'])){
            $site = LegacyProperty::where('url','like','http://' . $_SERVER['SERVER_NAME'] . '%')->get();
        }else{
            $site = LegacyProperty::where('url','like','http://www.' . $_SERVER['SERVER_NAME'] . '%')->get();
        }
        if(count($site)){
            echo "Site set<hr>";
            Site::$site_id_set = true;
            return Site::$site_id = $site->first()->id;
        }
    }

}
