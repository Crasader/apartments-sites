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

use App\Property\Entity as Property;
use App\Legacy\Property as LegacyProperty;

Route::get('/test/fsid', function () {
    $prop = new Property;
    $legacy = new LegacyProperty;
    $legacy->name = "foobar";
    $cbCounter = 5;
    $fileSystemId = $prop->generateFilesystemId($legacy,function() use($cbCounter) {
        echo "Callback counter: $cbCounter<hr>";
        if($cbCounter-- <= 0){
            return null;
        }
        else{
            return 'retry';
        }
    });
    if(!$fileSystemId){
        throw new Exception("Could not generate a file system id for property: " . $propertyName);
    }
    dd($fileSystemId);
});

Route::get('/create-from-legacy/{id}', function ($id) {
    $prop = new Property;
    $legacy = LegacyProperty::findOrFail($id);
    
    $cbCounter = 5;
    $fileSystemId = $prop->generateFilesystemId($legacy,function() use($cbCounter) {
        if($cbCounter-- <= 0){
            return null;
        }
        else{
            return 'retry';
        }
    });
    if(!$fileSystemId){
        throw new Exception("Could not generate a file system id for property: " . $propertyName);
    }
    dd($fileSystemId);
});
