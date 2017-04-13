<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Property\Site;
use App\Http\Controllers\SiteController;
use App\Traits\PageResolver;
use App\Util\Util;
use App\Assets\SoapClient;

class PostController extends Controller
{
    use PageResolver;
    //Declared by trait: protected $_site
    protected $_allowed = [
        'unit' => 'handleUnit',
        'contact' => 'handleContact',
        'schedule' => 'handleSchedule',
        'portal-center' => 'handleResident',
        'maintenance-request' => 'handleMaintenance',
        'reset-password' => 'handleResetPassword',
    ];
    //
    public function handle(Request $request,string $page){
        if(!in_array($page,array_keys($this->_allowed))){
            return null;
        }
        if($this->_site === null){
            $this->_site = Site::$instance;
        }
        return $this->{$this->_allowed[$page]}($request);
    }

    public function handleUnit(Request $req){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        //TODO: do this: $unitType = Util::cleanString($data['unittype']); !organization
        $cleaned = [
            'unittype' => preg_replace('|[^a-zA-Z 0-9]{1,}|','',$data['unittype']),
            'bed' => intval($data['bed']),
            'bath' => floatval($data['bath']),
            'sqft' => intval($data['sqft'])
        ];

        $siteData = $this->resolvePageBySite('unit',$cleaned);
        return view($siteData['path'],$siteData['data']);
    }

    protected function _prefillArray(array $arr){
        //TODO: replace these with the site's css !launch
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
        //TODO: move this to a different place !organization
        if(Util::isDev()){
            return 'wmerfalen@gmail.com';
        }
        return App\Property\Template::select('email')->where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
            ->get()->toArray()['email'];
    }
    
