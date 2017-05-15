<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Property\Site;
use App\Http\Controllers\SiteController;
use App\Traits\PageResolver;
use App\Util\Util;
use App\Assets\SoapClient;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Traits\NoNo;
use App\Property\Text\Type as TextType;
use App\Property\Text as PropertyText;
use App\Property\Template as PropertyTemplate;
use Redis;
use App\System\Session;
use App\Reviews\Place;

class AdminGetController extends AdminPostController
{
    use PageResolver;
    use ValidatesRequests;
    use Nono;

    //Declared by trait: protected $_site
    //TODO: Create a loading mechanism so we can dynamically load and unload allowed handlers
    protected $_mergeAllowed = [
        /******************************/
        /* Routes that process places */
        /******************************/
        '/admin/gallery/edit'    => 'handleGalleryEdit',
    ];
    protected $_translations = [];
    //

    public function __construct(){
        if(ENV("SHOW_DEBUG_BAR") == "0"){
            \Debugbar::disable();
        }
        parent::__construct();
        $this->_allowed = array_merge($this->_mergeAllowed,$this->_allowed);
    }


    public function handleGalleryEdit(Request $req){
        Site::$instance = $site = app()->make('App\Property\Site');
        return view('layouts/admin/gallery/edit');
    }

}
