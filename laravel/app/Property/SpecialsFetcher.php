<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Property\Site;
use App\Traits\HasData;
use App\Interfaces\IDataFetcher;

class SpecialsFetcher extends Model
{
    use HasData;
    protected $_site = null;
    protected $_fetcher = null;
    public function __construct(IDataFetcher $fetcher){
        $this->_fetcher = $fetcher;
        $this->loadSpecials();
    }

    public function loadSpecials(bool $forceLoad=false){
        if($forceLoad || empty($this->traitGet('specials'))){
            $resource = $this->_fetcher->loadResource(Specials::class,Site::$instance);
            $this->traitSet('specials',$resource);
        }
    }
}
