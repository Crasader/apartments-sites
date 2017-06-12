<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;
use App\Traits\PageResolver;
use App\Util\Util;
use App\System\Session;
use App\Reviews\Place;

class FacebookController extends Controller
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

    public function resolveTemplatePath($templateDir,$page,$inData){
        if(is_array($page)){
            $targetPage = Util::arrayGet($page,'page');
        }else{
            $targetPage = $page;
        }
        return "layouts/$templateDir/pages/social-media/facebook/$targetPage";
    }

    public function dumpJson($status,array $data){
        //TODO: Do header json crap
        die(json_encode(['status' => $status,'data' => $data]));
    }

    public function post($page){
        switch($page){
            case 'saveAccessToken':
            $rec = new Place;
            $ret = $rec->saveNew(
                ['place_type' => 'fb',
                'place_id' => Util::arrayGet(request()->input('response'),'authResponse.userID',Place::NO_PLACE_ID),
                'access_token' => request()->input('token'),
                'replace' => (request()->input('replace') == 'y' ? true : false)
                ]);
            if(Util::arrayGet($ret,'status') == 'error' &&
                Util::arrayGet($ret,'record_exists') == true){
                $this->dumpJson('ok',['record_exists'=>'1']);
            }
            $this->dumpJson(Util::arrayGet($ret,'status','error'),$ret);
        }
    }
}
