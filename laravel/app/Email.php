<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;
use App\Mail\DefaultEmail;
use App\Traits\EmailAddressable;

use App\Util\CollectionHelpers;

class Email extends Model
{
    use SoftDeletes;
    use EmailAddressable;
    protected $table = 'emails';
    public $timestamps = true;
    public $emailTypes = ['to', 'from', 'cc', 'bcc'];
    //
    public static function boot(){
        parent::boot();
        static::saved(function($email){
            $email->updateEmailAddresses();
        });
    }
    public function addQueue(){
        return(dispatch(new SendEmail($this)));
    }
    public function send(){
        return Mail::send(new DefaultEmail($this));
    }
    public function getToAttribute(){
        return $this->getAddressesByType('to');
    }
    public function getFromAttribute(){
        return $this->getAddressesByType('from');
    }
    public function getCcAttribute(){
        return $this->getAddressesByType('cc');
    }
    public function getBccAttribute(){
        return $this->getAddressesByType('bcc');
    }
    public function setToAttribute($value){
        return $this->setEmailByType('to', $value);
    }
    public function setFromAttribute($value){
        return $this->setEmailByType('from', $value);
    }
    public function setCcAttribute($value){
        return $this->setEmailByType('cc', $value);
    }
    public function setBccAttribute($value){
        return $this->setEmailByType('bcc', $value);
    }
}
