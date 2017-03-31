<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Entity as PropertyEntity;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Events\RegisteredProperty as Registered;


class Property extends Controller
{

    public function register(PropertyGroup $group,LegacyProperty $legacyProperty){
        $id = $legacyProperty->id;
        $prop = new PropertyEntity;

        $fileSystemId = $prop->generateFilesystemId($legacyProperty,'unused-deprecated-parameter');
        try{
            if(!$fileSystemId){
                throw new Exception("Could not generate a file system id for property: " . $propertyName);
            }
        }catch(Exception $e){
            return view('register',['error' => $e->getMessage()]);
        }
        $prop->createNew([
            'property_group_id' => $group->id,
            'property_name' => $legacyProperty->name,
            'filesystem_id' => $fileSystemId
        ],$legacyProperty);
        event(new Registered($prop));
        return view('register',['error' => null,'id' => $prop->id]);
    }

}
