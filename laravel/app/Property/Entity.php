<?php

namespace App\Property;

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

class Entity extends Model
{

    use TextCache;
    protected $table = 'property_entity';
    protected $_legacyProperty = null;

    //
    public function createNew(array $attributes,LegacyProperty $legacyProperty){
        $this->_preprocessAttributes($attributes);

        foreach($attributes as $key => $value){
            $this->$key = $value;
        }
        
        $this->fk_legacy_property_id = $legacyProperty->id;
        if(isset($attributes['fk_template_id'])){
            $this->fk_template_id = $attributes['fk_template_id'];
        }else{
            $this->fk_template_id = env('DEFAULT_TEMPLATE_ID');
        }
        self::save();
        $this->loadLegacyProperty();
        return $this;
    }

    public function getAssetsVersion(string $path){
        return date("Y-m-d-H-i_s", fileatime(public_path() . "/" . $path));
    }

    public function createClientDir(){
        shell_exec("mkdir " . public_path() . "/clients/" . $this->getFileSystemId());
    }

    public function generateFileSystemId(LegacyProperty $legacy,$fileExistsCallback,$append=null){
        $propertyName = $legacy->code . '-' . $legacy->name ;

        $cleaned = preg_replace('/[^a-z\-_0-9]+/','-',strtolower($propertyName));
        $cleaned = preg_replace('/\-{2,}/','-',$cleaned);
        $cleaned = substr($cleaned,0,256);

        if(strlen($cleaned) == 0){
            throw new Exception("Invalid property name '" . $propertyName . "'. Cleaned to null");
        }

        return $cleaned;
    }

    public function getFileSystemId(){
        return $this->_legacyProperty->code . '-' . 
            preg_replace("|\-{2,}|","-",
                    preg_replace("|[^a-z0-9]+|","-",strtolower($this->_legacyProperty->name))
                )
            ;
    }

    public function getPublicDirectory(){
        return public_path() . '/clients/' . $this->getFileSystemId();
    }

    public function getTemplateName() : string{
        $id = $this->fk_template_id;
        return self::textCache('template_name',function() use($id) {
            return Template::select('name')->where('id',$id)->get()->toArray()[0]['name'];
        });
    }

    public function getLegacyCode() : string {
        return $this->_legacyProperty->code;
    }

    public function getMeta(string $type,$page){
        //TODO: grab specific meta tags for specific pages
        $foo = $this;
        $legacy = $this->getLegacyProperty();
        switch($type){
            case 'description':
                return self::textCache('meta_description',function() use($foo,$legacy,$page){
                    if(strlen($legacy->unit_type) == 0){
                        $unitType = "";
                    }else{
                        $unitType = " " . Util::depluralize($legacy->unit_type) . " ";
                    }
                    return $foo->getLegacyProperty()->name ." Apartments offers" . $unitType .
                    "apartments in ".$legacy->city .", ". $foo->getAbbreviatedState() . "." . 
                    " View floor plans and ".$legacy->city ." apartment information.";
                });
                break;
            case 'keywords':
                return self::textCache('meta_keywords',function() use($foo,$legacy,$page){
                    $keywords = $legacy->city." Apartment Floor Plans, ".$legacy->city." ".$legacy->unit_type.
                        " Apartment, ".$legacy->unit_type." ".$legacy->city.", ". $foo->getState() .
                        " Apartment Floor Plans, ".$legacy->name." Apartments Floor Plans";
                    if(strlen(PropertyTemplate::select('src_3dtour')->where('property_id',$legacy->id)
                        ->get()->first()->toArray()['src_3dtour']) > 0){
                        $keywords .= ", 3D Floor Plans";
                    }
                    return $keywords;
                });
                break;
            default: return null;
        }
    }

    public function getCustomStyleSheets($page){
        return app()->make('App\Property\Clientside\Assets')->getStyleSheets(Site::$instance);
    }

    public function getGoogleAnalytics(){
        $foo = $this;
        $legacyId = Site::$instance->getEntity()->fk_legacy_property_id;
        return self::textCache('google_analytics',function() use($foo,$legacyId){
            return PropertyTemplate::select('tracking_code')
                ->where('property_id',$legacyId)
                ->get()
                ->first()
                ->toArray()['tracking_code'];
        });
    }

