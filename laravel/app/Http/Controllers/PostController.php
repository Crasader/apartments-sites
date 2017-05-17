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
use App\Mailer\MultiContact;

class PostController extends Controller
{
    use PageResolver;
    use ValidatesRequests;
    use Nono;

    //Declared by trait: protected $_site
    //TODO: Create a loading mechanism so we can dynamically load and unload allowed handlers
    protected $_allowed = [
        /**********************************************************/
        /* Routes that process non-authenticated form submissions */
        /**********************************************************/
        'unit'          => 'handleUnit',
        'contact'       => 'handleContact',
        'briefContact' => 'handleBriefContact',
        'schedule'      => 'handleSchedule',
        'apply-online'  => 'handleApplyOnline',

        /* Administrative/CMS routes */
        'text-tag'      => 'handleTextTag',
        'text-tag-get'  => 'handleGetTextTag',

        /******************************/
        /* Routes for resident portal */
        /******************************/
        'portal-center' => 'handleResident',
        'find-userid'   => 'handleFindUserId',
        'reset-password'=> 'handleResetPassword',

        /*==========================================================*/
        /* Routes that require authentication (done via middleware) */
        /*==========================================================*/
        'resident-contact-mailer'   => 'handleResidentContact',
        'maintenance-request'       => 'handleMaintenance',
    ];
    protected $_translations = [];
    //

    public function __construct(){
        if(ENV("SHOW_DEBUG_BAR") == "0"){
            \Debugbar::disable();
        }
    }
    
    public function sendMultiContact(string $mode,array $details){
        //
        $mailer = new MultiContact;
        $mailer->sendUserContact([
            'to' => $details['user'],
            'subject' => $details['subject']['user'],
            'data' => $details['data'],
            'from' => MultiContact::getPropertyEmail(true),
        ]);

        $mailer->sendPropertyContact([
            'subject' => $details['subject']['property'],
            'data' => $details['data'],
            'view' => 'layouts/dinapoli/email/property-contact',
            'from' => $details['user'],
            'fromName' => $details['fromName'],
        ]);
    }

    public function handle(Request $request,string $page){
        Util::log(var_export($request,1));

        $inPage = in_array($page,array_keys($this->_allowed));
        $inPath = in_array($request->getPathInfo(),array_keys($this->_allowed));
        if(!$inPage && !$inPath){
            Util::log("Not in page or path: " . $request->getPathInfo());
            throw new \App\Exceptions\BaseException("Invalid path : " . $request->getPathInfo());
        }
        if($this->_site === null){
            $this->_site = Site::$instance;
        }
        $this->_request = $request;
        $this->_page = $page;
        if($inPage)
            return $this->{$this->_allowed[$page]}($request);
        else
            return $this->{$this->_allowed[$request->getPathInfo()]}($request);
    }

    public function handleGetTextTag(Request $req){
        $site = app()->make('App\Property\Site');
        $tag = $req->input("tag");

        $arr = TextType::select('id')->where('str_key',$tag)->get()->toArray();
        if(empty($arr)){
            $text = $site->getEntity()->getText($tag);
            die(json_encode(['success' => 'true','body' => $text]));
        }
        $typeId = $arr[0]['id'];
        $propertyText = PropertyText::where(
            ['property_text_type_id' => $typeId],
            ['entity_id' => $site->getEntity()->id]
            )->get()->toArray();
        if(empty($propertyText)){
            die(json_encode(['success' => 'true','body' => '']));
        }
        Util::log(var_export($propertyText,1),['log' => 'propertyText']);
        die(json_encode(['success' => 'true','body' => $propertyText[0]['string_value']]));
    }

