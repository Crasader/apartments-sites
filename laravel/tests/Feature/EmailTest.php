<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Email;
use App\EmailAddress;
use App\Util\Util;

class EmailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public static $testId = null;
    public static $to = ['bvfbarten@gmail.com', 'brady@marketapts.com'];
    public static $from =  'brady@marketapts.com';
    public static $from_name = 'Name';
    public static $subject = 'test';
    public static $html_body = '<h1>Hello World</h1>';
    public static $text_body = 'Hello World';

    public function testCreateEmail()
    {
        $email = new Email();
        $email->to = self::$to;
        $email->from = self::$from;
        $email->subject = self::$subject;
        $email->fromName = self::$from_name;
        $email->html_body = self::$html_body;
        $email->text_body = self::$text_body;

        $email->save();
        self::$testId = $email->id;
        $this->assertTrue($email->id != null, "Failed Creating Email");
    }
    public function testCheckEmail()
    {
        $email = Email
            ::find(self::$testId);
        $passed = false;
        if (
            $email->fromName == self::$from_name
            && $email->subject == self::$subject
            && $email->html_body == self::$html_body
            && $email->text_body == self::$text_body
        ) {
            $passed = true;
        }

        $this->assertTrue($passed, "Failed Checking Initial Emails. ({$email->fromName})");
    }
    public function testCheckEmailAddress()
    {
        $email = Email
        ::find(self::$testId);
        $passed = true;
        if (
            $email->to[0] != self::$to[0]
        ) {
            $passed = false;
        }
        if (
            $email->to[1] != self::$to[1]
        ) {
            $passed = false;
        }
        if (
            $email->from != self::$from
        ) {
            $passed = false;
        }
        $this->assertTrue($passed, "Failed Checking Email Addresses");
    }
    public function testEmail(){
        $email = Email
            ::find(self::$testId);
        print_r($email->addQueue());
    }
}
