<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;
use App\Traits\PageResolver;
use App\Util\Util;

class SiteController extends Controller
{
    use PageResolver;
    //Declared by trait: protected $_site;
    public function __construct(Site $site){
        $this->_site = $site;   //Declared by trait
        if(ENV("SHOW_DEBUG_BAR") == "0"){
            \Debugbar::disable();
        }
    }

    public function resolveResident(Request $req){
        try{
            $data = $this->resolvePageBySite($req->getRequestUri(),['resident-portal' => true]);
            return view($data['path'],$data['data']);
        }catch(Exception $e){
            //TODO: catch this !launch
            return view('404',['exception' => $e]);
        }
    }

    public function tagsAdmin(Request $req){
        return view('layouts/tags-admin');
    }

    public function tagsLogin(Request $req){
        //TODO: keep this authentication crap in the db
        if($this->validateUser($req)){
            session(['tags-admin-userid' => '1']);
            return redirect('/');
        }else{
            return view('layouts/tags-admin',['error' => 1]);
        }
    }
    
    public function tagsLogout(){
        session()->forget('tags-admin-userid');
    }

    public function validateUser(Request $req){
        $user = $req->input('user');
        $pass = $req->input('password');

        $results = \DB::connection('mysql')->table('user')->where(['username' => $user,'password' => $pass])->get();
        if(count($results)){
            return true;
        }
        return false;
    }
}
