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
    public function testsIfSiteSettingsSaveProperly()
    {
        $_SERVER['SERVER_NAME'] = 'martiniquebay.com';
        $settings = new Settings;
        $test1 = 'phpunit_test1_' . uniqid();
        $test2 = 'phpunit_test2_' . uniqid();
        $results = $settings->setSiteSetting([$test1 => 'relocation.html',$test2 => '/dinapoli/static/164MTB/']);
        $this->assertTrue($results['inserted'] == 2);
        $this->assertTrue($results['updated'] == 0);
        $savedSettings = Settings::site();
        foreach ($savedSettings as $index => $innerArray) {
            $foo[] = array_keys($innerArray)[0];
        }
        
        $this->assertTrue(in_array($test1, array_values($foo)));
        $this->assertTrue(in_array($test2, $foo));

        $settings->removeAllSiteSetting($test1);
        $settings->removeAllSiteSetting($test2);
        $foo = [];
        $savedSettings = Settings::site();
        foreach ($savedSettings as $index => $innerArray) {
            $foo[] = $index;
        }
        $this->assertTrue(in_array($test1, $foo) == false);
        $this->assertTrue(in_array($test2, $foo) == false);
    }

    public function testIfCustomNavInsertsWork()
    {
        $_SERVER['SERVER_NAME'] = 'oasis-townhomes.com';
        $settings = new Settings;
        $results = $settings->addCustomNav('Relocation', 'contact', 'Gallery');
        $this->assertTrue($results['updated'] > 0 || $results['inserted'] > 0);
        $results = $settings->addCustomNav('Relocation2', 'contact', 'Gallery');
        $this->assertTrue($results['updated'] > 0 || $results['inserted'] > 0);
        $response = $this->call('get', env('PHPUNIT_BASE_URL'));
        $this->assertTrue(preg_match("|<li><a href=\"/contact\">Relocation2</a></li>|", $response->getContent()) > 0);
        $this->assertTrue(preg_match("|<li><a href=\"/contact\">Relocation</a></li>|", $response->getContent()) > 0);
        $siteSettings = Settings::site();
        $settings->removeSiteSettingMulti(Settings::CUSTOM_NAV, $siteSettings);
        $settings = Settings::site();
        $this->assertTrue(isset($settings[Settings::CUSTOM_NAV]) == false);
    }
}
