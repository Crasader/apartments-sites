<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Property\Site;
use App\Http\Controllers\SiteController;
use App\Traits\PageResolver;
use App\Util\Util;
use App\Assets\SoapClient;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Traits\NoNo;
use App\Property\Text\Type as TextType;
use App\Property\Text as PropertyText;
use App\Property\Template as PropertyTemplate;
use Redis;
use App\System\Session;
use App\Reviews\Place;

class AdminPostController extends PostController
{
    use PageResolver;
    use ValidatesRequests;
    use Nono;

    //Declared by trait: protected $_site
    //TODO: Create a loading mechanism so we can dynamically load and unload allowed handlers
    protected $_mergeAllowed = [
        /******************************/
        /* Routes that process places */
        /******************************/
        '/admin/places/placeid'    => 'handlePlaceId',
    ];
    protected $_translations = [];
    //

    public function __construct()
    {
        if (ENV("SHOW_DEBUG_BAR") == "0") {
            \Debugbar::disable();
        }
        parent::__construct();
        $this->_allowed = array_merge($this->_mergeAllowed, $this->_allowed);
    }


    public function loadErrorTranslations(int $legacyPropertyId)
    {
        //TODO: offload these strings to a file somewhere !organization
        $this->_translations = [
            'reset-password' => [
                [
                'orig' => 'The txt user id field is required.',
                'replace' => 'User ID is a required field.'
                ]
            ],
        ];
    }

    public function handlePlaceId(Request $req)
    {
        $data = $_POST;
        Site::$instance = $site = app()->make('App\Property\Site');

        $this->validate($req, [
            'placeid' => 'required|max:64',
            'type' => 'required|max:1',
        ]);
        //
        $updated = Util::updateIfExists(Place::class, ['fk_legacy_property_id' => Site::$instance->getEntity()->fk_legacy_property_id], [
            'place_id' => $data['placeid'],
            'place_type' => $data['type'],
            ]);
        if (!$updated) {
            $p = app()->make('App\Reviews\Place');
            $p->fk_legacy_property_id = Site::$instance->getEntity()->fk_legacy_property_id;
            $p->place_id = $data['placeid'];
            $p->place_type = $data['type'];
            $p->save();
        }
        return view('layouts/admin/places', ['status' => 'Place id successfully saved.']);
    }
}