    public function getWebPublicDirectory(string $type){
        $base = env('WEB_PUBLIC_BASE');
        switch($type){
            case 'slides':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
            case 'floorplans':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/floorplans";
            case 'features':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/features";
            case 'neighborhood':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/neighborhood";
            case 'popup':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
            case 'logo':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/logo";
            case 'gallery':
                return $base . "uploads/photos";
            case 'img':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
            default: 
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
        }
    }

    public function getSocialMedia(string $type){
        $temp = PropertyTemplate::select('facebook_url')
            ->where('property_id',$this->_legacyProperty->id)
            ->get()->toArray();
        $data = $temp[0]['facebook_url'];
        if(strlen($data) == 0){
            \Debugbar::info("Foobar");
            return null;
        }
        if(preg_match("|<\-multi\->|",$data)){
            $foo = preg_replace("|<\-multi\->|","",$data);
            $parts = explode("\n",$foo);
            for($i=0;$i < count($parts);$i++){
                if(strpos($parts[$i],"~") === false){ continue; }
                list($var,$value) = explode("~",$parts[$i]);
                $$var = $value;
            }

        }
        switch($type){
            case 'fb';
                return $facebook ?? null;
            case 'twitter':
                return $twitter ?? null;
            case 'li':
                return $linkedin ?? null;
            case 'google':
                return $google ?? null;
            case 'yelp':
                return $yelp ?? null;
            case 'insta':
                return $instagram ?? null;
            default:
            return null;
        }
    }

    protected function _preprocessAttributes(&$attr){
        if(isset($attr['_property_group_name'])){
            $group = PropertyGroup::where('group_name',$attr['_property_group_name']['name'])->get()->first();
            if(!($group instanceof PropertyGroup)){
                $group = new PropertyGroup;
                $group->group_name = $attr['_property_group_name']['name'];
                $group->str_identifier = PropertyGroup::generateStrIdentifier($attr['_property_group_name']['name']);
                $group->active_status = 1;
                $group->save();
            }
            $attr['property_group_id'] = $group->id;
            unset($attr['_property_group_name']);
        }
    }

    public function loadLegacyProperty(int $legacyPropertyId = -1){
        if($legacyPropertyId > -1){
            $this->_legacyProperty = LegacyProperty::findOrFail($legacyPropertyId);
            return $this;
        }
        if($this->fk_legacy_property_id){
            $this->_legacyProperty = LegacyProperty::findOrFail($this->fk_legacy_property_id);
            return $this;
        }
        return $this;
    }

    public function getLegacyProperty() : LegacyProperty {
        if($this->_legacyProperty === null){
            //Attempt to load the legacy property
            $this->_legacyProperty = LegacyProperty::findOrFail($this->fk_legacy_property_id);
        }
        return $this->_legacyProperty;
    }

    public function getPhone() : string{
        $foo = $this;
        return self::textCache('phone',function() use($foo) {
            return $this->_legacyProperty->phone;
        });
    }

    public function getStreet() : string{
        $foo = $this;
        return self::textCache('address',function() use($foo) {
            return $foo->_legacyProperty->address;
        });
    }

    public function getCity() : string{
        $foo = $this;
        return self::textCache('city',function() use($foo) {
            return $foo->_legacyProperty->city;
        });
    }

    public function getState() : string{
        $foo = $this;
        return self::textCache('state',function() use($foo) {
            $state = $foo->_legacyProperty->getState();
            return $state;
        });
    }

    public function getAbbreviatedState() : string{
        $foo = $this;
        return self::textCache('abbreviated_state',function() use($foo) {
            $state = $foo->getState();
            $code = State::select('code')->where('name',$state)->get()->first()->toArray();
            if(empty($code)){
                return $state;
            }else{
                return $code['code'];
            }
        });
    }

    public function getZipCode() : string{
        $foo = $this;
        return self::textCache('zip',function() use($foo) {
            return $foo->_legacyProperty->zip;
        });
    }

