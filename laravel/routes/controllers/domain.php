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
use App\Property\Site\Aliases;
use App\Util\S3Util;
use App\System\Session;
use App\Reviews;
use App\Reviews\Place;

$security = app()->make('App\Property\Crud\SecurityCheck');
if($security->allowed()){
    Route::get('/legacy/create/{property_group}/{legacy_id}',function($groupId,$legacyId){
        $prop = new App\Http\Controllers\Property;
        return $prop->register(Group::findOrFail($groupId),LegacyProperty::findOrFail($legacyId));
    });
}

Route::get('/unit',function(){
    header("Location: /floorplans");
    die();
});
Route::get('/places',function(){ return redirect('/places/index'); });
Route::get('/places/{page}',function($page){
    if(!Session::isCmsUser()){
        return redirect('/admin?redirect=places');
    }

    switch($page){
        case 'refresh-reviews':
            $rev = app()->make('App\Reviews');
            $rev->setApiKey('AIzaSyARVRzwAbu2dsR7Cw08JiAanKFfhIQnmUQ');
            $deets = $rev->fetchDetails(app()->make('App\Property\Site'));
            echo count($deets) . " records have been inserted into the db for this property<br>";
            break;
        case 'view-reviews':
            $rev = Reviews::where('fk_legacy_property_id',app()->make('App\Property\Site')->getEntity()->fk_legacy_property_id)->get();
            dd($rev);
            break;
        case 'set-place-id':
            $p = Place::where('fk_legacy_property_id',app()->make('App\Property\Site')->getEntity()->fk_legacy_property_id)->get();
            if(count($p))
                return view('layouts/admin/places/placeid',['placeid' => $p->first()->place_id]);
            else
                return view('layouts/admin/places/placeid');
        default:
            return view('layouts/admin/places');
            break;
    }

})->middleware(['https']);

Route::get('/admin','SiteController@tagsAdmin')->middleware('https');
Route::post('/admin','SiteController@tagsLogin')->middleware('https');
Route::get('/redis',function(){
    $serv = preg_replace("|^www\.|","",$_SERVER['SERVER_NAME']);
    $cmd = "/usr/local/bin/redis-cli --raw keys '*$serv*' | xargs /usr/local/bin/redis-cli del";
    shell_exec($cmd);
    die("Redis flushed for $serv");
});
Route::get('/s3',function(){
    S3Util::updatePhotos();
});

Route::get('/{page}','SiteController@resolve')->middleware('https');
Route::get('/','SiteController@resolve')->middleware('https');
Route::get('/resident-portal/{page}','SiteController@resolveResident')->middleware(['https','residentauth']);

/* 
 * POST CONTROLLERS 
 */

Route::post('/tags-logout','SiteController@tagsLogout')->middleware('https');
Route::post('/{page}','PostController@handle')->middleware('https');
Route::post('/resident-portal/{page}','PostController@handle')->middleware(['https','residentauth']);

