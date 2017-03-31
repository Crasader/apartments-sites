<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Entity as PropertyEntity;
use App\Property\Site as Site;

class DomainController extends Controller
{
    public function test(){
        $site = app()->make(Site::class);
        var_dump($site->id);
    }
}
