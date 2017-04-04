<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Property\Group as Group;
use App\Property\Entity as PropertyEntity;
use App\Legacy\Property as LegacyProperty;
use App\Property\Template as Template;
use App\Property\Site;

$security = app()->make('App\Property\Crud\SecurityCheck');
if($security->allowed()){
    Route::get('/legacy/create/{property_group}/{legacy_id}',function($groupId,$legacyId){
        $prop = new App\Http\Controllers\Property;
        return $prop->register(Group::findOrFail($groupId),LegacyProperty::findOrFail($legacyId));
    });
}


Route::get('/{page}',function($page){
    $site = app()->make('App\Property\Site');
    if(!$site->id){
        return '';
    }else{
        if(Site::$template_dir){
            $templateDir = Site::$template_dir;
        }else{
            $ent = PropertyEntity::find($site->id);
            $templateDir = Template::find($ent->fk_template_id)->get()->first()-filesystem_id;
        }
        $entity = $site->getEntity();
        try{
            $entity->loadLegacyProperty();
        }catch(Exception $e){
            echo "Unable to grab legacy property info";
        }
        return view('layouts/' . $templateDir . '/pages/' . $page ,[
            'site'=>$site,
            'entity'=>$entity,
            'page' => $page
        ]);
    }
});
