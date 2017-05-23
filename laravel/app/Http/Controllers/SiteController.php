<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;
use App\Traits\PageResolver;
use App\Util\Util;
use App\System\Session;

class SiteController extends Controller
{
    use PageResolver;
    //Declared by trait: protected $_site;
    public function __construct(Site $site)
    {
        $this->_site = $site;   //Declared by trait
        if (ENV("SHOW_DEBUG_BAR") == "0") {
            \Debugbar::disable();
        }
    }

    public function resolveResident(Request $req)
    {
        try {
            Util::log("Resolved page by site", ['log' => 'sitecontroller']);
            $data = $this->resolvePageBySite($req->getRequestUri(), ['resident-portal' => true]);
            Util::log("Resolved page by site: " . var_export($data, 1), ['log' => 'sitecontroller']);
            return view($data['path'], $data['data']);
        } catch (Exception $e) {
            //TODO: catch this !launch
            Util::log('EXCEPTION CAUGHT: ' . $e->getMessage(), ['log' => 'sitecontroller']);
            return view('404', ['exception' => $e]);
        }
    }

    public function tagsAdmin(Request $req)
    {
        return view('layouts/tags-admin');
    }

    public function tagsLogin(Request $req)
    {
        //TODO: keep this authentication crap in the db
        $results = [];
        if (($results = $this->validateUser($req)) !== false) {
            Session::cmsUserSet(json_encode($results));
            if (preg_match("|\?redirect=([a-z0-9]+)|", $_SERVER['HTTP_REFERER'], $matches)) {
                return redirect('/' . $matches[1]);
            }
            return redirect('/');
        } else {
            return view('layouts/tags-admin', ['error' => 1]);
        }
    }
    
    public function tagsLogout()
    {
        Session::unsetKey(Session::CMS_USER_KEY);
    }

    public function validateUser(Request $req)
    {
        $user = $req->input('user');
        $pass = $req->input('password');

        $results = \DB::connection('mysql')->table('user')->where(['username' => $user,'password' => $pass])->get();
        if (count($results)) {
            return $results;
        }
        return false;
    }
}
