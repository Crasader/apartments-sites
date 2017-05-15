<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use App\Util\CollectionHelpers;

class Email extends Model
{

    use SoftDeletes;
    protected $table = 'emails';
    public $timestamps = true;
    public static $emailTypes = ['to', 'from', 'cc', 'bcc'];
    protected $categorizedEmailAddresses = null;
    //
    public static function boot(){
        parent::boot();
        static::saved(function($email){
            self::updateEmailAddresses($email);
        });
    }
    protected static function updateEmailAddresses($email){
        foreach(self::$emailTypes as $emailType){
            $emailAddressesCollection = $email->getAddressesByType($emailType);
            $emailAddressIds = [];
            if(CollectionHelpers::isIterable($emailAddressesCollection)){
                foreach($emailAddressesCollection as $emailAddress){
                    $emailAddress = EmailAddress::firstOrCreate(['value' => $emailAddress]);
                    $emailAddressIds[] = $emailAddress->id;
                }
            }
            $email->emailAddresses()->attach($emailAddressIds, ['address_type' => $emailType]);
        }
    }
    public function emailAddresses()
    {
        return $this->belongsToMany('App\EmailAddress')
            ->withPivot('address_type');
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
        return $this->getAddressesByType('from');
    }
    public function getCcAttribute(){
        return $this->getAddressesByType('cc');
    }
    public function getBccAttribute(){
        return $this->getAddressesByType('bcc');
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
