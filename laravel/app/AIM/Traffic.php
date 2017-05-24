<?php

namespace App\AIM;

use Illuminate\Database\Eloquent\Model;
use App\Assets\SoapClient;
use App\Util\Util;

class Traffic extends Model
{
    //
    protected $connection = 'sqlsrv';
    protected $_actionsMap = [
        'schedule-a-tour' => 'Schedule a Tour',
        'apply-online' => 'Application - Apply Online',
        'briefContact' => 'Reserve Your New Home - Home Page',
        'contact' => 'Contact',

    ];


    public function __construct()
    {
        DatabaseChanger::changeDb('database.connections.dynamic');
        $this->connection = 'dynamic';
    }

    /*
     * @param firstName string first name
     * @param lastName string last name
     * @param email string email
     * @param phone string phone
     * @param moveindate string move in date
     * @param visitdate string visit date
     * @param unitNumber string
     * @param unitType string unit type
     * @param actionRequested string 
     * @param visitTime string 
     */
    public function insertTraffic(string $firstName,string $lastName,string $email,string $phone,
        string $moveinDate,string $visitDate,string $unitNumber,string $unitType,
        string $actionRequested,string $visitTime)
    {
        date_default_timezone_set('America/Denver');
        $propertyCode = app()->make('App\Property\Site')->getEntity()->getLegacyProperty()->code;
        $tempPhone = preg_replace("|[^0-9]+|","",$phone);
        $phone = "(" . substr($tempPhone,0,3) . ") " . substr($tempPhone,3,3) . "-" . substr($tempPhone,6);
        $ipAddress = Util::remoteIp('127.0.0.1');
        if($visitTime){
            $visitDate = date("Y-m-d",strtotime($visitDate));
            $visitDate .= " " . date("H:i:s",strtotime($visitTime));
        }else{
            $visitDate = date("Y-m-d H:i:s",strtotime($visitDate));
        }
        $moveinDate = date("Y-m-d H:i:s",strtotime($moveinDate));
        try {
        \DB::connection($this->connection)->insert(
            "insert into marketapts.dbo.traffic (propertyCode,firstname,lastname,email,phone, " .
            " moveindate,visitdate,unitnumber,unittype,ActionRequested, " . 
            " insertDate, ipAddress) " . 
            " VALUES(" .
            " :propertyCode, " . //property code
            " :firstName, " . // Firstname
            " :lastName, " . //lastname
            " :email, " . //email
            " :phone, " . //phone
            " :moveinDate, " . //moveindate
            " :visitDate, " . //visitdate
            " :unitNumber, " . //unitnumber
            " :unitType, " . //unittype
            " :actionRequested, " . //ActionRequested
            " :insertDate, " . //insertDate
            " :ipAddress) "  //ipaddress
            ,
            [
		        'propertyCode' => $propertyCode,	
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'phone' => $phone,
                'moveinDate' => $moveinDate,
                'visitDate' => $visitDate,
                'unitNumber' => $unitNumber,
                'unitType' => $unitType,
                'actionRequested' => $this->_actionsMap[$actionRequested],
                'insertDate' => date("M d Y h:iA",time()),
                'ipAddress' => $ipAddress
            ]
        );
        }catch(\Exception $e){
            throw $e;
        }
        $data_query = new \StdClass();
        $data_query->sysPassword = 'g3tm3s0m3pr0ps';
        $data_query->sPropertyCode = $propertyCode;

        $data_query->FirstName = $firstName;

        $data_query->MiddleName = "";

        $data_query->LastName = $lastName;

        $data_query->Address1 = "";

        $data_query->City = "";

        $data_query->State = "";

        $data_query->ZipCode = "";

        $data_query->HomePhone = $phone;

        $data_query->WorkPhone = "";

        $data_query->CellPhone = "";

        $data_query->EmailAddress = $email;

        $data_query->Notes = "";

        $data_query->UnitNumber = $unitNumber;

        $data_query->UnitType = $unitType;

        $data_query->PriceRange = "";

        $data_query->PetType = "";

        $data_query->PetBreed = "";

        $data_query->PetWeight = "";

        $data_query->LeaseTerm = "";

        $data_query->NumOccupants = "";
     
        try {
            $client = (new SoapClient())->loadClient()['soap'];
            $soapResult = $client->InsertTraffic($data_query);
            return $soapResult;
        }catch(\Excception $e){
            throw $e;
        }
        return null;
    }
}
