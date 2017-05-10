<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Mailer\Queue;
use App\Structures\Mail as StructMail;
use App\Traits\MemberValidator;
use App\Mailer as QueueMailer;
use App\Util\Util;
use App\System\Session as Sesh;
use App\Mock;

class ResidentPortalTest extends TestCase
{
    //TODO: exploit the "withSession" function to test resident portal 

    public function testResidentPortalPostForms(){

/*
$user = substr($data['email'],0,64);
  1         $pass = substr($data['pass'],0,64);
  2
  3         $soap = app()->make('App\Assets\SoapClient');
  4         $result = $soap->residentPortal($user,$pass);
  5         U
*/
        /* Test failures */
        $response = $this->call('post',env('PHPUNIT_BASE_URL') . 'portal-center',[
            'user' => 'imafailureatlife',
            'pass' => '1-203-1023-102-301-032'
        ]);
        $this->assertTrue($response->getStatusCode() == 200);
        $this->assertTrue(preg_match("|Invalid Username\/Password|",$response->getContent()) > 0);


        /* Authenticate with an invalid user */
        $response = $this->call('post',env('PHPUNIT_BASE_URL') . 'find-userid',[
            'email' => 'wmerfalen@gmail.com',
            'unit' => '1404'
        ]);
        $this->assertTrue(preg_match("|Email Address was not found|",$response->getContent()) > 0);


        /* Use an invalid email, should fail */
        Mock::setPropertyCode('638ROF');
        $response = $this->call('post',env('PHPUNIT_BASE_URL') . 'find-userid',[
            'email' => 'ronaldreaganwasagolfer@mentoc.ddns.net',
            'unit' => '207721'
        ]);
        $this->assertTrue(preg_match("|Email Address was not found|",$response->getContent()) > 0);
        $this->assertTrue($response->getStatusCode() == 200);


        /* 
         * Valid stuff now. For real.
         */
        Mock::setPropertyCode('669TRN');
        $response = $this->call('post',env('PHPUNIT_BASE_URL') . 'find-userid',[
            'email' => 'william@marketapts.com',
            'unit' => '501'
        ]);
        $this->assertTrue(preg_match("|Email Address was not found|",$response->getContent()) == 0);
        $this->assertTrue($response->getStatusCode() == 200);
        $this->assertTrue(preg_match(
            "|An email has been sent to the email address you registered with at move\-in|",
            $response->getContent()) == 1);

    }

/**********************************************************************
 * 			pulled from PostController.php
 **********************************************************************
30     protected $_allowed = [
 31         /**********************************************************
 32         /* Routes that process non-authenticated form submissions *
 33         /**********************************************************
 34         'unit'          => 'handleUnit',                    //[covered]2017-05-09
 35         'contact'       => 'handleContact',					//[covered]2017-05-09
 36         'briefContact' => 'handleBriefContact',             //[covered]2017-05-09
 37         'schedule'      => 'handleSchedule',				//[covered]2017-05-09
 38         'apply-online'  => 'handleApplyOnline',             //[covered]2017-05-09
 39
 40         /* Administrative/CMS routes 
 41         'text-tag'      => 'handleTextTag',
 42         'text-tag-get'  => 'handleGetTextTag',
 43
 44         /*****************************
 45         /* Routes for resident portal 
 46         /*****************************
 47         'portal-center' => 'handleResident',                //[covered]2017-05-09
 48         'find-userid'   => 'handleFindUserId',
 49         'reset-password'=> 'handleResetPassword',
 50
 51         /*==========================================================
 52         /* Routes that require authentication (done via middleware) 
 53         /*==========================================================
 54         'resident-contact-mailer'   => 'handleResidentContact',
 55         'maintenance-request'       => 'handleMaintenance',
 56     ];
 5
*/

}
