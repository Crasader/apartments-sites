<?php

namespace App\Util;
use App\Interfaces\IFormatter;
use App\Interfaces\IFormatterType;

class Formatter implements IFormatter
{
    protected $_formatterType = null;
    protected $_lineItems = [];
    protected $_class = null;
    protected $_dashed = true;
    public function __construct($type){
        $this->_formatterType = $type;
    }

    /*
     * Interface function 
     */
    public function setLineItems(array $items){
        $this->_lineItems = [];
        /* I'm manually looping and creating numeric indexes because we don't want
        the user to set their own array keys, because that would compromise the integrity
        of our array
        */
        $top = count($items);
        for($i=0;$i < $top;$i++){
            $this->_lineItems[$i] = array_shift($items);
        }
    }

    //TODO !refactor Create a trait that allows for storing of preferences for a class.. i.e.: lets store a preference for adding a "-" after an opening li tag
    public function setDashed(bool $d){
        $this->_dashed = $d;
        return $this;
    }

    public function setClass(string $class){
        $this->_class = $class;
        return $this;
    }

    public function addLineItem($item){
        array_push($this->_lineItems($item));
    } 

    /*
     * Interface function
     */
    public function getFormattedLineItem(int $index){
        if(isset($this->_lineItems[$index])){
            return $this->_lineItems[$index];
        }
        throw new Exception("getFormattedLineItem: Invalid index");
        return $this->_fetchLineItem($this->_lineItems[$index]);
    }

    public function getFormattedAsArray(){
        $ret = [];
        foreach($this->_lineItems as $key => $value){
            $ret[] = $this->_fetchLineItem($value);
        }
        return $ret;
    }

    /*
     * Interface function
     */
    public function getFormattedLineItemAll(){
        $buffer = '';
        foreach($this->_lineItems as $key => $value){
            $buffer .= $this->_fetchLineItem($value);
        }
        return $buffer;
    }

    public function getFormattedLineItemCount(){
        return count($this->_lineItems);
    }

    protected function _fetchLineItem($item){
        switch($this->_formatterType){
            case 'li':
                $html = '<li'; 
                if($this->_class)
                    $html .= " class='{$this->_class}'";
                $html .= '>';
                if($this->_dashed)
                    $html .= '- ';
                $html .= $item . '</li>';
                return $html;
            default: 
                return $item;
         }
    }
}
