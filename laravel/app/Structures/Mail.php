<?php
namespace App\Structures;

use Validator;
use App\Traits\AttributeValidator;

class Mail
{
    use AttributeValidator;
    public $to = null;
    public $subject = null;
    public $htmlBody = null;
    public $from = null;
    public $cc = null;
    public $rules = [
      'to' => 'arrayable|email',
      'from' => 'arrayable|email',
      'htmlBody' => 'string|nullable',
      'htmlText' => 'string|nullable',
      'cc' => 'arrayable|email|nullable',
      'subject' => 'string|nullable',
    ];

}
