<?php

namespace App\Reviews;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property;
use App\Property\Entity;
use App\Util\Util;

class Place extends Model
{
    const NO_PLACE_ID = '--no-place-id--';
    //
    protected $table = 'review_place';
    protected $fillable = [
        'place_type',
        ];

    public function loadByLegacyProperty(Property $prop, $type)
    {
        return self::where(
            ['fk_legacy_property_id' => $prop->id],
            ['place_type' => $type])->get();
    }

    public function loadByEntity(Entity $en, $type)
    {
        return $this->loadByLegacyProperty($en->getLegacyProperty(), $type);
    }

    public function loadBySite($s, $type)
    {
        if ($s === null) {
            $s = app()->make('App\Property\Site');
        }
        return $this->loadByLegacyProperty($s->getEntity()->getLegacyProperty(), $type);
    }

    protected function status(string $status,array $data){
        return array_merge(['status' => $status],$data);
    }

    public function saveNew(array $data){
        $replace = Util::arrayGet($data,'replace');
        $legacy = app()->make('App\Property\Site')->getEntity()->fk_legacy_property_id;
        if(isset($data['replace'])){
            /* We don't want the 'replace' key to be set in our model 
             * since that will likely break the insert/update
             */
            unset($data['replace']);
            /* We want to make sure we update the updated_at field because calculation of the 
             * page_access_token_expiration field depends on it
             */
            $data['updated_at'] = time();
            /* Make all the other access tokens invalid */
            self::where('fk_legacy_property_id',$legacy)
                ->where('place_type',Util::arrayGet($data,'place_type',null))
                ->update(['active' => 'n']);
        }
        $data['fk_legacy_property_id'] = $legacy;

        /* Create a new model to insert/update the data */
        $place = new self;
        $firstRecord = self::where('fk_legacy_property_id',$legacy)
                ->where('place_type',Util::arrayGet($data,'place_type'))
                ->first();

        /* If a record exists and the user does not wish to replace it */
        if($firstRecord && !$replace){
            return $this->status('error',['record_exists' => true]);
        }
        if($firstRecord && $replace){
            foreach($data as $key => $value){
                $firstRecord->{$key} = $value;
            }
            $firstRecord->active = 'y';
            /* We don't want to allow the user to updated the id willy nilly */
            if(isset($data['id'])){
                unset($data['id']);
            }
            return $this->status('ok', ['update_return' => $firstRecord->save()]);
        }
        else{
            foreach($data as $key => $value){
                $place->$key = $value;
            }
            $place->active = 'y';
            $place->updated_at = null;
            /* I'm not 100% sure if created_at is populated automatically, so I'm doing this just to be sure */
            $place->created_at = time();
            try{
                return $this->status('ok',['message' => 'New token has been saved','save_return' => $place->save()]);
            }catch(\Exception $e){
                return $this->status('error',['message' => 'could not save data: ' . $e->getMessage()]);
            }
        }
    }
}
