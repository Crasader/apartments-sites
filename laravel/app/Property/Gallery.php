<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseException; 
use App\Property\Photo;
use App\Property\Photo\Type as PhotoType;

class Gallery extends Model
{
    //
    const SORT_TYPE_SPARSE = 'sparse';
    protected $_filters = ['gallery','main'];
    protected $_filterBy = null;
    protected $_sortType = null;
    protected $_photoInstance = null;
    protected $_fetchedItems = [];
    protected $_cachedPhotoTypes = [];


    public function __construct(){
        $this->_filterBy = 'gallery';
        $this->_sortType = self::SORT_TYPE_SPARSE;
        $this->_photoInstance = app()->make('App\Property\Photo');
    }

    public function getAllowedFilters(){
        return $this->_filteres;
    }

    public function setFilters(array $filters,$fetch = true){
        $this->_filterBy = $filters;
        if(!$fetch){ return; }
        foreach($this->_filterBy as $index => $type){
            $this->_fetchedItems[$type] = $this->fetchItems($type);
        }
    }

    public function getPhotoTypeId($type){
        if(isset($this->_cachedPhotoTypes[$type])){
            return $this->_cachedPhotoTypes[$type];
        }else{
            $this->_cachedPhotoTypes[$type] = PhotoType::where('name',$type)->get()->first()->id;
            return $this->_cachedPhotoTypes[$type];
        }
    }

    public function loadItems(array $items){
        //TODO: check if there items are already loaded into _fetchedItems. If they are, skip loading them !optimization
        foreach($items as $index => $itemName){
            $this->_fetchedItems[$itemName] = $this->fetchItems($itemName);
        }
    }

    public function fetchItems(string $type){
        //!optimization cache fetched items
        $legacyPropertyId = Site::$instance->getEntity()->getLegacyProperty()->id;
        return Photo::where(
            [
                'property_id' => $legacyPropertyId,
                'photo_type_id' => $this->getPhotoTypeId($type)
            ]
        )->get();
    }
}
