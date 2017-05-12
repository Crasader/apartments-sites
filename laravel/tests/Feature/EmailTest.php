<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Email;
use App\EmailAddress;

class EmailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public static $testId = null;
    public static $to = ['bvfbarten@gmail.com', 'brady@marketapts.com'];
    public static $from = 'brady@marketapts.com';
    public static $subject = 'test';
    public static $html_body = '<h1>Hello World</h1>';
    public static $text_body = 'Hello World';

    public function testCreateEmail()
    {
        $email = new Email;
        $email->to = self::$to;
        $email->from = self::$from;
        $email->subject = self::$subject;
        $email->html_body = self::$html_body;
        $email->text_body = self::$text_body;
        $email->save();
        self::$testId = $email->id;
        print('email_id: ' . $email->id);
        $this->assertTrue($email->id != null, "Failed Creating Email");
    }
    public function testCheckEmail()
    {
        $email = Email
            ::find(self::$testId);
        print('testId: ' . $email->from);
        print_r($email->toArray());
        $passed = false;
        if (
            $email->subject == self::$subject
            && $email->html_body == self::$html_body
            && $email->text_body == self::$text_body
        ) {
            $passed = true;
        }

        $this->assertTrue($passed, "Failed Checking Initial Emails");
    }
    public function testCheckEmailAddress()
    {
        $email = Email
        ::find(self::$testId);
        $passed = false;
        if (
            $email->to == self::$to
            &&
            $email->from == self::$from
        ) {
            $passed = true;
        }
        $this->assertTrue($passed, "Failed Checking Email Addresses");
    }
    public function testDeleteEmail()
    {
        $email = Email
            ::find(self::$testId);
        $email -> delete();
        $email = Email
            ::find(self::$testId);
        $this->assertTrue($email->id === null, "Failed Deleting Email");
    }
}
