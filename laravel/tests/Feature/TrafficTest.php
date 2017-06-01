<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\System\Settings;

class TrafficTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTrafficGetsInsertedIntoSql()
    {
        $traffic = app()->make('App\AIM\Traffic');
        $exception = false;
        try {
            $traffic->insertTraffic("william",//first name
                "merfalen", //last name
                "william@marketapts.com",
                "619-379-2582",
                "10/15/1984",   //moveindate
                "10/20/1984",   //visit date
                "501",
                "the breach",
                "schedule-a-tour",
                "10:00AM"
            );
        } catch (\Exception $e) {
            $exception = true;
        }
    }

    public function testTrafficIsInsertedFromContactForms()
    {
        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'contact', $data = [
            'firstname' => 'William',
            'lastname' => 'Merfalen',
            'email' => 'william@marketapts.com',
            'phone' => '(619) 379-2582',
            'date' => '01/01/1970'
        ], []);
        $this->assertTrue($response->getStatusCode() == 302);

        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'schedule', $data = [
            'firstname' => 'William',
            'lastname' => 'Merfalen',
            'email' => 'william@marketapts.com',
            'phone' => '(619) 379-2582',
            'moveindate' => '01/01/1970',
            'visitdate' => '01/01/1970',
            'visittime' => '10:00:00 AM',
        ], []);
        $this->assertTrue($response->getStatusCode() == 302);


        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'apply-online', $data = [
            'fname' => 'William',
            'lname' => 'Merfalen',
            'email' => 'william@marketapts.com',
            'phone' => '(619) 379-2582',
            'b' => base64_encode(json_encode(['u' => '501','t' => 'the breach']))
        ], []);
        $this->assertTrue($response->getStatusCode() == 302, "status code: " . $response->getStatusCode());

        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'unit', $data = [
            'unittype' => 'William',
            'bed' => 'Merfalen',
            'bath' => 'william@marketapts.com',
            'sqft' => '(619) 379-2582',
            'orig_unittype' => 'the studio',
        ], []);
        $this->assertTrue($response->exception == null);
    }
}
