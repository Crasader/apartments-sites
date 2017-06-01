<?php

namespace App\Property\Clientside;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Interfaces\IFormatter;
use App\Property\Text as PropertyText;
use App\Property\Text\Type as TextType;
use App\Property\Site;
use App\Traits\TextCache;
use App\Property\Neighborhood;
use App\Property\Template as PropertyTemplate;
use App\Template;
use App\State;
use App\Util\Util;

class Assets extends Model
{
    use TextCache;
    protected $table = 'property_clientside_assets';

    public function getStyleSheets(Site $site = null) : array
    {
        if ($site === null) {
            $site = Site::$instance;
        }
        if ($site === null) {
            $site = app()->make('App\Property\Site');
        }
        $all = $this
            ->distinct()
            ->select('uri')
            ->where('fk_property_id', $site->getEntity()->fk_legacy_property_id)
            ->get()
            ->pluck('uri')
            ->toArray()
            ;
        return $all;
    }
}
