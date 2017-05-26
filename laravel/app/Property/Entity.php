<?php

namespace App\Property;

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
use App\Property\Clientside\Assets as ClientsideAssets;
use App\Traits\LoadableByArray;
use App\Exceptions\BaseException;
use App\System\Session;

class Entity extends Model
{
    use TextCache;
    use LoadableByArray;
    protected $table = 'property_entity';
    protected $_legacyProperty = null;

    //
    public function getFloorPlanThumbSrc($object)
    {
        $uName = Util::transformFloorplanName($object->U_MARKETING_NAME);
        $rtn = [
            $this->getWebPublicDirectory('floorplans'),
            "{$uName}." . array_get($object->image_data, $uName, 'jpg')
        ];
        return implode('/', $rtn);
    }
    public function createNew(array $attributes, LegacyProperty $legacyProperty)
    {
        $foo = $this->where('fk_legacy_property_id', $legacyProperty->id)->get();
        if (count($foo)) {
            foreach ($foo[0]->attributes as $i => $value) {
                $this->$i = $value;
            }
            return $this;
        }
        $this->_preprocessAttributes($attributes);

        foreach ($attributes as $key => $value) {
            $this->$key = $value;
        }

        $this->fk_legacy_property_id = $legacyProperty->id;
        try {
            $templateName = $this->grabTemplateId(Util::realServerName());
            if ($templateName === null) {
                throw new BaseException("Unable to find template for property");
            }
        } catch (\Exception $e) {
            throw $e;
        }
        Util::log($templateName);
        if ($templateName === null) {
            //TODO: instead of storing this stuff in a file, store it elsewhere in a db or something
            die("Server is not in server template file");
        }

        $temp = Template::where('name', $templateName)->get();
        if (count($temp) == 0) {
            die("There is no template in the db named $templateName");
        }
        $this->fk_template_id = $temp[0]->id;
        self::save();
        $this->loadLegacyProperty();
        return $this;
    }

    public function getRecaptchaKey()
    {
        return ENV("RECAPTCHA_KEY");
    }

    public function grabTemplateId(string $serv)
    {
        if (strlen(ENV("SERVER_TEMPLATE_FILE")) == 0) {
            throw new BaseException("File does not exist: server template file");
        }
        $guts = json_decode(file_get_contents(ENV("SERVER_TEMPLATE_FILE")), 1);
        if (in_array($serv, array_keys($guts))) {
            return $guts[$serv];
        }
        return null;
    }

    public function getAssetsVersion(string $path)
    {
        if (file_exists(public_path() ."/{$path}")) {
            return date("Y-m-d-H-i_s", fileatime(public_path() . "/" . $path));
        }
    }

    public function createClientDir()
    {
        shell_exec("mkdir " . public_path() . "/clients/" . $this->getFileSystemId());
    }

    public function generateFileSystemId(LegacyProperty $legacy, $fileExistsCallback, $append=null)
    {
        $propertyName = $legacy->code . '-' . $legacy->name ;

        $cleaned = preg_replace('/[^a-z\-_0-9]+/', '-', strtolower($propertyName));
        $cleaned = preg_replace('/\-{2,}/', '-', $cleaned);
        $cleaned = substr($cleaned, 0, 256);

        if (strlen($cleaned) == 0) {
            throw new Exception("Invalid property name '" . $propertyName . "'. Cleaned to null");
        }

        return $cleaned;
    }

    public function getFileSystemId()
    {
        return $this->_legacyProperty->code . '-' .
            preg_replace("|\-{2,}|", "-",
                    preg_replace("|[^a-z0-9]+|", "-", strtolower($this->_legacyProperty->name))
                )
            ;
    }

    public function getPublicDirectory()
    {
        return public_path() . '/clients/' . $this->getFileSystemId();
    }

    public function getTemplateName() : string
    {
        $id = $this->fk_template_id;
        return Util::redisFetchOrUpdate('template_name', function () use ($id) {
            $name = Template::select('name')->where('id', $id)->get()->toArray()[0]['name'];
            return $name;
        });
    }

