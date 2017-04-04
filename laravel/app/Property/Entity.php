<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Interfaces\IFormatter;

class Entity extends Model
{
    protected $table = 'property_entity';
    protected $_legacyProperty = null;
    protected $_featuresFormatter = null;
    protected $_featuresSectionNames = ['apartment','community','other'];
    protected $_features = [];

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

    public function setFeaturesFormatter(IFormatter $if){
        $this->_featuresFormatter = $if;
    }

    public function setFeaturesChunkCount(int $count){
        $this->_featuresChunkCount = $count;
    }

    public function getFeaturesChunk(string $section,int $chunkOffset) : string{
        $chunkSize = (int)floor(count($this->_features[$section]) / $this->_featuresChunkCount);
        $this->_featuresFormatter->setLineItems($this->_features[$section]);
        return implode('', array_chunk($this->_featuresFormatter->getFormattedAsArray(),$chunkSize)[$chunkOffset]);
    }

    public function loadAllFeatures(){
        $this->_features = [];
        foreach($this->_featuresSectionNames as $index => $value){
            $this->_features[$value] = $this->_getFeaturesSection($value);
        }
        return $this;
    }

    protected function _getFeaturesSection(string $section){
        switch($section){
            case 'community':
                //TODO: grab community features
                return array_fill(0,10,'community_foobar');
                break;
            case 'other':
                //TODO: grab other features
                return array_fill(0,10,'other_foobar');
                break;
            case 'apartment':
                //TODO: grab apartment features
                return [1,2,3,4,5,6,7,8,9,10];
                break;
            default:
                return null;
        }
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

    public function getFullAddress() : string {
        return $this->getStreet() . " " . $this->getCity() . ", " . $this->getState() . " " . $this->getZipCode();
    }

    public function getFullAddressBr() : string {
        return $this->getStreet() . "<br>" . $this->getCity() . ", " . $this->getState() . " " . $this->getZipCode();
    }

}
