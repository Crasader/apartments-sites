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

    public function getPathToImage(string $image) :string{
        return Site::$instance->getEntity()->getWebPublicDirectory('gallery') . '/' . $image;
    }

    public function decorate(string $itemName,array $items) : array{
        $ret = [];
        foreach($items as $index => $itemObject){
            $itemObject['_itemName_'] = $itemName;
            $itemObject['image'] = $this->getPathToImage($itemObject['image']);
            $ret[] = $itemObject;
        }
        return $ret;
    }

    public function loadItems(array $items){
        //TODO: check if there items are already loaded into _fetchedItems. If they are, skip loading them !optimization !optimization !cache
        foreach($items as $index => $itemName){
            $this->_fetchedItems[$itemName] = $this->decorate($itemName,$this->fetchItems($itemName));
        }
    }

    public function fetchItems(string $type){
        //TODO: !optimization cache fetched items
        $legacyPropertyId = Site::$instance->getEntity()->getLegacyProperty()->id;
        return Photo::where(
            [
                'property_id' => $legacyPropertyId,
                'photo_type_id' => $this->getPhotoTypeId($type)
            ]
        )->orderBy('display_order','desc')->get()->toArray();
    }

    public function fetchSortedItems(string $sortType) : array {
        $sorted = [];
        $count = 0;
        foreach(array_keys($this->_fetchedItems) as $names){
            $count += count($this->_fetchedItems[$names]);
        }
        $temp = $this->_fetchedItems;
        while($count > 0){
            foreach(array_keys($temp) as $names){
                if(count($temp[$names])){
                    $sorted[] = array_pop($temp[$names]);
                    $count -= 1;
                }
            }
        }
        unset($temp);
        return $sorted;
    }
}
