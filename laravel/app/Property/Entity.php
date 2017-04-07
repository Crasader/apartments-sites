<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Interfaces\IFormatter;
use App\Property\Text as PropertyText;
use App\Property\Text\Type as TextType;
use App\Property\Site;
use App\Traits\Features as FeaturesTrait;

class Entity extends Model
{
    use FeaturesTrait;
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
        return $this->_legacyProperty->phone;
    }

    public function getStreet() : string{
        return $this->_legacyProperty->address;
    }

    public function getCity() : string{
        return $this->_legacyProperty->city;
    }

    public function getState() : string{
        return $this->_legacyProperty->getState();
    }

    public function getZipCode() : string{
        return $this->_legacyProperty->zip;
    }

    public function getHours() : string{
        return $this->_legacyProperty->hours;
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
        return "36.0000";
    }

    public function getLongitude(){
        return "500.0000";
    }

    public function getText(string $name,string $default = null) : string{
        //TODO: !optimization Cache values in memory !cache
        $textTypes = TextType::where('str_key',$name)->get();
        if($textTypes->count()){
            return $textTypes[0]->hasText[0]->string_value;
        }
        return $default;
    }

    public function getFullAddress() : string {
        return $this->getStreet() . " " . $this->getCity() . ", " . $this->getState() . " " . $this->getZipCode();
    }

    public function getFullAddressBr() : string {
        return $this->getStreet() . "<br>" . $this->getCity() . ", " . $this->getState() . " " . $this->getZipCode();
    }

    public function hasPhotos(){
        return $this->hasMany('App\Property\Photo','property_id','fk_legacy_property_id');
    }

    public function hasText(){
        return $this->hasMany('App\Property\Text','entity_id','id');
    }
}
