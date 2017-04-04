<?php

namespace App\Assets;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\IDataFetcher;
use App\Traits\HasData;

class SoapClient extends Model implements IDataFetcher
{
    use HasData;

    //
    public function loadResource($reqClass,$extraData){
        if($reqClass == 'App\Property\Specials'){
            $data_query = new \StdClass();
            $data_query->sysPassword = $this->traitGet('sysPassword');//'g3tm3s0m3pr0ps';
            $data_query->username = $this->traitGet('username');//$email;
            $data_query->password = $this->traitGet('password');//$password;

            $URL = $this->traitGet('url');//"http://192.168.1.135:8088/mapts_com.asmx?WSDL";
            try {
                $client = new \SoapClient($URL,array('trace' => 1));

                $soapResult = $client->ValidateUserLogin($data_query);
                $arrResult = explode('|',$soapResult->ValidateUserLoginResult);
            } catch(\SoapFault $e){
                //var_dump($e);
            }
        }
    }

}


