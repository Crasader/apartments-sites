<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Interfaces\IFormatter;
use App\Property\Text as PropertyText;
use App\Property\Text\Type as TextType;
use App\Property\Site;
use App\Traits\Features as FeaturesTrait;
use App\Property\Apartment\Feature as ApartmentFeature;
use App\Property\Community\Feature as CommunityFeature;
use App\Property\Other\Feature as OtherFeature;
use Redis;
use App\Util\Util;
use App\System\Session as Sesh;

trait RedirectHooks
{
    protected $_redirectHooks = [
        'resident-portal' => 'rh_residentPortal',
    ];

    private function rh_residentPortal(string $mode)
    {
        /*
         * If the mode is 'determine' then this is the chance for this redirect hook function to
         * determine if we indeed have redirects for the given page
         */
        if ($mode == 'determine') {
            /*
             * if the user is logged in and they came from the portal center page, don't redirect them.
             * instead, let them see the resident login page
             */
            if (Sesh::residentUserLoggedIn() && preg_match("|/resident\-center/|", Util::arrayGet($_SERVER, 'HTTP_REFERER', null))) {
                return false;
            }

            /*
             * If the user is not logged in, don't redirect them anywhere, just let them see the resident portal login
             */
            return Sesh::residentUserLoggedIn();
        }
        /*
         * Dispatch mode is where we return the redirect. We have to return a redirect, or atleast
         * a view. So return redirect() or return view()
         */
        if ($mode == 'dispatch') {
            return redirect('/resident-portal/portal-center');
        }
    }

    public function hasRedirectHooks($page)
    {
        $strPage = null;
        if (is_object($page) && method_exists($page, "getPathInfo")) {
            $strPage = $page->getPathInfo();
        }
        if (is_string($page)) {
            $strPage = $page;
        }
        if (!$strPage) {
            Util::monolog("hasRedirectHooks caught possible invalid page type: " . gettype($page), 'warning');
            return false;
        }
        if (!isset($this->_redirectHooks[$strPage])) {
            return false;
        }
        return $this->{$this->_redirectHooks[$strPage]}('determine');
    }
            

    public function dispatchRedirectHook(string $page)
    {
        return $this->{$this->_redirectHooks[$page]}('dispatch');
    }
}