    public function getLegacyCode() : string
    {
        return $this->_legacyProperty->code;
    }

    public function getMeta(string $type, $page)
    {
        //TODO: grab specific meta tags for specific pages
        $foo = $this;
        $legacy = $this->getLegacyProperty();
        switch ($type) {
            case 'description':
                return Util::redisFetchOrUpdate('meta_description_' . $page, function () use ($foo, $legacy, $page) {
                    $page = preg_replace("|^/|", "", $page);
                    $page = preg_replace("|\?.*|", "", $page);
                    if (strlen($legacy->unit_type) == 0) {
                        $unitType = "";
                    } else {
                        $unitType = " " . Util::depluralize($legacy->unit_type) . " ";
                    }
                    switch ($page) {
                        case '':
                        case '/':
                        case 'home':
                            return "Welcome home to " . $foo->getLegacyProperty()->name . " apartments in " .
                        $foo->getCity() . ", " . $foo->getState() . ". " .
                        "We are a unique garden styled community that offers you many of the luxuries to meet your needs. ";
                        case 'gallery':
                            return 'Take an online virtual tour of our Photos for ' . $foo->getLegacyProperty()->name . ' apartments in ' .
                            $foo->getCity() . ' ' . $foo->getAbbreviatedState() . '. Newly renovated units and classic styles to choose from. Schedule your tour today.';
                        case 'floorplans':
                            return 'Choose from our newly renovated 2 & 3 bedroom apartments in ' . $foo->getCity() . ', ' . $foo->getAbbreviatedState() . '. ' .
                            'Luxury and comfort awaits you in our spacious floorplans. ';
                        case 'neighborhood':
                            return $foo->getLegacyProperty()->name . ' is a commuters dream and our residents can enjoy all the shopping, dining and entertainment, choices the ' .
                            $foo->getCity() . ' ' . $foo->getAbbreviatedState() . ' metro area has to offer.';
                        case 'amenities':
                            return $foo->getLegacyProperty()->name . ' offers luxury amenities and deluxe features designed for you. Pet-friendly, resort-style pool, spa, cabana, fitness center, private garages, and more . ';
                        case 'contact':
                            return 'Contact our professional team and learn more about what ' . $foo->getLegacyProperty()->name . ' apartments has to offer. Schedule a visit today. ';
                        case 'schedule-a-tour':
                            return 'Schedule a tour at ' . $foo->getLegacyProperty()->name . ' & reserve your new dream apartment.';
                        case 'terms':
                            return 'Terms of use for ' . $foo->getLegacyProperty()->name . ' apartment homes in ' . $foo->getCity() . ', ' . $foo->getAbbreviatedState(). '.';
                        case 'resident-center':
                            return $foo->getLegacyProperty()->name . ' apartments offers a Resident Portal for your convenience. Pay rent online, submit maintenance request or contact the property staff!';
                    }
                }, false);
                break;
            case 'keywords':
                return Util::redisFetchOrUpdate('meta_keywords_' . $page, function () use ($foo, $legacy, $page) {
                    $page = preg_replace("|^/|", "", $page);
                    $page = preg_replace("|\?.*|", "", $page);
                    switch ($page) {
                        case '':
                        case '/':
                        case 'home':
                            return $foo->getCity() . ' ' . $foo->getAbbreviatedState() . ' Apartments, Apartments in ' .
                            $foo->getCity() . ', ' . $foo->getCity()  . ' Apartments for Rent';
                        case 'gallery':
                            return $foo->getCity() . ' ' . $foo->getAbbreviatedState() . ' Apartment Photos, Gallery of Apartments in ' . $foo->getCity() . ', Virtual Tour';
                        case 'floorplans':
                            return $foo->getCity() .  ' Apartment Floor Plans, ' . $foo->getCity() . ' 2 & 3 Bedrooms Apartment, 2 & 3 Bedrooms ' . $foo->getCity() . ', ' . $foo->getState() . ' Apartment Floor Plans,' .
                            ' ' . $foo->getLegacyProperty()->name . 'Apartments Floor Plans, 3D Floor Plans';
                        case 'neighborhood':
                            return $foo->getCity() . ' Apartments, Apartments ' . $foo->getCity() . ', ' . $foo->getLegacyProperty()->name . ', ' . $foo->getCity() . ' Rental Apartments, ' .
                            $foo->getCity() . ' Apts, Apartment Community ' . $foo->getCity() . ', ' . $foo->getCity() . ' Apartment Complex, Apts ' . $foo->getCity() . ' ' .  $foo->getAbbreviatedState();
                        case 'amenities':
                            return 'luxury amenities, deluxe features, all electric kitchen, cable ready, wood burning fireplaces, sparkling pool';
                    }
                });
                break;
            default: return null;
        }
    }

