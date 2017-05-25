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

/* Google places API wrapper */
use SKAgarwal\GoogleApi\PlacesApi;

class Reviews extends Model
{
    const GOOGLE = 'g';
    const YELP = 'y';
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
    public static function doOauth($endpoint, $params, $headers=[])
    {
        $curl = curl_init($endpoint);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        $ourHeaders = ['cache-control: no-cache'];//,'Content-Type: application/x-www-form-urlencoded'];
        if (count($headers)) {
            curl_setopt($curl, CURLOPT_HEADER, array_merge($headers, $ourHeaders));
        }
        $postData = "";

        //This is needed to properly form post the credentials object
        foreach ($params as $k => $v) {
            $postData .= $k . '='.urlencode($v).'&';
        }

        $postData = rtrim($postData, '&');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        $json_response = curl_exec($curl);

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // evaluate for success response
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

        foreach ($this->getPlace($obj,"") as $index => $row) {
            if($row->place_type == Reviews::GOOGLE){
                $google = $row->place_id;
            }
            if($row->place_type == Reviews::YELP){
                $yelp = $row->place_id;
            }
        }
        $deets = $this->_api->placeDetails($google, []);
        $yelpToken = $this->yelpGetAccessToken();
        if($yelpToken === null){
            throw new \Exception("Could not retrieve access token (yelp)");
        }
        $yelpData = $this->doYelpReviewFetch($yelp);
        dd("Yelp data: ",$yelpData);
        if ($store) {
            if ($clearFirst) {
                $this->clearForPropertyId($place->first()->fk_legacy_property_id);
            }
            foreach ($deets['result']['reviews'] as $i => $review) {
                $rev = new self();
                $rev->fk_legacy_property_id = $place->first()->fk_legacy_property_id;
                $rev->rating = $review['rating'];
                $rev->author_name = $review['author_name'];
                $rev->author_url = $review['author_url'];
                $rev->language = $review['language'];
                $rev->relative_time_description = $review['relative_time_description'];
                $rev->post_time = date("Y-m-d H:i:s", $review['time']);
                $rev->text_body = $review['text'];
                $rev->source = Reviews::GOOGLE;
                $rev->save();
            }
        }

        return [self::GOOGLE => $deets, self::YELP => $yelp];
    }

    public function yelpGetAccessToken()
    {
        //TODO: check if an access token is stored in the db, if there is one, grab it and return it
        $params = array(
          "client_id" => env('YELP_CLIENT_ID'),
          "client_secret" => env('YELP_CLIENT_SECRET'),
          "grant_type" => "bearer");
        $endpoint = "https://api.yelp.com/oauth2/token";
        $json = json_decode(self::doOauth($endpoint, $params), true);
        $this->_yelpAccessToken = $json['access_token'];
        return $json;
    }

    public function doYelpReviewFetch($yelpId=null)
    {
        $params = array(
            'access_token' => $this->_yelpAccessToken
        );
        if ($yelpId === null) {
            $businessId = Places::where(
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
        $json = json_decode(self::doOauth($endpoint, $params, ['Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $this->_yelpAccessToken]), true);
        return $json;
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
