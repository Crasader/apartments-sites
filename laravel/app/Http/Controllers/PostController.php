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

    protected function _prefillArray(array $arr){

        $arr['styleSheets'] = [
            'http://www.400rhett.com/css/jquery-ui.min.css',
            'http://www.400rhett.com/css/bootstrap-theme.min.css',
            'http://www.400rhett.com/css/bootstrap.min.css',
            'http://www.400rhett.com/css/animations.css',
            'http://www.400rhett.com/css/main.css'
            ];
        $arr['apartmentName'] = Site::$instance->getEntity()->property_name;
        $arr['entity'] = Site::$instance->getEntity();
        return $arr;
    }

    protected function _getToEmail(){
        //TODO: move this to a different place
        if(ENV('DEV')){
            return 'wmerfalen@gmail.com';
        }
        return App\Property\Template::select('email')->where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
            ->get()->toArray()['email'];
    }

    public function handleContact(){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');

        $cleaned = [
            'fname' => preg_replace("|[^a-zA-Z \.]+|","",$data['firstname']),
            'lname' => preg_replace("|[^a-zA-Z \.]+|","",$data['lastname']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'movein' => $data['date'],
            'mode' => 'contact'
        ];  

        $finalArray = $this->_prefillArray(['mode' => 'contact']);
        $finalArray['contact'] = $cleaned;

        $siteCon = new SiteController(Site::$instance);
        $siteData = $siteCon->resolvePageBySite('unit',$cleaned);
        (new \App\Mailer())->send(['from' => $cleaned['email'],
            'cc' => ['matt@marketapts.com','wmerfalen@gmail.com'],   //TODO Add apartment complex's email to this
             'to' => $this->_getToEmail(),
             'contact' => $cleaned,
             'mode' => 'contact',
             'data' => view('layouts/dinapoli/email/main',$finalArray)
            ]);
        return 'lol';
    }
}
