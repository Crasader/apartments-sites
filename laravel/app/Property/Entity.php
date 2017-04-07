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
        $this->createClientDir();
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

    public function getWebPublicDirectory(){
        return url('/clients/' . $this->getFileSystemId());
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
            return "36.000";
        });
    }

    public function getLongitude(){
        $foo = $this;
        return self::textCache('longitude',function() use($foo){
            return "5000.000";
        });
    }

    public function getText(string $name,string $default = null){
        $foo = $this;
        return self::textCache('str_key_' . $name,function() use($foo,$name) {
            $translatables = [
                'apartment-title' => $foo->getLegacyProperty()->name,
                'home-about' => $foo->getLegacyProperty()->description
            ];
            if(in_array($name,array_keys($translatables))){
                return $translatables[$name];
            }
            $textTypes = TextType::select(['id'])->where('str_key',$name)->pluck('id')->toArray();
            if(count($textTypes)){
                $a = PropertyText::select('string_value')->where('property_text_type_id',$textTypes[0])->get()->pluck('string_value')->toArray();
                \Debugbar::info("Fetched: $name: " . var_export($a,1));
                return array_pop($a);
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
