<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Interfaces\IFormatter;
use App\Property\Text as PropertyText;
use App\Property\Text\Type as TextType;
use App\Property\Site;
use App\Traits\TextCache;
use App\Property\Neighborhood;
use App\Property\Template as PropertyTemplate;
use App\Template;
use App\State;
use App\Util\Util;
use App\Property\Clientside\Assets as ClientsideAssets;
use App\Traits\LoadableByArray;
use App\Exceptions\BaseException;
use App\Exceptions\SetupException;
use App\System\Session;
use App\Exceptions\ParameterException;
use App\Reviews\Place;
use Facebook\Facebook as FB;


/* Google places API wrapper */
use SKAgarwal\GoogleApi\PlacesApi;

class Reviews extends Model
{
    const GOOGLE = 'g';
    const YELP = 'y';
    const FACEBOOK = 'fb';
    protected $_api = null;
    protected $_yelp = null;
    protected $table = 'reviews';
    protected $_placeObject = null;
    protected $_provider = null;
    protected $_yelpAccessToken = null;
    public function __construct()
    {
        $this->_placeObject = app()->make('App\Reviews\Place');
    }

    //TODO: !organization extract this to a service provider
    public static function curl($endpoint, $params, $headers=[],$reqType='POST')
    {
        $curl = curl_init($endpoint);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $ourHeaders = ['cache-control: no-cache'];
        $postData = "";
        if($params){
            foreach ($params as $k => $v) {
                $postData .= $k . '='.urlencode($v).'&';
            }
        }
        $postData = rtrim($postData, '&');
        if (count($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array_merge($headers, $ourHeaders));
        }
        if(strtolower($reqType) == 'post'){
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        }
        $json_response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($status != 200) {
            throw new \Exception("Error: call to URL $endpoint failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl) . "\n");
        }
        curl_close($curl);
        return $json_response;
    }

    public function setApiKey($key)
    {
        $this->_api = new PlacesApi($key);
    }

    private function preamble()
    {
        if ($this->_api === null) {
            throw new \Exception("API Key not set");
        }
    }

    public function fetchDetails($obj, $store=true, $clearFirst=true)
    {
        $this->preamble();

        $googleDeets = $yelpDeets = $facebookDeets = [];
        $facebookDeets = $this->doFacebookReviewFetch();
        dd($facebookDeets);
        foreach ($this->getPlace($obj,"") as $index => $row) {
            if($row->place_type == Reviews::GOOGLE){
                $google = $row->place_id;
                $googleDeets = $this->_api->placeDetails($google, []);
                if($store){
                    if($clearFirst){
                        $this->clear(Reviews::GOOGLE);
                    }
                    foreach(Util::arrayGet($googleDeets,'result.reviews') as $i => $review){
                        $rev = new self();
                        if($this->isGoodReview($review,Reviews::GOOGLE) == false){
                            continue; //Kinda scumbaggish thing to do
                        }
                        $rev->fk_legacy_property_id = $row->fk_legacy_property_id;
                        $rev->rating = Util::arrayGet($review,'rating');
                        $rev->author_name = Util::arrayGet($review,'author_name');
                        $rev->author_url = Util::arrayGet($review,'author_url');
                        $rev->language = Util::arrayGet($review,'language');
                        $rev->relative_time_description = Util::arrayGet($review,'relative_time_description');
                        $rev->post_time = date("Y-m-d H:i:s", Util::arrayGet($review,'time'));
                        $rev->text_body = Util::arrayGet($review,'text');
                        $rev->place_type = Reviews::GOOGLE;
                        $rev->save();
                    }
                }
            }
            if($row->place_type == Reviews::YELP){
                $yelp = $row->place_id;
                $yelpToken = $this->yelpGetAccessToken();
                if($yelpToken === null){
                    throw new \Exception("Could not retrieve access token (yelp)");
                }
                $yelpDeets = $this->doYelpReviewFetch($yelp);
                if($store){
                    if($clearFirst){
                        $this->clear(Reviews::YELP);
                    }
                    foreach(Util::arrayGet($yelpDeets,'reviews') as $i => $review){
                        if($this->isGoodReview($review,Reviews::YELP) == false){
                            continue; 
                        }
                        $rev->fk_legacy_property_id = $row->fk_legacy_property_id;
                        $rev->rating = Util::arrayGet($review,'rating');
                        $rev->author_name = Util::arrayGet($review,'user.name');
                        $rev->author_url = Util::arrayGet($review,'user.image_url');
                        $rev->language = 'en';
                        $rev->relative_time_description = '';
                        $rev->post_time = date("Y-m-d H:i:s", Util::arrayGet($review,'time'));
                        $rev->text_body = Util::arrayGet($review,'text');
                        $rev->place_type = Reviews::YELP;
                        $rev->save();
                    }
                }
            }
            if($row->place_type == Reviews::FACEBOOK){
                $yelp = $row->place_id;
                $yelpToken = $this->yelpGetAccessToken();
                if($yelpToken === null){
                    throw new \Exception("Could not retrieve access token (yelp)");
                }
                $facebookDeets = $this->doFacebookReviewFetch($yelp);
                if($store){
                    if($clearFirst){
                        $this->clear(Reviews::FACEBOOK);
                    }
                    foreach(Util::arrayGet($yelpDeets,'reviews') as $i => $review){
                        if($this->isGoodReview($review,Reviews::FACEBOOK) == false){
                            continue; 
                        }
                        $rev->fk_legacy_property_id = $row->fk_legacy_property_id;
                        $rev->rating = Util::arrayGet($review,'rating');
                        $rev->author_name = Util::arrayGet($review,'user.name');
                        $rev->author_url = Util::arrayGet($review,'user.image_url');
                        $rev->language = 'en';
                        $rev->relative_time_description = '';
                        $rev->post_time = date("Y-m-d H:i:s", Util::arrayGet($review,'time'));
                        $rev->text_body = Util::arrayGet($review,'text');
                        $rev->place_type = Reviews::YELP;
                        $rev->save();
                    }
                }
            }
        }
        return [self::GOOGLE => $googleDeets, self::YELP => $yelpDeets,
            self::FACEBOOK => $facebookDeets];
    }

    public function clear($type){
        return \DB::table('reviews')->where('fk_legacy_property_id',app()->make('App\Property\Site')->getEntity()->fk_legacy_property_id)
                ->where('place_type',$type)
                ->delete();
    }

    public function isGoodReview($review,$type){
        switch($type){
            case Reviews::YELP:
                if(intval(Util::arrayGet($review,'rating')) == 5){
                    return true;
                }else{
                    return false;
                }
                break;
            case Reviews::GOOGLE:
                if(intval(Util::arrayGet($review,'rating')) == 5){
                    return true;
                }else{
                    return false;
                }
                break;
            default: 
                throw new \Exception("Unknown review type: $type");
        }
        return false;
    }

    public function yelpGetAccessToken()
    {
        //TODO: check if an access token is stored in the db, if there is one, grab it and return it
        $params = array(
          "client_id" => env('YELP_CLIENT_ID'),
          "client_secret" => env('YELP_CLIENT_SECRET'),
          "grant_type" => "bearer");
        $endpoint = "https://api.yelp.com/oauth2/token";
        $json = json_decode(self::curl($endpoint, $params), true);
        $this->_yelpAccessToken = $json['access_token'];
        return $json;
    }

    public function doYelpReviewFetch($yelpId=null)
    {
        if ($yelpId === null) {
            $businessId = Place::where(
                ['fk_legacy_property_id' => Site::$instance->getEntity()->fk_legacy_property_id],
                ['place_type' =>  Reviews::YELP])->get();
            if (count($businessId) == 0) {
                throw new BaseException("Business center ID has not been setup for this property: " . Site::$instance->getEntity()->getLegacyProperty()->url);
            }
            $businessId = $businessId->first()->place_id;
        }else{
            $businessId = $yelpId;
        }
        $endpoint = "https://api.yelp.com/v3/businesses/{id}/reviews";
        $endpoint = str_replace("{id}", $businessId, $endpoint);
        $json = json_decode(self::curl($endpoint,null, ['Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $this->_yelpAccessToken],'GET'), true);
        return $json;
    }

    public function getFacebookAppId(){
        return '1941089599495744'; 
    }

    public function getFacebookAppSecret(){
        return 'af4a7f2649a47c91fb9522e5db277a1b';
    }

    public function getFacebookGraphVersion(){
        return 'v2.9';
    }

    public function isStaleFacebookToken(Place $place){
        /* If the timestamp is null, then yes it is a stale token */
        $expiration = Util::arrayGet($place->pluck('page_access_token_expiration'),0);
        if($expiration === null){
            return true;
        }

        /* 
         * If the timestamp is an integer check to see if the updated_at field is set.
         */
        $updatedAt = Util::arrayGet($place->pluck('updated_at'),0);
        if($updatedAt === null){
            /* If the timestamp is set on the created_at field, then do the calculation to see if
             * the token is stale. 
             *
             * This situation occurs when the token has been inserted into review_place table, but it
             * not updated (in which case updated_at would have a valid value and not null).
             */
            $createdAt = Util::arrayGet($place->pluck('created_at'),0);
            if($createdAt === NULL){
                /* If the created_at field is null, then we really don't have anything to go on. We can't
                 * do the calculation to see if the token is expired. Return true (token is stale)
                 */
                return true;
            }else{
                $baseTime = $createdAt->timestamp;
            }
        }else{
            /* In this case, the updated_at field is set to a timestamp meaning that we recently updated the field.
             * Use this field's value as the base time for calculation expiration
             */
            $baseTime = $updatedAt->timestamp;
        }
        $now = (new \Carbon\Carbon)->now()->timestamp;
        if($now < ($baseTime + $expiration)){
            /* This means that the token is still valid, therefore it is *not* stale 
             */
            return false;
        }else{
            /* Token is indeed stale */
            return true;
        }
    }


//TODO: It would be *really* nice if we could add a scope to this class so that fk_legacy_property_id is always the current site
    public function doFacebookReviewFetch(){ 
        try{
            $fb = $this->doBuildFacebookObject();
        }catch(BaseException $e){
            return ['status' => 'error','exception' => $e];
        }

        $accountData = $this->doGetFacebookAccounts($fb['fb'],Util::arrayGet($fb['place']->pluck('page_access_token'),0));
        if(Util::arrayGet($accountData,'status','error') == 'error'){
            return ['status' => 'error','error_data' => $accountData];
        }
        $ratings = $fb['fb']->get("/" . Util::arrayGet($accountData,'id') . "/ratings",Util::arrayGet($accountData,'pageAccessToken'));
        dd($ratings);
    }
    

    public function doBuildFacebookObject(){
        /* This code should probably be in it's own function... it essentially builds a facebook request */
        $log = [];
        $facebookData = Place::where('fk_legacy_property_id',app()->make('App\Property\Site')->getEntity()->fk_legacy_property_id)
            ->where('place_type',Reviews::FACEBOOK)->first();
        if(!$facebookData){
            return ['status' => 'error', 'message' => 'No facebook id associated with this property'];
        }
        $log[] = "Found facebook row for current property";
        $tempAccessToken = $facebookData->pluck('access_token');
        $pageAccessToken = $facebookData->pluck('page_access_token');

        if($this->isStaleFacebookToken($facebookData)){
            /* Perform necessary steps to grab the extended page access token */
            $json = self::curl('https://graph.facebook.com/v2.9/oauth/access_token?grant_type=fb_exchange_token&client_id=' . 
                $this->getFacebookId() . '&client_secret=' . 
                $this->getFacebookSecret() . '&fb_exchange_token=' . 
                $this->getFacebookCleanToken($tempAccessToken),null,[],'get');
            $data = json_decode($json);
            /* We will update the page access token :) */
            $facebookData->page_access_token_expiration = $data->expires_in;
            $pageAccessToken = $facebookData->page_access_token = $data->access_token;
            $facebookData->updated_at = (new \Carbon\Carbon)->now()->timestamp;
            $facebookData->save();
            $log[] = "Facebook page_access_token expired. Updated with new one";
        }
        return ['status' => 'ok', 
            'fb' => new FB([
                'app_id' => $this->getFacebookAppId(),
                'app_secret' => $this->getFacebookAppSecret(),
                'default_graph_version' => $this->getFacebookGraphVersion()
            ]),
            'place' => $facebookData,
            'log' => $log,
        ];
    }

    public function doGetFacebookAccounts($fbObject,$pageAccessToken){
        try{
            $accounts = $fbObject->get('/me/accounts',$pageAccessToken); 
        }catch(\Facebook\Exceptions\FacebookResponseException $e) {
            return ['status' => 'error','message' => "FacebookResponseException: " . $e->getMessage()];
        }catch(\Facebook\Exceptions\FacebookSDKException $e) {  
            return ['status' => 'error','message' => "FacebookSDKException: " . $e->getMessage()];
        }
        $data = json_decode($accounts->getBody(),true);
        $pageAccessToken = Util::arrayGet($data,'data.0.access_token');
        $id = Util::arrayGet($data,'data.0.id');
        $name = Util::arrayGet($data,'data.0.name');
        $status = 'ok';
        return compact('id','name','pageAccessToken','data','status');
    }

    public function getFacebookCleanToken(string $token) : string{
        return preg_replace("|[\\[\"\\]]+|","",$token);
    }

    public function getPlace($obj, $type)
    {
        if ($obj instanceof Property\Entity) {
            return $this->_placeObject->loadByEntity($obj, $type);
        }
        if ($obj instanceof Property\Site) {
            return $this->_placeObject->loadBySite($obj, $type);
        }
        if ($obj instanceof Legacy\Property) {
            return $this->_placeObject->loadByLegacyProperty($obj, $type);
        }
        throw new ParameterException("Class type of object is not supported by places API: " . get_class($obj));
    }


    public function clearForPropertyId($propId)
    {
        echo "deleting..";
        self::where('fk_legacy_property_id', $propId)->delete();
    }
}
