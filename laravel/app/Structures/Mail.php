<?php
namespace App\Structures;

use Validator;

class Mail
{
    use App\Traits\MemberValidator;
    public $to = null;
    public $subject = null;
    public $htmlBody = null;
    public $from = null;
    public $cc = null;
    protected $rules = [
      'to' => 'arrayable|email',
      'from' => 'arrayable|email',
      'htmlBody' => 'string|nullable',
      'cc' => 'string',
      'subject' => 'string|nullable',
    ];
    const VALIDATE_OKAY = "validate_okay";
    public $errors = null;

    public function validate($attribute, $rules)
    {
        $rules = ['item' => $rules];
        $items = object_get($this, $attribute);
        if (!is_array($items)) {
            $items = [ $items ];
        }
        foreach ($items as $item) {
            $rulesArray = explode('|', $rules[$item]);
            //custom arrayable rule
            if (in_array('arrayable', $rulesArray)) {
                $index = array_search('arrayble', $rulesArray);
                unset($rulesArray[$index]);
                $rules = implode('|', $rulesArray);
            } else {
                if (is_array($this->{$item})) {
                    $this->errors = ["{$item} can not be an array"];
                    return false;
                }
            }
            $validator = Validator::make(['item'=>$this->$item], $rules);
            if ($validator->fails()) {
                $this->errors = $validator->get('item');
                return false;
            }
        }
    }
    public function validateMemberVariables()
    {
        foreach ($rules as $name => $rule) {
            if (!$this->validate($name, $rules)) {
                return false;
            }
        }
        return self::VALIDATE_OKAY;
    }
}
