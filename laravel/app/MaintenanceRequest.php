<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use App\Traits\S3Media;
use App\System\Session as Sesh;

class MaintenanceRequest extends Model implements HasMedia
{
    use HasMediaTrait;
    use S3Media;
    public function getS3Path(){
        $sessionInfo = explode('|', Sesh::get(Sesh::RESIDENT_USER_KEY));
        $sessionInfo = json_decode($sessionInfo[1]);
        $residentId = $sessionInfo[2];
        $rtn = [
            'file-uploads',
            $this->property_code,
            $residentId,
            'maintenance-requests',
            $this->work_order_number
        ];
        return implode('/', $rtn);
    }
    public function processSoapResponse($response){

        $this->status = array_get($response, 'Status');
        $this->work_order_number = array_get($response, 'WorkOrderNumber');
        $this->save();
        $this->sendMediaToS3();
    }
}