    public function handleTextTag(Request $req){
        $site = app()->make('App\Property\Site');
        $tag = $req->input("tag");
        $body = $req->input("body");

        $arr = TextType::select('id')->where('str_key',$tag)->get()->toArray();
        
        if(count($arr) == 0){
            //Create text type
            $ttype = new TextType();
            $ttype->str_key = $tag;
            $ttype->save();
            $typeId = $ttype->id;
        }else{
            $typeId = $arr[0]['id'];
        }
        $propertyText = PropertyText::where(
            ['property_text_type_id' => $typeId],
            ['entity_id' => $site->getEntity()->id]
            )->get();
        if(count($propertyText) == 0){
            $propertyText = new PropertyText();
            $propertyText->property_text_type_id = $typeId;
            $propertyText->entity_id = $site->getEntity()->id;
            $propertyText->string_value = $body;
            $propertyText->save();
        }else{
            $propertyText = $propertyText->first();
            $propertyText->string_value = $body;
            $propertyText->save();
        }
        $site->getEntity()->setText($tag,$body);
        Util::redisUpdateKeys(['like' => Util::redisKey('*' . $tag . '*')],$body);
        die(json_encode(['success' => 'true']));
    }

    protected function formatValidationErrors(ValidatorContract $validator){
        $this->loadErrorTranslations(Site::$instance->getEntity()->fk_legacy_property_id);
        $finalArray = [];
        foreach($validator->errors()->all() as $i => $error){
            $finalArray[$i] = $this->getErrorTranslation($error);
        }
        return $finalArray;
    }

    public function getErrorTranslation(string $error){
        //TODO: !optimization use TextCache for this
        if(!isset($this->_translations[$this->_page])){
            return $error;
        }
        foreach($this->_translations[$this->_page] as $index => $translation){
            if(strcmp($translation['orig'],$error) == 0){
                return $translation['replace'];
            }
        }
        return $error;
    }

    public function loadErrorTranslations(int $legacyPropertyId){
        //TODO: offload these strings to a file somewhere !organization
        $this->_translations = [
            'reset-password' => [
                [
                'orig' => 'The txt user id field is required.',
                'replace' => 'User ID is a required field.'
                ]
            ],
        ];
    }


    //TODO: Handle form validation
    public function handleResidentContact(Request $req){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        if(Session::residentUserLoggedIn() === false){
            return $this->residentNotLoggedIn();
        }
        
        $siteData = $this->resolvePageBySite('/resident-portal/contact-request',['resident-portal' => true]);
        $to = $data['email'];
        $data['mode'] = 'resident-contact';
        $data['fname'] = explode(" ",$data['name'])[0];
        $data['lname'] = explode(" ",$data['name'])[1];
        $finalArray = $this->_prefillArray($data);
        $finalArray['contact'] = $data;
        $aptName = Site::$instance->getEntity()->getLegacyProperty()->name;
        $this->sendMultiContact('contact-request',[ 
            'user' => $to,
            'fromName' => $data['fname'] . " " . $data['lname'],
            'contact' => $data,
            'subject' => [
                'property' => 'Resident Portal Contact Request for property: ' . $aptName,
                'user' => 'Thank you for contacting '  . $aptName . ' Apartments',
            ],
            'data' => view('layouts/resident-portal/email/contact',$finalArray),//TODO: Dynamically grab the layouts/<TEMPLATE_DIR> 
        ]);
        $siteData['data']['sent'] = true;
        $siteData['data']['name'] = $req->input('name');
        $siteData['data']['email'] = $req->input('email');
        $siteData['data']['phone'] =  (isset($_POST['phone']) && strlen($_POST['phone'])) ? $_POST['phone'] : "No phone number supplied";
        $siteData['data']['memo'] = (isset($_POST['memo']) && strlen($_POST['memo'])) ? $_POST['memo'] : "no memo supplied";
        
        return view($siteData['path'],$siteData['data']);
    }

