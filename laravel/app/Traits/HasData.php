<?php
namespace App\Traits;

trait HasData {
    protected $_trait_hasData = [];

    public function traitHas($key){
        return in_array($key,array_keys($this->_trait_hasData));
    }

    public function traitGet($data){
        
        if(isset($this->_trait_hasData[$data])){
            var_dump($this->_trait_hasData[$data]);
            return $this->_trait_hasData[$data];
        }
        return null;
    }

    public function traitSet($key,$value){
        $this->_trait_hasData[$key] = $value;
    }

}