    public function getCustomStyleSheets($page)
    {
        //return Util::redisFetchOrUpdate('clientside_assets_' . $page, function(){
            $foo =  app()->make('App\Property\Clientside\Assets')->
                getStyleSheets(Site::$instance);
        return $foo;
        //    },true);
    }

    public function getGoogleAnalytics()
    {
        $foo = $this;
        $legacyId = Site::$instance->getEntity()->fk_legacy_property_id;
        return Util::redisFetchOrUpdate('google_analytics', function () use ($foo, $legacyId) {
            $temp = PropertyTemplate::select('tracking_code')
                ->where('property_id', $legacyId)
                ->get()
            ;
            if (count($temp)) {
                return $temp->first()
                ->toArray()['tracking_code'];
            } else {
                return null;
            }
        });
    }

    /* TODO: Grab a different directory based on type. for now we only use images/* but
     * in the future we should use $type/*
    */
    public function getWebPublicCommon(string $path, $type=null)
    {
        $base = env("WEB_PUBLIC_BASE");
        return $base . "images/common/{$path}";
    }

    public function getWebPublicDirectory(string $type)
    {
        $base = env('WEB_PUBLIC_BASE');
        switch ($type) {
            case 'slides':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
            case 'floorplans':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/floorplans";
            case 'features':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/features";
            case 'neighborhood':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/neighborhood";
            case 'popup':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
            case 'logo':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/logo";
            case 'gallery':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}/gallery";
            case 'img':
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
            default:
                return $base . "images/{$this->getTemplateName()}/{$this->getLegacyCode()}";
        }
    }

    public function getSocialMedia(string $type)
    {
        $foo = $this;
        $fbUri = Util::redisFetchOrUpdate('facebook_uri', function () use ($foo, $type) {
            $temp = PropertyTemplate::select('facebook_url')
                ->where('property_id', $foo->_legacyProperty->id)
                ->first()->toArray();
            if (!$temp) {
                return null;
            }
            $data = $temp['facebook_url'];
            if (strlen($data) == 0) {
                return null;
            }
            return $data;
        });
        if (preg_match("|<\-multi\->|", $fbUri)) {
            $foo = preg_replace("|<\-multi\->|", "", $fbUri);
            $parts = explode("\n", $foo);
            foreach ($parts as $i => $p) {
                if (strpos($p, "~") === false) {
                    continue;
                }
                list($var, $value) = explode("~", $p);
                if ($var == 'facebook' && $type == 'fb') {
                    return $value;
                }
                if ($var == 'twitter' && $type == 'twitter') {
                    return $value;
                }
                if ($var == 'linkedin' && $type == 'li') {
                    return $value;
                }
                if ($var == 'google' && $type == 'google') {
                    return $value;
                }
                if ($var == 'yelp' && $type == 'yelp') {
                    return $value;
                }
                if ($var == 'instagram' && $type == 'insta') {
                    return $value;
                }
                if ($var == 'pinterest' && $type == 'pinterest') {
                    return $value;
                }
            }
        } else {
            //returns facebook link if not multi
            if ($type == 'fb') {
                return $fbUri;
            }
        }
    }

    protected function _preprocessAttributes(&$attr)
    {
        if (isset($attr['_property_group_name'])) {
            $group = PropertyGroup::where('group_name', $attr['_property_group_name']['name'])->get()->first();
            if (!($group instanceof PropertyGroup)) {
                $group = new PropertyGroup;
                $group->group_name = $attr['_property_group_name']['name'];
                $group->str_identifier = PropertyGroup::generateStrIdentifier($attr['_property_group_name']['name']);
                $group->active_status = 1;
                $group->save();
            }
            $attr['property_group_id'] = $group->id;
            unset($attr['_property_group_name']);
        }
    }

    public function loadLegacyProperty(int $legacyPropertyId = -1)
    {
        $foo = $this;
        $data  = Util::redisFetchOrUpdate('legacy_property', function () use ($legacyPropertyId, $foo) {
            if ($legacyPropertyId > -1) {
                return LegacyProperty::where(['id' => $legacyPropertyId])->get()->toArray()[0];
            }
            if ($foo->fk_legacy_property_id) {
                return LegacyProperty::where(['id' => $foo->fk_legacy_property_id])->get()->toArray()[0];
            }
        }, true);
        $this->_legacyProperty = app()->make("App\Legacy\Property");
        $this->_legacyProperty->loadByArray($data);
        return $this;
    }

    public function getLegacyProperty() : LegacyProperty
    {
        if ($this->_legacyProperty === null) {
            //Attempt to load the legacy property
            $this->_legacyProperty = LegacyProperty::findOrFail($this->fk_legacy_property_id);
        }
        return $this->_legacyProperty;
    }

    public function getPhone() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('phone', function () use ($foo) {
            return $this->_legacyProperty->phone;
        });
    }

    public function getStreet() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('address', function () use ($foo) {
            return $foo->_legacyProperty->address;
        });
    }

    public function getCity() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('city', function () use ($foo) {
            return $foo->_legacyProperty->city;
        });
    }

    public function getState() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('state', function () use ($foo) {
            $state = $foo->_legacyProperty->getState();
            return $state;
        });
    }

    public function getAbbreviatedState() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('abbreviated_state', function () use ($foo) {
            $state = $foo->getState();
            $code = State::select('code')->where('name', $state)->get()->first()->toArray();
            if (empty($code)) {
                return $state;
            } else {
                return $code['code'];
            }
        });
    }

    public function getZipCode() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('zip', function () use ($foo) {
            return $foo->_legacyProperty->zip;
        });
    }

    public function getHours() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('hours', function () use ($foo) {
            return $foo->_legacyProperty->hours;
        });
    }

    public function getEmail() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('email', function () use ($foo) {
            return $foo->_legacyProperty->email;
        });
    }

    public function getTitle() : string
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('name', function () use ($foo) {
            return $foo->_legacyProperty->name;
        });
    }


    public function getWelcomeText(string $section) : string
    {
        switch ($section) {
            case 'amenities':
                return "amenities welcome text stub";
            default:
                return "default welcome text stub";
        }
    }

    public function getLatitude()
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('latitude', function () use ($foo) {
            $t = PropertyTemplate::select('latitude')->where('property_id', $this->fk_legacy_property_id)->get()->toArray();
            if (isset($t[0]) == false) {
                return "";
            } else {
                return $t[0]['latitude'];
            }
        });
    }

    public function getLongitude()
    {
        $foo = $this;
        return Util::redisFetchOrUpdate('longitude', function () use ($foo) {
            $t = PropertyTemplate::select('longitude')->where('property_id', $this->fk_legacy_property_id)->get()->toArray();
            if (isset($t[0]) == false) {
                return "";
            } else {
                return $t[0]['longitude'];
            }
        });
    }

    protected $_decorateIgnoreText = [
        'google-maps-title'
    ];

    public function conditionalDecorateTags($name, $text, $opts)
    {
        if (preg_match("|class=['\"]{1}edit\-tag|", $text)) {
            return $text;
        } else {
            if (isset($opts['use_double'])) {
                $q = "\"";
            } else {
                $q = "'";
            }
            return "$text<b style={$q}color:red{$q} class={$q}edit-tag{$q} onclick='edit_tag(\"$name\")'>{!}</b>";
        }
    }

    public function decorateGetText($name, $text, $opts = [])
    {
        if (isset($opts['use_double'])) {
            $q = "\"";
        } else {
            $q = "'";
        }
        if (isset($opts['nodecorate'])) {
            return preg_replace("|<b style=['\"]color:[^>]*>\{!\}</b>|", "", $text);
        }
        if (Session::isCmsUser()) {
            Util::log("Is cms user... decorate tags...");
            if ($text === null) {
                return "<b style={$q}color:green{$q} class={$q}edit-tag{$q} onclick='edit_tag(\"$name\");'>{!}</b>";
            }
            if (in_array($name, $this->_decorateIgnoreText)) {
                if (strlen($text) == 0) {
                    return "<b style={$q}color:green{$q} class={$q}edit-tag{$q} onclick='edit_tag(\"$name\")'>{!}</b>";
                }
            }
            return $this->conditionalDecorateTags($name, $text, $opts);// . "<b style={$q}color:red;{$q} class={$q}edit-tag{$q} onclick='edit_tag(\"$name\")'>{!}</b>";
        } else {
            return preg_replace("|<b style=['\"]color:[^>]*>\{!\}</b>|", "", $text);
        }
    }

    public function getPageTitle($pageMatch)
    {
        switch ($pageMatch) {
            case '/':
            case 'home':
                return $this->getCity() . " " . $this->getAbbreviatedState() . " Apartments | Luxury Apartments For Rent | {$this->getLegacyProperty()->name}";
            case 'amenities':
                return "Amenities of {$this->getLegacyProperty()->name} | Apartment & Community Features";
            case 'contact':
                return 'Contact Us | Schedule a Tour | Maps & Directions';
            case 'floorplans':
                //TODO: Get number of bedrooms per property
                return "2 & 3 Bedroom Floor Plans | Apartments in {$this->getCity()},{$this->getAbbreviatedState()}";
            case 'gallery':
                return "Photo Tour | Apartments in {$this->getCity()} {$this->getAbbreviatedState()} | {$this->getLegacyProperty()->name}";
            case 'neighborhood':
                return "Neighborhood of {$this->getLegacyProperty()->name} Apartments in {$this->getCity()}, {$this->getAbbreviatedState()}";
            case 'privacy':
                return "Privacy Policy | {$this->getLegacyProperty()->name}";
            case 'resident-portal':
                return "Resident Center | {$this->getLegacyProperty()->name}";
            case 'schedule-a-tour':
                return "Schedule a Tour | {$this->getLegacyProperty()->name} Apartments in {$this->getCity()}, {$this->getAbbreviatedState()}";
            case 'terms':
                return "Terms of Use | {$this->getLegacyProperty()->name}";
            case 'apply-online':
            case 'unit':
            default:
                return $this->getCity() . " " . $this->getAbbreviatedState() . " Apartments | Luxury Apartments For Rent | {$this->getLegacyProperty()->name}";
        }
    }
    /**
    * @return interface to return translatables to|from Symphony database
    * use getText and setText functions
    *
    */
    protected function getTextTranslatables()
    {
        $foo = $this;
        return $translatables = [
            'apartment-title' => [
                'schema' => 'property.name',
                'fetch' => function () use ($foo) {
                    return $foo->getLegacyProperty()->name;
                },
                'set' => function ($val) use ($foo) {
                    $leg = $foo->getLegacyProperty();
                    $leg->name = $val;
                    $leg->save();
                },
                ],
            'slogan' => [
                'fetch' => function () {
                    return 'More than just a place to sleep';
                },
                'set' => function ($val) use ($foo) { /* Temporarily ignored; */
                },
                'schema' => 'property.foo',
                ],
        ];
    }
    /** checks to see if needs to store in symphony tables, if yay, then store, if nay, then well...
    * @param $key string key to lookup in texttranslatables
    * @param $body string value to set to key
    */
    public function setText(string $key, string $body)
    {
        $translations = $this->getTextTranslatables();
        if (in_array($key, array_keys($translations))) {
            $translations[$key]['set']($body);
        }
    }

    /**
    * @param $name string key to fetch
    * @param $opts array. default []
    *   ['nodecorate'] => won't call decorateGetText
    *   ['use_double'] => if set, forces double quotes when decorating text
    *   ['oneshot'] => if not already set, then sets to this value
    *
    */
    public function getText(string $name, array $opts = [])
    {
        $foo = $this;
        self::$_objectInstance = $this;
        $translatables = $foo->getTextTranslatables();
        if (in_array($name, array_keys($translatables))) {
            Util::log('translatable: ' . var_export($name, 1), ['log' => 'translatable']);
            Util::log("Translatable");
            return $this->decorateGetText($name, $translatables[$name]['fetch'](), $opts);
        }
        $returnValue = Util::redisFetchOrUpdate('textcache_str_key_' . $name, function () use ($foo, $name, $opts) {
            if (preg_match("|title_(.*)|", $name, $matches)) {
                return $foo->getPageTitle($matches[1]);
            }
            $text = null;
            $textTypes = TextType::select(['id'])->where('str_key', $name)->pluck('id')->toArray();
            if (count($textTypes)) {
                $a = PropertyText::select('string_value')->where('property_text_type_id', $textTypes[0])->get()->pluck('string_value')->toArray();
                $text = array_pop($a);
            }
            if (strlen($text) == 0 && isset($opts['oneshot'])) {
                $prop = new PropertyText();
                $prop->string_value = $opts['oneshot'];
                if (empty($textTypes)) {
                    $textType = new TextType();
                    $textType->str_key = $name;
                    $textType->save();
                    $textTypeId = $textType->id;
                } else {
                    $textTypeId = $textTypes[0];
                }
                $prop->property_text_type_id = $textTypeId;
                $prop->entity_id = $foo->id;
                $prop->save();
                $text = $opts['oneshot'];
                \Debugbar::info("Name; $name text: $text");
            }
            if (isset($opts['nodecorate'])) {
                return $text;
            }
            return $text;
        });

        \Debugbar::info("Updating textcahce: $name");
        if (isset($opts['nodecorate'])) {
            Util::log("No decorate!!!!");
            return $returnValue;
        }
        Util::log("Calling decorate text...");
        return $this->decorateGetText($name, $returnValue, $opts);
    }

    public function getFullAddress(array $opt = []) : string
    {
        $a = trim($this->getStreet()) . " " ;
        if (isset($opt['city']) && $opt['city'] == 'break') {
            $a .= "<br>";
        }
        $a .= trim($this->getCity()) . ", " ;
        if (isset($opt['state']) && $opt['state'] == 'abbrev') {
            $a .= trim($this->getAbbreviatedState()) . " ";
        } else {
            $a .= trim($this->getState()) . " ";
        }
        $a .= trim($this->getZipCode());
        return $a;
    }

    public function getFullAddressBr() : string
    {
        return trim($this->getStreet()) . "<br>" .
            trim($this->getCity()) . ", " .
            trim($this->getState()) . " " .
            trim($this->getZipCode());
    }

    public function hasPhotos()
    {
        return $this->hasMany('App\Property\Photo', 'property_id', 'fk_legacy_property_id');
    }

    public function hasText()
    {
        return $this->hasMany('App\Property\Text', 'entity_id', 'id');
    }

    public function hasNeighborhood()
    {
        return $this->hasMany('App\Property\Neighborhood', 'property_id', 'fk_legacy_property_id');
    }
}
