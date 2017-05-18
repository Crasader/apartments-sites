<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Property\Entity as PropertyEntity;
use App\Template;
use App\Util\Util;

class Site extends Model
{
    public static $instance = null;
    public static $site_id_set = false;
    public static $site_id = null;
    public static $template_dir = null;
    public static $legacyPropertyId = null;
    protected $_entity = null;
    protected $table = 'property_entity';

    public function __construct($entity)
    {
        if (get_class($entity) == "App\Property\Entity") {
            self::$instance = $this;
            $this->id = self::$site_id = $entity->id;
            self::$site_id_set = true;
            self::$template_dir = Template::where('id', $entity->fk_template_id)
                ->get()->first()
                ->filesystem_id
            ;
            $this->_entity = $entity;
            return;
        }
        //TODO:this code is rather redundant..
        if (isset($entity['id'])) {
            self::$instance = $this;
            self::$site_id = $entity['id'];
            self::$site_id_set = true;
            self::$template_dir = Template::where('id', $entity->fk_template_id)
                ->get()->first()
                ->filesystem_id
                ;
            $this->id = $entity['id'];
            $this->_entity = Entity::find($this->id);
        }
        if (is_array($entity)) {
            $e = new Entity();
            $e->loadByArray($entity);
            $this->_entity = $e;
            \Debugbar::info("Loaded site::entity by array");
            return;
        }
    }

    public function getEntity()
    {
        return $this->_entity;
    }
}
