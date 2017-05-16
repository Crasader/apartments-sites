<?php
namespace App\Traits;

use App\Util\CollectionHelpers;

trait EmailAddressable{

    // emailTypes required;
    // eg: public $emailTypes = ['to','from','cc','bcc'];
    // insert boot
    /*
    *public static function boot(){
    *    parent::boot();
    *    static::saved(function($email){
    *        $email->updateEmailAddresses();
    *    });
    *}
    */
    protected $categorizedEmailAddresses = null;
    protected function updateEmailAddresses(){
        foreach($this->emailTypes as $emailType){
            $emailAddressesCollection = $this->getAddressesByType($emailType);
            $emailAddressIds = [];
            if(CollectionHelpers::isIterable($emailAddressesCollection)){
                foreach($emailAddressesCollection as $emailAddress){
                    $emailAddress = EmailAddress::firstOrCreate(['value' => $emailAddress]);
                    $emailAddressIds[] = $emailAddress->id;
                }
            }
            $this->emailAddresses()->attach($emailAddressIds, ['address_type' => $emailType]);
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
    public function getFirstAddressByType($addressType){
      return array_get($this->getAddressesByType($addressType), 0, null);
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
    public function setEmailByType($type, $value){
        return $this->categorizedEmailAddresses[$to] = CollectionHelpers::returnAsCollection($value);
    }

}
