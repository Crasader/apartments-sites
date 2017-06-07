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
use Aws\S3\S3Client as S3;


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
        foreach ($this->getPlace($obj,"") as $index => $row) {
            if($row->place_type == Reviews::GOOGLE){
                $google = $row->place_id;
                $googleDeets = $this->_api->placeDetails($google, []);
                if($store){
                    if($clearFirst){
                        $this->clear(Reviews::GOOGLE);
                    }
                    foreach(Util::arrayGet($googleDeets,'result.reviews') as $i => $review){
                        if($this->isGoodReview($review,Reviews::GOOGLE) == false){
                            continue; //Kinda scumbaggish thing to do
                        }
                        $rev = new self();
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
                        $rev = new self();
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
                $facebookDeets = $this->doFacebookReviewFetch();
                if(Util::arrayGet($facebookDeets,'status') == 'ok'){
                    if($store){
                        if($clearFirst){
                            $this->clear(Reviews::FACEBOOK);
                        }
                        $reviews = Util::arrayGet(Util::arrayGet($facebookDeets,'FacebookResponse')->getDecodedBody(),'data',[]);
                        foreach($reviews as $i => $review){
                            if($this->isGoodReview($review,Reviews::FACEBOOK) == false){
                                continue; 
                            }
                            $rev = new self();
                            $review = $this->doFacebookDecorateReview($review);
                            $rev->fk_legacy_property_id = $row->fk_legacy_property_id;
                            $rev->rating = Util::arrayGet($review,'data.rating');
                            $rev->author_name = Util::arrayGet($review,'data.reviewer.name') . "|" . Util::arrayGet($review,'data.reviewer.id');
                            $rev->author_url = Util::arrayGet($review,'data.s3_image.url');
                            $rev->language = 'en';
                            $rev->relative_time_description = '';   //TODO: it'd be nice if we could come up with our own relative time description .. packagist? hmm...
                            $rev->post_time = date("Y-m-d H:i:s", strtotime(Util::arrayGet($review,'data.created_time')));
                            $rev->text_body = Util::arrayGet($review,'data.review_text','-noreview-');
                            $rev->place_type = Reviews::FACEBOOK;
                            $rev->save();
                        }
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
            case Reviews::FACEBOOK:
                if(Util::arrayGet($review,'rating',0) == 5){
                    return true;
                }else{
                    return false;
                }
                break;
            default: 
                throw new \Exception("Unknown review type: $type");
                break;
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


 ######    ##     ####   ######  #####    ####    ####   #    #
  #        #  #   #    #  #       #    #  #    #  #    #  #   #
   #####   #    #  #       #####   #####   #    #  #    #  ####
    #       ######  #       #       #    #  #    #  #    #  #  #
     #       #    #  #    #  #       #    #  #    #  #    #  #   #
      #       #    #   ####   ######  #####    ####    ####   #    #


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
        /* The following three lines basically deprecate the page_access_token_expiration column
         * in the mysql db. This is the most reliable way to check if the token is stale or not
         * Return !data.is_valid
         */
        try{
            $info = $this->doFacebookTokenInfo(Util::arrayGet($place->pluck('page_access_token'),0),Util::arrayGet($place->pluck('page_access_token'),0));
            $body = json_decode(Util::arrayGet($info,'info')->getBody(),true);
            return !Util::arrayGet($body,'data.is_valid');
        }catch(\Exception $e){
            Util::monoLog("isStaleFacebookToken caught exception: {$e->getMessage()}",'error');
            return true;
        }
    }

    public function doFacebookGenerateS3Url(int $userId){
        //
        $image = trim($userId) . '.jpg';
        return [//'web_url' => env('WEB_PUBLIC_BASE') . 'facebook/reviews/' . trim($image), 
            's3_path' => 's3://mktapts/facebook/reviews/' . trim($image)
        ];
    }

    /* !curl downloads an image from facebook 
     * !curl posts an image to s3
     */
    public function doUploadUserImageToS3(int $userId,$userData){
        //TODO: grab the property for the current site
        $place = $this->getPlace(app()->make('App\Property\Site'),Reviews::FACEBOOK);
        $legacyProperty = LegacyProperty::select('code')->where('id', Util::arrayGet($place->pluck('fk_legacy_property_id'),0))->first();
        $code = $legacyProperty->code;

        //TODO: generate the path where the image should go
        $targets = $this->doFacebookGenerateS3Url($userId);
        //TODO: download the image from facebook
        /* !curl_call here - downloads image from facebook */
        $foo = file_get_contents(Util::arrayGet($userData,'url'));
        $targetFile = "/tmp/" . uniqid() . "-{$userId}.jpg";
        file_put_contents($targetFile,$foo);
        if(filesize($targetFile) == 0){
            Util::monoLog("Target file is zero length after retrieving from facebook: " . Util::arrayGet($userData,'url'),'warning');
            throw new \Exception("File size of retrieved image ($userId) is zero!");
        }

        try{
            $result = $this->s3Put($targetFile,Util::arrayGet($targets,'s3_path'));
        }catch(\Exception $e){
            return ['status' => 'error','exception' => $e->getMessage()];
        }
        return ['status' => 'ok','s3result' => $result,'url' => Util::arrayGet($result,'result')->get('ObjectURL') ];
    }

    /* Returns the url of the user's image on facebook */
    public function doFacebookUserImageFetch(int $userId){
        try{
            $fb = $this->doBuildRawFacebookObject();
            $place = $this->getPlace(app()->make('App\Property\Site'),Reviews::FACEBOOK);
            $pageAccessToken = Util::arrayGet($place->pluck('page_access_token'),0);
            $pix = Util::arrayGet($fb,'fb')->get(implode("/",['',$userId,'picture']) . '?redirect=false',$pageAccessToken);
            $url = Util::arrayGet($pix->getDecodedBody(),'data.url');
        }catch(\Exception $e){
            return ['status' => 'error','exception' => $e->getMessage()];
        }
        return ['status' => 'ok','data' => $pix,'url' => $url];
    }

    /*
     * !curl - Performs HTTP request to see if the user's image exists on S3
     * !curl - Performs HTTP request to Facebook to grab image url from graph api
     * !curl - Performs HTTP upload to S3 to upload the facebook user's image to S3
     */
    public function doFacebookDecorateReview($review){
        //TODO: grab the user's image url :)
        try{
            /* !curl_call here */
            $imageData = $this->doFacebookUserImageFetch(Util::arrayGet($review,'reviewer.id'));
            $review['s3_image'] = $this->doUploadUserImageToS3(Util::arrayGet($review,'reviewer.id'),$imageData);
        }catch(\Exception $e){
            Util::monoLog("doFacebookDecorateReview doFacebookUserImageFetch failed with exception: {$e->getMessage()}",'error');
            return ['status' => 'error','exception' => $e->getMessage()];
        }
        return ['status' => 'ok','data' => $review];

        //TODO: Detect if it's a hot chick using facial recogniztion/detection and advanced AI
    }

//TODO: It would be *really* nice if we could add a scope to this class so that fk_legacy_property_id is always the current site
    public function doFacebookReviewFetch($forceTokenRefresh=false){ 
        try{
            $fb = $this->doBuildFacebookObject($forceTokenRefresh);
        }catch(BaseException $e){
            return ['status' => 'error','exception' => $e];
        }

        $accountData = $this->doGetFacebookAccounts($fb['fb'],Util::arrayGet($fb['place']->pluck('page_access_token'),0));
        if(Util::arrayGet($accountData,'status','error') == 'error'){
            return ['status' => 'error','error_data' => $accountData];
        }
        $ratings = $fb['fb']->get("/" . Util::arrayGet($accountData,'id') . "/ratings",Util::arrayGet($accountData,'pageAccessToken'));
        return ['status' => 'ok','FacebookResponse' => $ratings];
    }
   
    public function doFacebookTokenInfo($inputToken,$appAccessToken){
        try{
            $fb = Util::arrayGet($this->doBuildRawFacebookObject(),'fb');
            $info = $fb->get('/debug_token?input_token=' . trim($inputToken) . '&access_token=' . trim($appAccessToken));
        }catch(\Exception $e){
            return ['status' => 'error','exception' => $e->getMessage()];
        }
        $statusCode = $info->getHttpStatusCode();
        if($statusCode == 200){
            return ['status' => 'ok','info' => $info];
        }else{
            Util::monoLog("facebook token info returned an invalid http status code: $statusCode","warning");
            return ['status' => 'error','info' => $info];
        }
    
    }

    /* No fancy shit, just give me the object */
    public function doBuildRawFacebookObject(){
        return ['status' => 'ok', 
            'fb' => new FB([
                'app_id' => $this->getFacebookAppId(),
                'app_secret' => $this->getFacebookAppSecret(),
                'default_graph_version' => $this->getFacebookGraphVersion()
            ]),
        ];
    }

    /* !curl Makes HTTP call to check if an access token is stale. graph api on facebook.com 
     */
    public function doBuildFacebookObject($forceTokenRefresh=false){
        /* This code should probably be in it's own function... it essentially builds a facebook request */
        $log = [];
        $facebookData = Place::where('fk_legacy_property_id',app()->make('App\Property\Site')->getEntity()->fk_legacy_property_id)
            ->where('place_type',Reviews::FACEBOOK)->first();
        if(!$facebookData){
            return ['status' => 'error', 'message' => 'No facebook id associated with this property'];
        }
        $log[] = "Found facebook row for current property";
        $tempAccessToken = Util::arrayGet($facebookData->pluck('access_token'),0);
        $pageAccessToken = $facebookData->pluck('page_access_token');

        if($forceTokenRefresh || $this->isStaleFacebookToken($facebookData)){
            /* Perform necessary steps to grab the extended page access token */
            /* We will update the page access token :) */
            $json = self::curl('https://graph.facebook.com/v2.9/oauth/access_token?grant_type=fb_exchange_token&client_id=' . 
                $this->getFacebookAppId() . '&client_secret=' . 
                $this->getFacebookAppSecret() . '&fb_exchange_token=' . 
                $tempAccessToken,null,[],'get');
            $data = json_decode($json);

            /* 
             * If the expires_in token isn't present, then we call our token info function to grab the
             * expiration time
             */
            $expires = Util::arrayGet($data,'expires_in',null);
            if($expires === null){
                /* Grab the token info */
                $tokenInfo = $this->doFacebookTokenInfo($data->access_token,$tempAccessToken);
                if(Util::arrayGet($tokenInfo,'status') == 'ok'){
                    $expires = Util::arrayGet($tokenInfo,'expiration');
                }else{
                    if(isset($tokenInfo['exception'])){
                        Util::monoLog("Error getting token info: " . Util::arrayGet($tokenInfo,'exception'),'error');
                    }
                    if(isset($tokenInfo['info'])){
                        Util::monoLog("Token info follow-up info: ". Util::arrayGet($tokenInfo,'info'),'info');
                    }
                }
            }
            $facebookData->page_access_token_expiration = $expires;
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

    public function s3Put($src,$dest,$bucket = 'mktapts'){
        // TODO: !organization create a very generic S3 trait that will allow us to fetch an s3 object with credentials already filled in like below
        $options = [
            'region'            => 'us-west-2',
            'version'           => '2006-03-01',
            'signature_version' => 'v4',
            'credentials'   => [
                'key' => env('AWS_KEY'),
                'secret' => env('AWS_SECRET')
            ]
        ];
        $s3Client = new S3($options);
        try {
            $result = $s3Client->putObject([
                'Bucket'     => $bucket,
                'Key'        => $dest,
                'SourceFile' => $src,
                'ACL' => 'public-read',
            ]);
        } catch (S3Exception $e) {
            throw new \Exception($e);
        }
        return ['status' => 'ok','result' => $result];
    }
}
