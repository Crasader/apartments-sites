<?php

namespace App;

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
use App\System\Session;
use App\Exceptions\ParameterException;
use App\Reviews\Place;

/* Google places API wrapper */
use SKAgarwal\GoogleApi\PlacesApi;

class Reviews extends Model
{
    protected $_api = null;
    protected $table = 'reviews';
    protected $_placeObject = null;
    public function __construct(){
        $this->_placeObject = app()->make('App\Reviews\Place');
    }

    public function setApiKey($key){
        $this->_api = new PlacesApi($key);
    }

    private function preamble(){
        if($this->_api === null){
            throw new \Exception("API Key not set");
        }
    }

    public function fetchDetails($obj,$store=true,$clearFirst=true){
        $this->preamble();
        $place = $this->getPlace($obj);
         
        $deets = [];
        $deets = $this->_api->placeDetails($this->getPlace($obj)->first()->place_id,[]);
        
        if($store){
            if($clearFirst)
                $this->clearForPropertyId($place->first()->fk_legacy_property_id);
            foreach($deets['result']['reviews'] as $i => $review){
                $rev = new self();
                $rev->fk_legacy_property_id = $place->first()->fk_legacy_property_id;
                $rev->rating = $review['rating'];
                $rev->author_name = $review['author_name'];
                $rev->author_url = $review['author_url'];
                $rev->language = $review['language'];
                $rev->relative_time_description = $review['relative_time_description'];
                $rev->post_time = date("Y-m-d H:i:s",$review['time']);
                $rev->text_body = $review['text'];
                $rev->save();
            }
        }

        return $deets;
    }

    public function getPlace($obj){
        if($obj instanceof Property\Entity){
            return $this->_placeObject->loadByEntity($obj);
        }
        if($obj instanceof Property\Site){
            return $this->_placeObject->loadBySite($obj);
        }
        if($obj instanceof Legacy\Property){
            return $this->_placeObject->loadByLegacyProperty($obj);
        }
        throw new ParameterException("Class type of object is not supported by places API: " . get_class($obj));
    }


    public function clearForPropertyId($propId){
        echo "deleting..";
        self::where('fk_legacy_property_id',$propId)->delete();
    }

}
