<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;
use App\Traits\PageResolver;

class SiteController extends Controller
{
    use PageResolver;
    //Declared by trait: protected $_site;
    public function __construct(Site $site){
        $this->_site = $site;   //Declared by trait
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
}
