<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;
use App\Mail\DefaultEmail;

use App\Util\CollectionHelpers;

class Email extends Model
{

    use SoftDeletes;
    protected $table = 'emails';
    public $timestamps = true;
    public $privateFromName;
    public static $emailTypes = ['to', 'from', 'cc', 'bcc'];
    protected $categorizedEmailAddresses = null;
    //
    public static function boot(){
        parent::boot();
        static::saved(function($email){
            self::updateEmailAddresses($email);
        });
    }
    public function addQueue(){
        return(dispatch(new SendEmail($this)));
    }
    public function send(){

        print("sending email");
        $rtn = Mail::send(new DefaultEmail($this));
    }
    protected static function updateEmailAddresses($email){
        foreach(self::$emailTypes as $emailType){
            $emailAddressesCollection = $email->getAddressesByType($emailType);
            $emailAddressIds = [];
            if(CollectionHelpers::isIterable($emailAddressesCollection)){
                if($emailType == 'from'){
                    // die(print_r($emailAddressesCollection));
                }
                foreach($emailAddressesCollection as $emailAddress){

                    $emailAddress = EmailAddress::firstOrCreate(['value' => $emailAddress]);
                    if($emailType == 'from'){
                        $email->emailAddresses()->attach($emailAddress->id, ['address_type' => $emailType, 'name' => $email->privateFromName]);
                        continue;
                    }
                    $emailAddressIds[] = $emailAddress->id;
                }
            }
            $email->emailAddresses()->attach($emailAddressIds, ['address_type' => $emailType]);
        }
    }
    public function emailAddresses()
    {
        return $this->belongsToMany('App\EmailAddress')
            ->withPivot('address_type', 'name');
    }
    public function getAddressesByType($addressType)
    {
        if (null === $this->categorizedEmailAddresses) {
            $this->categorizeEmailAddresses();
        }
        return array_get($this->categorizedEmailAddresses,$addressType);
    }
    public function categorizeEmailAddresses()
    {
        $emailAddressesCollection = new Collection;
        foreach ($this->emailAddresses as $emailAddress) {
            $address_type = $emailAddress->pivot->address_type;
            if($address_type == 'from'){
                $this->privateFromName = $emailAddress->pivot->name;
            }
            if (!$emailAddressesCollection->get($address_type)) {
                $emailAddressesCollection[$address_type] = new Collection;
            }
            $emailAddressesCollection[$address_type][] = $emailAddress->value;
        }
        $this->categorizedEmailAddresses = $emailAddressesCollection;
    }
    public function getToAttribute(){
        return $this->getAddressesByType('to');
    }
    public function getFromAttribute(){
        return array_get($this->getAddressesByType('from'), 0);
    }
    public function getCcAttribute(){
        return $this->getAddressesByType('cc');
    }
    public function getBccAttribute(){
        return $this->getAddressesByType('bcc');
    }
    public function getFromNameAttribute(){
        if(!$this->privateFromName){
            $this->categorizeEmailAddresses();
        }
        return $this->privateFromName;
    }
    public function setFromNameAttribute($value){

        $this->privateFromName = $value;
    }
    public function setToAttribute($value){
        return $this->categorizedEmailAddresses['to'] = CollectionHelpers::returnAsCollection($value);
    }
    public function setFromAttribute($value){
        return $this->categorizedEmailAddresses['from'] = CollectionHelpers::returnAsCollection($value);
    }
    public function setCcAttribute($value){
        return $this->categorizedEmailAddresses['cc'] = CollectionHelpers::returnAsCollection($value);
    }
    public function setBccAttribute($value){
        return $this->categorizedEmailAddresses['bcc'] = CollectionHelpers::returnAsCollection($value);
    }
}
