<?php

namespace App\Assets;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\IDataFetcher;
use App\Traits\HasData;
use App\Exceptions\BaseException;
use App\Property\Site;

class SoapClient implements IDataFetcher
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
    public function loadClient(){
		$data_query = new \StdClass();
		$data_query->sysPassword = 'g3tm3s0m3pr0ps';

		$URL = "http://192.168.1.135:8088/mapts_com.asmx?WSDL";
        $arrResult = [];
        return ['soap'=> new \SoapClient($URL,array('trace' => 1)),
            'obj' => $data_query
        ];
    }

    public function maintenanceRequest(array $postData){
        $res = $this->loadClient();
        $data_query = $res['obj'];
        $client = $res['soap'];
		$data_query->sPropertyCode = Site::$instance->getEntity()->getLegacyProperty()->code;
		$data_query->Unit = $postData['maintenance_unit'];
        $data_query->WorkOrderCategory = $postData['maintenance_mtype'];
        $data_query->Description = $postData['maintenance_mrequest'];
        $data_query->Phone = $postData['maintenance_phone'];
        $data_query->PermissionToEnterGivenBy = $postData['maintenance_name'];
        $data_query->PermissionToEnterData = $postData['PermissionToEnterDate'];

		try {
			$soapResult = $client->InsertWorkOrder($data_query);
			$arrResult = $soapResult->InsertWorkOrderResult;
            if(preg_match("|<Error ErrorDescription=\"([^\"]+)\"|",$arrResult,$matches)){
                throw new BaseException($matches);
            }
            
            if(preg_match("|<WorkOrder WorkOrderNumber=\"([0-9]+)\" Status=\"([^\"]+)\"/>|",$arrResult,$matches)){
                return [
                    'WorkOrderNumber' => $matches[1],
                    'Status' => $matches[2]
                ];
            }else{
                return [
                    'Status' => null,
                    'data' => $arrResult
                    ];
            }
		} catch(SoapFault $e){
            die($e->getMessage());
		}
        \Debugbar::info($arrResult);
    }

    public function residentPortal($email,$password){
        $res = $this->loadClient();
        $data_query = $res['obj'];
        $client = $res['soap'];
		$data_query->username = $email;
		$data_query->password = $password;

		try {
			$soapResult = $client->ValidateUserLogin($data_query);
			$arrResult = explode('|',$soapResult->ValidateUserLoginResult);
		} catch(SoapFault $e){
			throw new BaseExcveption($e);
		}
        \Debugbar::info($arrResult);
	    return $arrResult;
    }

}