    public function validateCaptcha(string $captcha){
        //TODO: create a class to do this !organization
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

    public function decorateMaintenance($data){
        $data['permissionToEnter'] = isset($data['perm2entercb']);
        if($data['permissionToEnter'] === false){
            $data['maintenance_name'] = 'none';
            $data['PermissionToEnterDate'] = '0000/00/00';
        }
        
        return $data;
    }

    public function handleResetPassword(Request $req){
        $data = $_POST;
        Site::$instance = $this->_site = app()->make('App\Property\Site');
        $validator = Validator::make($req->all(), [
            'txtUserId' => 'required'
        ]);
        
        if($validator->fails()){
            return redirect('/resident-portal/reset-password')
                ->withErrors($validator)
                ->withInput();
        }
        $soap = app()->make('App\Assets\SoapClient');
        $data = $soap->resetPassword($data,$data['txtUserId']);
        \Debugbar::info($data);
        $siteData = $this->resolvePageBySite('/resident-portal/reset-password',['resident-portal' => true]);
        if($data['status'] == 'error'){
            $siteData['data']['userIdNotFound'] = true;
        }else{
            $siteData['data']['userIdFound'] = true;
        }
        return view($siteData['path'],$siteData['data']);
    }

    public function handleMaintenance(Request $req){
        $data = $_POST;
        Site::$instance = $this->_site = app()->make('App\Property\Site');
        if(session('user_id') === null){
            die("Not logged in");
        }
        $validator = Validator::make($req->all(), [
            'ResidentName' => 'required|max:64',
            'maintenance_unit' => 'required|max:16',
            'email' => 'required|max:128|email',
            'maintenance_phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
            'maintenance_name' => 'max:64',
            'PermissionToEnterDate' => 'date',
            'maintenance_mrequest' => 'required'
            ]);
        
        if($validator->fails()){
            return redirect('/resident-portal/maintenance-request')
                ->withErrors($validator)
                ->withInput();
        }
        $soap = app()->make('App\Assets\SoapClient');
        $data = $this->decorateMaintenance($data);
        //$soap->maintenanceRequest($data);
        $siteData = $this->resolvePageBySite('/resident-portal/maintenance-request',['resident-portal' => true]);
        $siteData['data']['sent'] = true;
        //Send email
        if(Util::isDev() == true){
            $to = 'wmerfalen@gmail.com';
        }else{
            $to = $data['email'];
        }
        (new \App\Mailer())->send(['from' => $this->_getApartmentEmail(),
            'cc' => ['matt@marketapts.com',$this->_getApartmentEmail()],
            'to' => $to,
            'contact' => ['fname' => explode(" ",$data['ResidentName'])[0],
                'lname' => explode(" ",$data['ResidentName'])[0],
                'from' => $this->_getApartmentEmail(),
            ],
            'mode' => 'maint-request',
            //TODO: Dynamically grab the layouts/<TEMPLATE_DIR> 
            'data' => view('layouts/resident-portal/email/user-confirm',$data)
        ]);
        return view($siteData['path'],$siteData['data']);
    }

    public function handleSchedule(Request $req){
        $data = $_POST;
        Site::$instance = $this->_site = app()->make('App\Property\Site');
        if(Util::isDev() == false){
            if(!$this->validateCaptcha($data['g-recaptcha-response'])){
                //TODO: make a function that makes this user friendly !launch
                die("Invalid recaptcha");
            }
        }
        //TODO: sanitize the rest of these values
        $validator = Validator::make($req->all(), [
            'firstname' => 'required|max:64|alpha',
            'lastname' => 'required|max:64|alpha',
            'email' => 'required|max:128|email',
            'phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
            'moveindate'=> 'required|date',
            'visitdate' => 'required|date',
            ]);
        if($validator->fails()){
            return redirect('schedule-a-tour')
                ->withErrors($validator)
                ->withInput();
        }
        $cleaned = [
            'fname' => $data['firstname'],
            'lname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'movein' => $data['moveindate'],
            'visit' => $data['visitdate'],
            'mode' => 'schedule-a-tour'
        ];  

        $contact = app()->make('App\Contact');
        $contact->first_name = $cleaned['fname'];
        $contact->last_name = $cleaned['lname'];
        $contact->email = $cleaned['email'];
        $contact->notes = 'contacted via schedule-a-tour';
        $contact->property_id = Site::$instance->getEntity()->fk_legacy_property_id;
        $contact->corporate_group_id = Site::$instance->getEntity()->getLegacyProperty()->corporate_group_id;
        $contact->phone = $cleaned['phone'];
        $contact->when = $cleaned['movein'];
        $contact->save();

        $finalArray = $this->_prefillArray(['mode' => 'schedule-a-tour']);
        $finalArray['contact'] = $cleaned;

        $siteData = $this->resolvePageBySite('unit',$cleaned);
        if(Util::isDev()){
            $to = 'wmerfalen+1@gmail.com';
        }else{
            $to = $cleaned['email'];
        }
        (new \App\Mailer())->send(['from' => $this->_getApartmentEmail(),
            'cc' => ['matt@marketapts.com',$this->_getApartmentEmail()],
            'to' => $to,
            'contact' => $cleaned,
            'mode' => 'schedule-a-tour',
            //TODO: Dynamically grab the layouts/<TEMPLATE_DIR> 
            'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
            ]);
        $siteData = $this->resolvePageBySite('schedule-a-tour',$cleaned);
        $siteData['data']['sent'] = true;
        return view($siteData['path'],$siteData['data']);
    }

    public function handleContact(){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        if(!$this->validateCaptcha($data['g-recaptcha-response'])){
            die("Invalid recaptcha");
        }
        $validator = Validator::make($req->all(), [
            'firstname' => 'required|max:64|alpha',
            'lastname' => 'required|max:64|alpha',
            'email' => 'required|max:128|email',
            'phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
            'date'=> 'required|date',
            ]);
        if($validator->fails()){
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
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

        $siteData = $this->resolvePageBySite('unit',$cleaned);
        if(Util::isDev()){
            $to = 'wmerfalen+1@gmail.com';
        }else{
            $to = $cleaned['email'];
        }
        (new \App\Mailer())->send(['from' => $this->_getApartmentEmail(),
            'cc' => ['matt@marketapts.com',$this->_getApartmentEmail()],
            'to' => $to,
            'contact' => $cleaned,
            'mode' => 'contact',
            //TODO: Dynamically grab the layouts/<TEMPLATE_DIR> 
            'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
            ]);
        $siteData = $this->resolvePageBySite('contact',$cleaned);
        $siteData['data']['sent'] = true;
        return view($siteData['path'],$siteData['data']);
    }

    public function handleResident(){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');

        if(Util::isDev() == false && !$this->validateCaptcha($data['g-recaptcha-response'])){
            //TODO make this user-friendly !launch
            die("Invalid recaptcha");
        }
        $user = substr($data['email'],0,64);
        $pass = substr($data['pass'],0,64);
        
        $soap = app()->make('App\Assets\SoapClient');
        $result = $soap->residentPortal($user,$pass);

        if($result[0] === 'True'){
            $page = 'resident-portal/portal-center';
            session(['user_id' => $user]);
            session(['user_info' => $result]);
            $extra = ['resident-portal' => true];
            $siteData['data']['residentInfo'] = $result;
        }else{
            $siteData['data']['residentfailed'] = true;
            $page = 'resident-portal';
            $extra = [];
        }
        $siteData = $this->resolvePageBySite($page,$extra);
        if(empty($siteData)){
            $siteData['path'] = 'resident-portal';
            $siteData['data'] = [];
        }
        \Debugbar::info($siteData);
        return view($siteData['path'],$siteData['data']);
    }
}