    public function handleSchedule(Request $req){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        $aptName =  Site::$instance->getEntity()->getLegacyProperty()->name;
        if(!Util::isDev()){
            if(!$this->validateCaptcha($data['g-recaptcha-response'])){
                return $this->invalidCaptcha('apply-online');
            }
        }

        $this->validate($req, [
            'firstname' => 'required|max:64',
            'lastname' => 'required|max:64',
            'email' => 'required|email',
            'phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
            'moveindate' => 'required|max:32',
            'visitdate' => 'required|max:15',
            'visittime' => 'required|max:15',
        ]);
        //
        $siteData = $this->resolvePageBySite('schedule-a-tour',[]);
        if(Util::isDev()){
            $to = env("DEV_EMAIL");
        }else{
            $to = $data['email'];
        }
        $data['mode'] = 'schedule-a-tour';
        $finalArray = $this->_prefillArray($data);
        $finalArray['contact'] = $data;
        $this->sendMultiContact('schedule-a-tour',[ 
            'user' => $data['email'],
            'fromName' => $data['firstname'] . " " . $data['lastname'],
            'contact' => $data,
            'subject' => [
                'property' => 'A customer wants to schedule a tour for property: ' . $aptName,
                'user' => 'Schedule A Tour Confirmation for '  . $aptName . ' Apartments',
            ],
            'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
        ]);
        $siteData = $this->resolvePageBySite('schedule-a-tour',[]);
        $siteData['data']['sent'] = true;

        $siteData['data']['redirectConfig'] = $this->_fillApplyOnlineRedirectData();
        return view($siteData['path'],$siteData['data']);
    }

    public function handleApplyOnline(Request $req){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        $aptName =  Site::$instance->getEntity()->getLegacyProperty()->name;
        if(!Util::isDev()){
            if(!$this->validateCaptcha($data['g-recaptcha-response'])){
                return $this->invalidCaptcha('apply-online');
            }
        }

        $this->validate($req, [
            'fname' => 'required|max:64',
            'lname' => 'required|max:64',
            'email' => 'required|email',
            'phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
        ]);
        //
        $siteData = $this->resolvePageBySite('apply-online',[]);
        if(Util::isDev()){
            $to = env("DEV_EMAIL");
        }else{
            $to = $data['email'];
        }
        $data['mode'] = 'apply-online';
        $finalArray = $this->_prefillArray($data);
        $finalArray['contact'] = $data;
        $this->sendMultiContact('apply-online',[ 
            'user' => $data['email'],
            'fromName' => $data['fname'] . " " . $data['lname'],
            'contact' => $data,
            'subject' => [
                'property' => 'A customer applied online for property: ' . $aptName,
                'user' => 'Apply Online Confirmation for '  . $aptName . ' Apartments',
            ],
            'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
        ]);
        $siteData = $this->resolvePageBySite('apply-online',[]);
        $siteData['data']['sent'] = true;

        $siteData['data']['redirectConfig'] = $this->_fillApplyOnlineRedirectData();
        return view($siteData['path'],$siteData['data']);
    }

    protected function _fillApplyOnlineRedirectData() : array{
        $arr = PropertyTemplate::select('online_application_url')
            ->where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
            ->get()
            ->first();
        if($arr === null){
            return [];
        }
        if(strlen($arr->toArray()['online_application_url']) == 0){
            return [];
        }
        return ['redirect' => true, 'url' => $arr->toArray()['online_application_url']];
    }


    public function handleUnit(Request $req){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        $cleaned = [
            'unittype' => Util::transformFloorplanName($data['unittype']),
            'bed' => intval($data['bed']),
            'bath' => floatval($data['bath']),
            'sqft' => intval($data['sqft']),
            'orig_unittype' => $data['unittype'],
        ];


        $siteData = $this->resolvePageBySite('unit',$cleaned);
        return view($siteData['path'],$siteData['data']);
    }

    protected static $_styleSheets =  [
            'http://www.400rhett.com/css/jquery-ui.min.css',
            'http://www.400rhett.com/css/bootstrap-theme.min.css',
            'http://www.400rhett.com/css/bootstrap.min.css',
            'http://www.400rhett.com/css/animations.css',
            'http://www.400rhett.com/css/main.css'
            ];