    public function getHours() : string{
        $foo = $this;
        return self::textCache('hours',function() use($foo) {
            return $foo->_legacyProperty->hours;
        });
    }

    public function getEmail() : string{
        $foo = $this;
        return self::textCache('email',function() use($foo) {
            return $foo->_legacyProperty->email;
        });
    
    }

    public function getTitle() : string{
        $foo = $this;
        return self::textCache('name',function() use($foo) {
            return $foo->_legacyProperty->name;
        });
    }


    public function getWelcomeText(string $section) : string{
        switch($section){
            case 'amenities':
                return "amenities welcome text stub";
            default:
                return "default welcome text stub";
        }
    }

    public function getLatitude(){
        $foo = $this;
        return self::textCache('latitude',function() use($foo){
            $t = PropertyTemplate::select('latitude')->where('property_id',$this->fk_legacy_property_id)->get()->toArray();
            if(isset($t[0]) == false){
                return "";
            }else{
                return $t[0]['latitude'];
            }
        });
    }

    public function getLongitude(){
        $foo = $this;
        return self::textCache('longitude',function() use($foo){
            $t = PropertyTemplate::select('longitude')->where('property_id',$this->fk_legacy_property_id)->get()->toArray();
            if(isset($t[0]) == false){
                return "";
            }else{
                return $t[0]['longitude'];
            }
        });
    }

    protected $_decorateIgnoreText = [
        'google-maps-title'
    ];

    public function decorateGetText($name,$text,$opts = []){
        if(isset($opts['use_double'])){
            $q = "\"";
        }else{
            $q = "'";
        }
        if(ENV('SHOW_DECORATE')){
            if($text === null){ return "<b style={$q}color:green{$q} onclick='edit_tag(\"$name\");'>{!}Empty value: $name{!}</b>"; }
            if(in_array($name,$this->_decorateIgnoreText)){ 
                if(strlen($text) == 0){
                    return "<b style={$q}color:green{$q} onclick='edit_tag(\"$name\")'>{!} Missing value: {$q}$name{$q}</b>";
                }
                return $text . "<b style={$q}color:red{$q} onclick='edit_tag(\"$name\")'>{![$name]}</b>"; 
            }
            return $text . "<b style={$q}color:red;{$q} onclick='edit_tag(\"$name\")'>{![$name]}</b>";
        }else{
            return $text;
        }
    }

    public function getText(string $name,array $opts = []){
        $foo = $this;
        return self::textCache('str_key_' . $name,function() use($foo,$name,$opts) {
            $translatables = [
                'apartment-title' => $foo->getLegacyProperty()->name,
                'home-about' => $foo->getLegacyProperty()->description,
                'join-community-description' => PropertyTemplate::select('community_description')
                    ->where('property_id',$this->fk_legacy_property_id)
                    ->get()
                    ->toArray()[0]['community_description'],
                 'slogan' => 'More than just a place to sleep',     //TODO: dont hard code this
            ];
            if(in_array($name,array_keys($translatables))){
                return $translatables[$name];
            }
            $textTypes = TextType::select(['id'])->where('str_key',$name)->pluck('id')->toArray();
            if(count($textTypes)){
                $a = PropertyText::select('string_value')->where('property_text_type_id',$textTypes[0])->get()->pluck('string_value')->toArray();
                return $this->decorateGetText($name,array_pop($a),$opts);
            }
        });
    }

    public function getFullAddress() : string {
        return trim($this->getStreet()) . " " . 
            trim($this->getCity()) . ", " . 
            trim($this->getState()) . " " . 
            trim($this->getZipCode());
    }

    public function getFullAddressBr() : string {
        return trim($this->getStreet()) . "<br>" . 
            trim($this->getCity()) . ", " . 
            trim($this->getState()) . " " . 
            trim($this->getZipCode());
    }

    public function hasPhotos(){
        return $this->hasMany('App\Property\Photo','property_id','fk_legacy_property_id');
    }

    public function hasText(){
        return $this->hasMany('App\Property\Text','entity_id','id');
    }

    public function hasNeighborhood(){
        return $this->hasMany('App\Property\Neighborhood','property_id','fk_legacy_property_id');
    }

}
