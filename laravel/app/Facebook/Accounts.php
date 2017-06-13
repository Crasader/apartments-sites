<?php namespace App\Facebook;

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

class Accounts extends Model
{
    protected $table = 'facebook_accounts';
    public $timestamps = false;
    public function loadVars($accessToken,$category,$accountName,$accountId,$perms=''){
        $this->access_token = $accessToken;
        $this->category = $category;
        $this->account_name = $accountName;
        $this->account_id = $accountId;
        $this->perms = $perms;
        return $this;
    }
    
    public function attachPlace(Place $p){
        //I know, this probably should be review_place.fb_account_id
        $this->fk_place_id = $p->place_id;
        return $this;
    }

    public function updateOrInsert(){
        if($first = self::where('account_id',$this->account_id)->first()){
            $first->access_token = $this->access_token;
            $first->fk_place_id = $this->fk_place_id;
            $first->save();
            return $this;
        }else{
            $this->id = $this->insertGetId();
            return $this; 
        }

    }
}
