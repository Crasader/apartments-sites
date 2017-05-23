<?php namespace App\Util\Html\Input;

class Base {
    protected $_tag;
    protected $_attributes = [];
    protected $_needsClosingTag = [
        //TODO: finish this. Create a list of html tags that need closing tags
    ];

    public function __construct(string $tagName){
        $this->_tag = $tagName;
    }

    public function attr(array $attributes,bool $render = true){
        $this->_attributes = $attributes;
        if($render){
            return $this->render();
        }
        return $this;
    }

    public function needsClosingTag(string $tag){
        return in_array($tag,$this->_needsClosingTag);
    }

    public function render(){
        $html = "<" . $this->_tag;
        foreach($this->_attributes as $attr => $value){
            $html .= " $attr=\"$value\"";
        }
        if(isset($this->_requiredAttributes)){
            foreach($this->_requiredAttributes as $attr => $value){
                $html .= " $attr=\"$value\"";
            }
        }
        $html .= ">"; 
        if($this->needsClosingTag($this->_tag)){
            $html .= "</" . $this->_tag . ">";
        }
        return $html;
    }
}
