<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\System\Settings;

class SiteSettingsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testsIfSiteSettingsSaveProperly() {
        $_SERVER['SERVER_NAME'] = 'martiniquebay.com';
        $settings = new Settings;
        $test1 = 'phpunit_test1_' . uniqid();
        $test2 = 'phpunit_test2_' . uniqid();
        $results = $settings->setSiteSetting([$test1 => 'relocation.html',$test2 => '/dinapoli/static/164MTB/']);
        $this->assertTrue($results['inserted'] == 2);
        $this->assertTrue($results['updated'] == 0);
        $savedSettings = Settings::site();
        foreach($savedSettings as $index => $innerArray){
            $foo[] = array_keys($innerArray)[0];
        }
        
        $this->assertTrue(in_array($test1,array_values($foo)));
        $this->assertTrue(in_array($test2,$foo));

        $settings->removeSiteSetting($test1);
        $settings->removeSiteSetting($test2);
        $foo = [];
        $savedSettings = Settings::site();
        foreach($savedSettings as $index => $innerArray){
            $foo[] = array_keys($innerArray)[0];
        }
        $this->assertTrue(in_array($test1,$foo) == false);
        $this->assertTrue(in_array($test2,$foo) == false);
    }

    public function testIfCustomNavInsertsWork(){
        $_SERVER['SERVER_NAME'] = 'oasis-townhomes.com';
        $settings = new Settings;
        $results = $settings->addCustomNav('Custom Nav','floorplans','Gallery');
        $this->assertTrue($results['updated'] > 0 || $results['inserted'] > 0);
        $response = $this->call('get',env('PHPUNIT_BASE_URL'));
        var_dump($response->getContent());
        $settings->removeSiteSetting(Settings::CUSTOM_NAV);
        $settings = Settings::site();
        $this->assertTrue(isset($settings[Settings::CUSTOM_NAV]) == false);
    }

}
