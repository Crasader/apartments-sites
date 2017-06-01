<?php

namespace App\Assets;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\IDataFetcher;
use App\Traits\HasData;
use App\Exceptions\BaseException;
use App\Property\Site;
use App\Exceptions\LogicException;
use App\Util\Util as Utility;
use App\Mock;

class SoapClient implements IDataFetcher
{
    use HasData;

    //
    public function loadResource($reqClass, $extraData)
    {
        if ($reqClass == 'App\Property\Specials') {
            $data_query = new \StdClass();
            $data_query->sysPassword = $this->traitGet('sysPassword');//'g3tm3s0m3pr0ps';
            $data_query->username = $this->traitGet('username');//$email;
            $data_query->password = $this->traitGet('password');//$password;

            $URL = $this->traitGet('url');//"http://192.168.1.135:8088/mapts_com.asmx?WSDL";
            try {
                $client = new \SoapClient($URL, array('trace' => 1));

                $soapResult = $client->ValidateUserLogin($data_query);
                $arrResult = explode('|', $soapResult->ValidateUserLoginResult);
            } catch (\SoapFault $e) {
                //var_dump($e);
            }
        }
    }
    public function loadClient($url = null)
    {
        $data_query = new \StdClass();
        $data_query->sysPassword = 'g3tm3s0m3pr0ps';

        if ($url === null) {
            $URL = "http://" . env("SOAP_CLIENT_HOST") . ":" . env("SOAP_CLIENT_PORT") . "/mapts_com.asmx?WSDL";
        } else {
            $URL = $url;
        }
        $arrResult = [];
        return ['soap'=> new \SoapClient($URL, array('trace' => 1)),
            'obj' => $data_query
        ];
    }

    public function resetPassword(array $postData, string $userId)
    {
        $res = $this->loadClient('https://amcrentpay.com/ws/mapts.asmx?WSDL');
        $data_query = $res['obj'];
        $client = $res['soap'];
        $data_query->PropertyCode = Site::$instance->getEntity()->getLegacyProperty()->code;
        $data_query->sPayUserID = $userId;

        if (Utility::isDev()) {
            return [ 'status' => 'okay', 'userId' => $userId, 'newPass' => 'password1234' ];
        }
        try {
            $soapResult = $client->ResetUser($data_query);
            $arrResult = $soapResult->ResetUserResult;
            if ($soapResult->ResetUserResult == "Error User Not Found") {
                return ['status' => 'error',
                    'msg' => 'User not found',
                ];
            }
            $parts = explode("|", $arrResult);
            //TODO: Make these return values consistent
            return [
                'status' => 'okay',
                'userId' => $parts[0],
                'newPass' => $parts[2]
            ];
        } catch (Exception $e) {
            throw new BaseException($e);
        }
        throw new LogicException("Code reached unexpected point (resetPassword)");
    }


    public function maintenanceRequest(array $postData)
    {
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

        if (Utility::isDev()) {
            return [ 'Status' => 'SUCCESS', 'WorkOrderNumber' => '1234TEST4321' ];
        }

        try {
            $soapResult = $client->InsertWorkOrder($data_query);
            $arrResult = $soapResult->InsertWorkOrderResult;
            if (preg_match("|<Error ErrorDescription=\"([^\"]+)\"|", $arrResult, $matches)) {
                throw new BaseException($matches);
            }

            if (preg_match("|<WorkOrder WorkOrderNumber=\"([0-9]+)\" Status=\"([^\"]+)\"/>|", $arrResult, $matches)) {
                return [
                    'WorkOrderNumber' => $matches[1],
                    'Status' => $matches[2]
                ];
            } else {
                return [
                    'Status' => 'error',
                    'data' => $arrResult
                    ];
            }
        } catch (SoapFault $e) {
            return ['Status' => 'error',
                'data' => $e->getMessage(),
                'exception' => true
            ];
        }
        \Debugbar::info($arrResult);
    }

    public function residentPortal($email, $password)
    {
        $res = $this->loadClient();
        $data_query = $res['obj'];
        $client = $res['soap'];
        $data_query->username = $email;
        $data_query->password = $password;

        try {
            $soapResult = $client->ValidateUserLogin($data_query);
            $arrResult = explode('|', $soapResult->ValidateUserLoginResult);
        } catch (SoapFault $e) {
            throw new BaseExcveption($e);
        }
        \Debugbar::info(compact('arrResult'));
        return $arrResult;
    }

    public function findUser($propertyCode, $email, $unit)
    {
        $res = $this->loadClient("https://amcrentpay.com/ws/mapts.asmx?WSDL");
        $data_query = $res['obj'];
        $client = $res['soap'];
        if (Mock::get(Mock::PROPERTY_CODE) !== null) {
            $propertyCode = Mock::get(Mock::PROPERTY_CODE);
        }
        $data_query->PropertyCode = $propertyCode;
        $data_query->EmailAddress = $email;
        $data_query->UnitNumber = $unit;

        try {
            $soapResult = $client->FindUserID($data_query);
            $arrResult = $soapResult->FindUserIDResult;
            if (empty($arrResult)) {
                return [
                    'status' => 'error',
                    'data' => 'No response given'
                ];
            } else {
                return [
                    'status' => 'okay',
                    'data' => $arrResult
                ];
            }
        } catch (Exception $e) {
            throw new BaseException($e);
        }
        throw new LogicException("Code reached unexpected point (findUser)");
    }
}
