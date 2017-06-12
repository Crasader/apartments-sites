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

Route::get('/api/reviews/{page}','ReviewsController@handle');
Route::post('/api/reviews/{page}','ReviewsController@post');
