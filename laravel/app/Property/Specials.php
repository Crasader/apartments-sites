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
    public function __construct(Site $site)
    {
        $this->site = $site;
        $this->traitSet('site', $site);
        $this->traitSet('aim', app()->make('App\AIM\Specials'));
        $this->loadSpecials();
    }

    public function loadSpecials($forceLoad=false)
    {
        if ($forceLoad || empty($this->traitGet('specials'))) {
            $resource = $this->traitGet('aim')->getSpecials();
            $this->traitSet('specials', $resource);
        }
    }

    public function fetchAllSpecials() : array
    {
        $res = $this->traitGet('specials');
        $data = [];
        foreach ($res as $index => $object) {
            if ($object->U_MARKETING_NAME == 'SpecialWebsite') {
                $data['website'] = $object->SPECIAL_TEXT;
            }
            if ($object->U_MARKETING_NAME == 'SpecialElse') {
                $data['else'] = $object->SPECIAL_TEXT;
            }
        }
        return $data;
    }
}
