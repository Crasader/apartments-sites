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
use App\Traits\Constants;

class MailerQueueTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInvalidMemberVariables()
    {
        $struct = new StructMail;
        $this->assertTrue($struct->validateMemberVariables() == Constants::VALIDATE_ERRORS_ENCOUNTERED);
    }

    public function testValidMemberVariables()
    {
        $struct = new StructMail;
        $struct->to = $struct->from = $struct->subject = $struct->htmlBody = "brady@marketapts.com";
        $passed = $struct->validateMemberVariables(1) != Constants::VALIDATE_ERRORS_ENCOUNTERED;
        if (!$passed) {
            $errors = $struct->errors;
            print_r([__LINE__.__FILE__, compact('errors')]);
        }
        $this->assertTrue($passed);
    }


    //TODO: exploit the "withSessioN" function to test cms users :)
    //TODO: exploit the "withSession" function to test resident portal

    public function testPostControllerSubmitsToQueue()
    {
        /* Expected to redirect (302) */
        $response = $this->post(env('PHPUNIT_BASE_URL') . '/contact', ['lol' => true]);
        echo "Status code from post to contact with [lol]: " . $response->getStatusCode() . PHP_EOL;
        $this->assertTrue($response->getStatusCode() == 302);

        $weirdEmail = "wmerfalenactisbecauseimcool@gmail.sulfur.net";
        /* make a valid post */
        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'contact', $data = [
            'firstname' => 'William',
            'lastname' => 'Merfalen',
            'email' => $weirdEmail,
            'phone' => '(619) 379-2582',
            'date' => '01/01/1970'
        ], []);

        $this->assertTrue($response->getStatusCode() == 200, "status code: " . $response->getStatusCode());
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
 47         'portal-center' => 'handleResident',
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

    public function testUnauthenticatedUserForms()
    {
        $baseEmail = "wmerfalenactisbecauseimcool@gmail.sulfur.net";
        function transmutateEmail($em)
        {
            return str_replace("becauseimcool", uniqid(), $em);
        }
        /* Expected to redirect (302) */

        $weirdEmail = transmutateEmail($baseEmail);

  ####    ####   #    #   #####    ##     ####    #####
   #    #  #    #  ##   #     #     #  #   #    #     #
    #       #    #  # #  #     #    #    #  #          #
     #       #    #  #  # #     #    ######  #          #
      #    #  #    #  #   ##     #    #    #  #    #     #
        ####    ####   #    #     #    #    #   ####      #


         ######   ####   #####   #    #
          #       #    #  #    #  ##  ##
           #####   #    #  #    #  # ## #
            #       #    #  #####   #    #
             #       #    #  #   #   #    #
              #        ####   #    #  #    #

        /* make a valid post */
        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'contact', $data = [
            'firstname' => 'William',
            'lastname' => 'Merfalen',
            'email' => $weirdEmail,
            'phone' => '(619) 379-2582',
            'date' => '01/01/1970'
        ], []);
        $this->assertTrue($response->getStatusCode() == 200);


  ####    ####   #    #  ######  #####   #    #  #       ######
 #       #    #  #    #  #       #    #  #    #  #       #
  ####   #       ######  #####   #    #  #    #  #       #####
      #  #       #    #  #       #    #  #    #  #       #
 #    #  #    #  #    #  #       #    #  #    #  #       #
  ####    ####   #    #  ######  #####    ####   ######  ######


   ##
  #  #
 #    #
 ######
 #    #
 #    #


  #####   ####   #    #  #####
    #    #    #  #    #  #    #
    #    #    #  #    #  #    #
    #    #    #  #    #  #####
    #    #    #  #    #  #   #
    #     ####    ####   #    #

        /* make a valid post */
/*
$this->validate($req, [
  1             'firstname' => 'required|max:64',
  2             'lastname' => 'required|max:64',
  3             'email' => 'required|email',
  4             'phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
  5             'moveindate' => 'required|max:32',
  6             'visitdate' => 'required|max:15',
  7             'visittime' => 'required|max:15',
  8         ]);
  9         //

*/
        $weirdEmail = transmutateEmail($baseEmail);
        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'schedule', $data = [
            'firstname' => 'William',
            'lastname' => 'Merfalen',
            'email' => $weirdEmail,
            'phone' => '(619) 379-2582',
            'moveindate' => '01/01/1970',
            'visitdate' => '01/01/1970',
            'visittime' => '10:00:00 AM',
        ], []);
        $this->assertTrue($response->getStatusCode() == 200);

   ##    #####   #####   #        #   #
  #  #   #    #  #    #  #         # #
 #    #  #    #  #    #  #          #
 ######  #####   #####   #          #
 #    #  #       #       #          #
 #    #  #       #       ######     #


  ####   #    #  #          #    #    #  ######
 #    #  ##   #  #          #    ##   #  #
 #    #  # #  #  #          #    # #  #  #####
 #    #  #  # #  #          #    #  # #  #
 #    #  #   ##  #          #    #   ##  #
  ####   #    #  ######     #    #    #  ######



        $weirdEmail = transmutateEmail($baseEmail);
        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'apply-online', $data = [
            'fname' => 'William',
            'lname' => 'Merfalen',
            'email' => $weirdEmail,
            'phone' => '(619) 379-2582',
        ], []);
        $this->assertTrue($response->getStatusCode() == 200);

        //TODO:!phpunit add detection of redirect javascript


 #    #  #    #     #     #####
  #    #  ##   #     #       #
   #    #  # #  #     #       #
    #    #  #  # #     #       #
     #    #  #   ##     #       #
       ####   #    #     #       #

        /*

  7         $cleaned = [
  6             'unittype' => Util::transformFloorplanName($data['unittype']),
  5             'bed' => intval($data['bed']),
  4             'bath' => floatval($data['bath']),
  3             'sqft' => intval($data['sqft']),
  2             'orig_unittype' => $data['unittype'],
  1         ];
369
        */
        $response = $this->call('post', env('PHPUNIT_BASE_URL') . 'unit', $data = [
            'unittype' => 'William',
            'bed' => 'Merfalen',
            'bath' => $weirdEmail,
            'sqft' => '(619) 379-2582',
            'orig_unittype' => 'the studio',
        ], []);
        $this->assertTrue($response->exception == null);
        $ctr = 0;
    }
}
