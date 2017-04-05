<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Property\Site;
use App\Traits\HasData;
use App\AIM\Specials as AIMSpecials;

class Specials extends Model
{
    use HasData;
    protected $site = null;
    protected $_aim = null;
    public function __construct(Site $site){
        $this->site = $site;
        $this->traitSet('site',$site);
        $this->traitSet('aim',app()->make('App\AIM\Specials'));
        $this->loadSpecials();
    }

    public function loadSpecials($forceLoad=false){
        if($forceLoad || empty($this->traitGet('specials'))){
            $resource = $this->traitGet('aim')->getSpecials();
            $this->traitSet('specials',$resource);
        }
    }
}
