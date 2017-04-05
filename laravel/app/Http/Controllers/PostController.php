<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;
use App\Http\Controllers\SiteController;

class PostController extends Controller
{
    protected $_allowed = [
        'unit' => 'handleUnit',
        'contact' => 'handleContact',
    ];
    //
    public function handle(string $page){
        if(!in_array($page,array_keys($this->_allowed))){
            return null;
        }
        return $this->{$this->_allowed[$page]}();
    }

    public function handleUnit(){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        //TODO: do this: $unitType = Util::cleanString($data['unittype']);
        $cleaned = [
            'unittype' => preg_replace('|[^a-zA-Z 0-9]{1,}|','',$data['unittype']),
            'bed' => intval($data['bed']),
            'bath' => floatval($data['bath']),
            'sqft' => intval($data['sqft'])
        ];

        $siteCon = new SiteController(Site::$instance);
        $siteData = $siteCon->resolvePageBySite('unit',$cleaned);
        return view($siteData['path'],$siteData['data']);
    }
}
