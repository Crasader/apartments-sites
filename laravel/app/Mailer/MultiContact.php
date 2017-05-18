<?php

namespace App\Mailer;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;
use App\Mailer\Queue;
use App\Mailer;
use App\Property\Site;
use App\Email;

class MultiContact
{
    //


    public static function getDevEmails()
    {
        $d = env("DEV_EMAIL");
        if (strlen($d) ==0) {
            return ['ali@marketapts.com','matt@marketapts.com','william@marketapts.com'];
        }
        return array_filter(explode("|", $d), function ($item) {
            return strlen($item) > 0;
        });
    }

    /*
     * Grabs the property email. Returns Will's email if on development.
     * TODO: Return env("DEV_EMAIL") or something like that
     */
    public static function getPropertyEmail($first=true, $except=null, $force=false) : array
    {
        //TODO: !mailer use this to get property email
        if (Util::isDevDomain()) {
            return self::getDevEmails();
        }
        if (Util::isDev() && !$force) {
            return self::getDevEmails();
        }
        $site = app()->make('App\Property\Site');
        $email = $site->getEntity()->getLegacyProperty()->email;
        $chunks = explode("~", $email);
        if (count($chunks) > 1) {
            return $chunks;
        } else {
            return [$email];
        }
    }

    public static function getCcPropertyEmail()
    {
        return self::getPropertyEmail();
    }


    /* Feature change
     * If the property wants CCd emails they must follow the symfony code standard
     * where they separate emails in the db with "~"
     */

    public static function getPropertyViewHtml(string $view, $conf)
    {
        return view($view)->with($conf->getData());
    }

    public static function handleException($e)
    {
        self::log("EXCEPTION [Exception] CAUGHT WHEN SENDING ERROR LOG: " . $e->getMessage());
    }

    public static function log(string $foo)
    {
        Util::log('MULTICONTACT-' . $foo, ['log' => 'mailer']);
    }
}
