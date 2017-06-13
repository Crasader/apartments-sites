<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Property\Entity as PropertyEntity;
use App\Legacy\Property as LegacyProperty;
use App\Property\Site as Site;
use App\Util\Util;
use Redis;
use App\Mock;

class VirtualHostSwitch extends ServiceProvider
{
    public function register()
    {
    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $tempThis = $this;
        $this->app->bind(Site::class, function () use ($tempThis) {
            if (Util::isCommandLine()) {
                return Site::$instance = $this->newCommandLineSite();
            }
            $entity = null;
            if ($entity === null) {
                $entity = PropertyEntity::where('fk_legacy_property_id', $tempThis->_resolveSiteId())->get()->first();
            }
            if ($entity === null) {
                $prop = new PropertyEntity;
                $legacy = LegacyProperty::where('url', 'like', '%' . Util::realServerName() . '%')->get()->first();
                if ($legacy === null) {
                    $legacy = LegacyProperty::where('devurl', 'like', '%' . Util::realServerName() . '%')->get()->first();
                }
                $cbCounter = 5;
                $fileSystemId = $prop->generateFilesystemId($legacy, function () use ($cbCounter) {
                    if ($cbCounter-- <= 0) {
                        return null;
                    } else {
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
                ], $legacy);
            }
            return Site::$instance = new Site($entity);
        });
    }

    private function _resolveSiteId()
    {
        $serverName = Util::realServerName();
        if(Mock::getServer()){
            $serverName = Mock::getServer();
        }
        if (preg_match('|^www\.|', $serverName)) {
            $site = LegacyProperty::where('url', 'like', 'http://' . $serverName . '%')->first();
        } else {
            $site = LegacyProperty::where('url', 'like', 'http://www.' . $serverName . '%')->first();
        }
        if ($site) {
            Site::$site_id_set = true;
            \Debugbar::info($serverName);
            Site::$site_id = $site->id;
            return Site::$site_id;
        }
    }

    //!devonly
    private function _dev()
    {
        return preg_replace("|^dev\.|", "", Util::serverName());
    }


    public function newCommandLineSite()
    {
        $fk = LegacyProperty::where('url','like','%' . env('PHPUNIT_BASE_URL') . '%')->first();
        if(!$fk){
            throw new BaseException("Invalid PHPUNIT_BASE_URL env config");
        }
        $entity = PropertyEntity::where('fk_legacy_property_id', $fk->id)->get()->first();
        return new Site($entity);
    }
}
