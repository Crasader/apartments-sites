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

    protected function _getApartmentEmail(){
        //TODO: move this to a different place
        if(ENV('DEV')){
            return 'wmerfalen@gmail.com';
        }
        return App\Property\Template::select('email')->where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
            ->get()->toArray()['email'];
    }
    
    public function validateCaptcha(string $captcha){
        //TODO: create a class to do this
		$postdata = http_build_query(
			array(
				'secret' => ENV('RECAPTCHA'),
				'response' => $captcha,
                'remoteIp' => $_SERVER['REMOTE_ADDR']
			)
		);

		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			)
		);

		$context  = stream_context_create($opts);
		$result = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        if(json_decode($result)->success){
            return true;
        }
        return false;
    }

    public function handleContact(){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        if(!$this->validateCaptcha($data['g-recaptcha-response'])){
            die("Invalid recaptcha");
        }
        $cleaned = [
            'fname' => preg_replace("|[^a-zA-Z \.]+|","",$data['firstname']),
            'lname' => preg_replace("|[^a-zA-Z \.]+|","",$data['lastname']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'movein' => $data['date'],
            'mode' => 'contact'
        ];  

        $contact = app()->make('App\Contact');
        $contact->first_name = $cleaned['fname'];
        $contact->last_name = $cleaned['lname'];
        $contact->email = $cleaned['email'];
        $contact->notes = 'no notes';
        $contact->property_id = Site::$instance->getEntity()->fk_legacy_property_id;
        $contact->corporate_group_id = Site::$instance->getEntity()->getLegacyProperty()->corporate_group_id;
        $contact->phone = $cleaned['phone'];
        $contact->when = $cleaned['movein'];
        $contact->save();

        $finalArray = $this->_prefillArray(['mode' => 'contact']);
        $finalArray['contact'] = $cleaned;

        $siteCon = new SiteController(Site::$instance);
        $siteData = $siteCon->resolvePageBySite('unit',$cleaned);
        (new \App\Mailer())->send(['from' => $this->_getApartmentEmail(),
            'cc' => ['matt@marketapts.com',$this->_getApartmentEmail()],
            'to' => $cleaned['email'],
            'contact' => $cleaned,
            'mode' => 'contact',
            //TODO: Dynamically grab the layouts/<TEMPLATE_DIR> 
            'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
            ]);
        if(ENV('DEV')){
            $to = 'wmerfalen@gmail.com';
        }else{
            $to = $cleaned['email'];
        }
        $siteCon = new SiteController(Site::$instance);
        $siteData = $siteCon->resolvePageBySite('contact',$cleaned);
        $siteData['data']['sent'] = true;
        return view($siteData['path'],$siteData['data']);
    }
}