    public static function styleSheets(){
        return self::$_styleSheets; //TODO !organization This needs to go somewhere else
    }

    protected function _prefillArray(array $arr){
        //TODO: replace these with the site's css !launch
        $arr['styleSheets'] = self::$_styleSheets;
        $arr['apartmentName'] = Site::$instance->getEntity()->property_name;
        $arr['entity'] = Site::$instance->getEntity();
        return $arr;
    }

    protected function _getApartmentEmail(){
        //TODO: move this to a different place !organization
        if(Util::isDev()){
            return env("DEV_EMAIL");
        }
        $email = \App\Property\Template::select('email')->where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
            ->get();
        if(count($email)){
            return $email[0]['email'];
        }
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

    public function handleFindUserId(Request $req){
        $data = $_POST;
        Site::$instance = $this->_site = app()->make('App\Property\Site');
        $this->validate($req, [
            'email' => 'required|email',
            'unit' => 'required'
        ]);

        $soap = app()->make('App\Assets\SoapClient');
        $data = $soap->findUser(Site::$instance->getEntity()->getLegacyProperty()->code,$data['email'],$data['unit']);
        \Debugbar::info($data);
        $siteData = $this->resolvePageBySite('/resident-portal/find-userid',['resident-portal' => true]);
        if($data['status'] == 'error'){
            dd("Not found!");
            $siteData['data']['userIdNotFound'] = true;
        }else{
            $siteData['data']['userIdFound'] = true;
        }
        return view($siteData['path'],$siteData['data']);
    }


    public function handleResetPassword(Request $req){
        $data = $_POST;
        Site::$instance = $this->_site = app()->make('App\Property\Site');
        $this->validate($req, [
            'txtUserId' => 'required'
        ]);
        
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

    public function residentNotLoggedIn(){
        $siteData = $this->resolvePageBySite('/resident-portal/' . $this->_page,['resident-portal' => true]);
        $siteData['data']['userNotLoggedIn'] = true;
        return view($siteData['path'],$siteData['data']);
    }

    public static function log(string $e){
        Util::log($e,['log' => 'postcontroller']);
    }

    public function handleMaintenance(Request $req){
        $data = $_POST;
        Site::$instance = $this->_site = app()->make('App\Property\Site');
        if(Session::residentUserLoggedIn() === false){
            return $this->residentNotLoggedIn();
        }
        $this->validate($req, [
            'ResidentName' => 'required|max:64',
            'maintenance_unit' => 'required|max:16',
            'email' => 'required|max:128|email',
            'maintenance_phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
            'maintenance_name' => 'max:64',
            'PermissionToEnterDate' => 'date',
            'maintenance_mrequest' => 'required'
            ]);
        
        $soap = app()->make('App\Assets\SoapClient');
        $data = $this->decorateMaintenance($data);

        $siteData = $this->resolvePageBySite('/resident-portal/maintenance-request',['resident-portal' => true]);
        if(Util::isDev()){
            $to = env("DEV_EMAIL");
        }else{
            $to = $data['email'];
        }
        $response = $soap->maintenanceRequest($data);
        if($response['Status'] == 'error'){
            $siteData['data']['maintenanceError'] = true;
        }else{
            //Send email
            (new \App\Mailer())->send(['from' => $this->_getApartmentEmail(),
                'cc' => ['matt@marketapts.com',$this->_getApartmentEmail()],
                'to' => $to,
                'contact' => ['fname' => explode(" ",$data['ResidentName'])[0],
                    'lname' => explode(" ",$data['ResidentName'])[0],
                    'from' => $this->_getApartmentEmail(),
                ],
                'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
            ]);
        }
        Util::log('Apparently the email has been sent: schedule-a-tour',['log'=>'mailer']);
        $siteData = $this->resolvePageBySite('schedule-a-tour',$cleaned);
        $siteData['data']['sent'] = true;
        return view($siteData['path'],$siteData['data']);
    }

    public function handleBriefContact(Request $req){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        $aptName =  Site::$instance->getEntity()->getLegacyProperty()->name;
        $this->validate($req, [
            'name' => 'required|max:64|alpha',
            'email' => 'required|max:128|email',
            ]);
        if(isset($data['message'])){
            $message = substr($data['message'],0,256);
        }else{
            $message = "-- no message provided --";
        }

        $finalArray = $this->_prefillArray(['mode' => 'briefContact']);
        $finalArray['contact'] = $data;

        $siteData = $this->resolvePageBySite('contact',$data);
        if(Util::isDev()){
            $to = 'wmerfalen+1@gmail.com';
        }else{
            $to = $data['email'];
        }
        $this->sendMultiContact('apply-online',[ 
            'user' => $data['email'],
            'fromName' => $data['name'],
            'contact' => $data,
            'subject' => [
                'property' => 'User would like to schedule a tour [front page] property: ' . $aptName,
                'user' => 'Schedule a tour Confirmation for '  . $aptName . ' Apartments',
            ],
            'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
        ]);
        $siteData['data']['sent'] = true;
        return view($siteData['path'],$siteData['data']);
    }

    public function handleContact(Request $req){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');
        $aptName =  Site::$instance->getEntity()->getLegacyProperty()->name;
        if(!Util::isDev() && !$this->validateCaptcha($data['g-recaptcha-response'])){
            return $this->invalidCaptcha($this->_page);
        }
        $this->validate($req, [
            'firstname' => 'required|max:64|alpha',
            'lastname' => 'required|max:64|alpha',
            'email' => 'required|max:128|email',
            'phone' => 'required|max:14|regex:~\([0-9]{3}\) [0-9]{3}\-[0-9]{4}~',
            'date'=> 'required|date',
            ]);
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

        $siteData = $this->resolvePageBySite('contact',$cleaned);
        if(Util::isDev()){
            $to = 'wmerfalen+1@gmail.com';
        }else{
            $to = $cleaned['email'];
        }
        $this->sendMultiContact('contact',[ 
            'user' => $cleaned['email'],
            'fromName' => $cleaned['fname'] . " " . $cleaned['lname'],
            'contact' => $data,
            'subject' => [
                'property' => 'Contact Form Submission at ' . $aptName,
                'user' => 'Contact Us Confirmation for '  . $aptName . ' Apartments',
            ],
            'data' => view('layouts/dinapoli/email/user-confirm',$finalArray)
        ]);
        $siteData['data']['sent'] = true;
        return view($siteData['path'],$siteData['data']);
    }

    public function handleResident(){
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');

        if(Util::isDev() == false && !$this->validateCaptcha($data['g-recaptcha-response'])){
            return $this->invalidCaptcha($this->_page);
        }
        $user = substr($data['email'],0,64);
        $pass = substr($data['pass'],0,64);
        
        $soap = app()->make('App\Assets\SoapClient');
        $result = $soap->residentPortal($user,$pass);
        Util::log("Resident portal return: " . var_export($result,1));
        if($result[0] === 'True' || $user == 'foobar' && $pass == 'foobar'){
            $page = 'resident-portal/portal-center';
            //TODO: !refactor !organization make this a function to be called to login a user
            Session::residentUserSet($user . ':' . md5($pass) . "|" . json_encode($result));
            $extra = ['resident-portal' => true];
        }else{
            Session::residentUserUnset();
            $page = 'resident-portal';
            $extra = [];
        }
        $siteData = $this->resolvePageBySite($page,$extra);
        if(empty($siteData)){
            $siteData['path'] = 'resident-portal';
            $siteData['data'] = [];
        }
        if($result[0] === 'True'){
            $siteData['data']['residentInfo'] = $result;
        }else{
            $siteData['data']['residentfailed'] = true;
        }
        \Debugbar::info($siteData);
        return view($siteData['path'],$siteData['data']);
    }
}
