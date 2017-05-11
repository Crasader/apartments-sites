<?php

namespace App\Traits;

use App\Structures\Mail as StructMail;
use App\Traits\Constants;

trait AttributeValidator{
  /**
    * example rules, uses laravel validation rules.
    * item is the name of the attribute.
    * rules is laravel rules
    **/
  protected $rules = [
    'item' => 'rules',
    'item2' => 'rules2'
  ];
    public $validate_okay = 1;
    public $validate_errors_encountered = 0;
    public $errors = null;

    public function validate($attribute, $rules)
    {
        $items = object_get($this, $attribute);
        $rulesArray = explode('|', $rules);
        //if is not arrayable, return false
        if (in_array('arrayable', $rulesArray)) {
            $index = array_search('arrayable', $rulesArray);
            unset($rulesArray[$index]);
            $rules = implode('|', $rulesArray);
        } else {
            if (is_array($this->{$item})) {
                $this->errors = ["{$item} can not be an array"];
                return false;
            }
        }
        //if isn't array, make array to forloop it
        if (!is_array($items)) {
            $items = [ $items ];
        }
        foreach ($items as $item) {
            $validator = Validator::make(['item'=>$item], ['item'=>$rules]);
            if ($validator->fails()) {
                $this->errors = $validator->errors()->get('item');
                return false;
            }
        }
    }
    public function validateMemberVariables()
    {
        foreach ($this->rules as $name => $rules) {
            if (!$this->validate($name, $rules)) {
                return Constants::VALIDATE_ERRORS_ENCOUNTERED;
            }
        }
        return Constants::VALIDATE_OKAY;
    }
}
