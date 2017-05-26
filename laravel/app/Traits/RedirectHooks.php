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

    private function rh_residentPortal(string $mode){
        /*
         * If the mode is 'determine' then this is the chance for this redirect hook function to 
         * determine if we indeed have redirects for the given page
         */
        if($mode == 'determine'){
            /*
             * if the user is logged in and they came from the portal center page, don't redirect them.
             * instead, let them see the resident login page
             */
            if(preg_match("|/resident\-center/|",$_SERVER['HTTP_REFERER']) && Sesh::residentUserSet()){
                return false;
            }
            return true;
        }
        /*
         * Dispatch mode is where we return the redirect. We have to return a redirect, or atleast 
         * a view. So return redirect() or return view()
         */
        if($mode == 'dispatch'){
            return redirect('/resident-portal/portal-center');
        }

    }

    public function hasRedirectHooks(string $page){
        if(isset($this->_redirectHooks[$page]) == false){
            return false;
        }
        return $this->{$this->_redirectHooks[$page]}('determine');
    }

    public function dispatchRedirectHook(string $page){
        return $this->{$this->_redirectHooks[$page]}('dispatch');
    }
}