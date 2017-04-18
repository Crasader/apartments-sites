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

    public function __construct($entity){
        if($entity['id']){
            self::$instance = $this;
            self::$site_id = $entity['id'];
            self::$site_id_set = true;
            if(!Util::redisIsNew('template_dir')){
                self::$template_dir = Util::redisGet('template_dir');
            }else{
                self::$template_dir = Template::find($entity['fk_template_id'])
                ->get()->first()
                ->filesystem_id
                ;
                Util::redisUpdate('template_dir',self::$template_dir);
            }
            $this->id = $entity['id'];
        }
        $this->_entity = Entity::find($entity['id']);
    }

    public function getEntity(){
        return $this->_entity;
    }
}
