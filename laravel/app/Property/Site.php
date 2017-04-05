<?php

namespace App\Property;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Property\Entity as PropertyEntity;
use App\Property\Template;

class Site extends Model
{

    public static $instance = null;
    public static $site_id_set = false;
    public static $site_id = null;
    public static $template_dir = null;
    protected $_entity = null;
    protected $table = 'property_entity';

    public function __construct(Entity $entity){
        if($entity->id){
            self::$instance = $this;
            self::$site_id = $entity->id;
            self::$site_id_set = true;
            self::$template_dir = Template::find($entity->fk_template_id)
                ->get()->first()
                ->filesystem_id
            ;
            $this->id = $entity->id;
        }
        $this->_entity = $entity;
    }

    public function getEntity(){
        return $this->_entity;
    }
}
