<?php
namespace App\Structures;

use Validator;
use App\Traits\AttributeValidator;
use App\Traits\Constants;

class Mail
{
    use AttributeValidator;
    const VALIDATE_OKAY = Constants::VALIDATE_OKAY;
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
