<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;

class Entity extends Model
{
    protected $table = 'property_entity';
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
}
