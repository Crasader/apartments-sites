<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Property\Site;
use App\Traits\HasData;

class Specials extends Model
{
    use HasData;
    protected $site = null;
    public function __construct(Site $site){
        $this->site = $site;
        $this->traitSet('site',$site);
        $this->loadSpecials();
    }

    public function loadSpecials($forceLoad=false){
        if($forceLoad || empty($this->traitGet('specials'))){
            $this->traitSet('dataFetcher',app()->make('App\Assets\DataFetcher'));
            
            $resource = $this->traitGet('dataFetcher')->loadResource(Specials::class,$this->traitGet('site'));
            $this->traitSet('specials',$resource);
        }
    }
}
