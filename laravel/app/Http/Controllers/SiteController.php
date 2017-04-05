<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property\Site;
use App\Property\Entity as PropertyEntity;
use App\Property\Template;
use App\Exceptions\BaseException;

class SiteController extends Controller
{
    protected $_site;
    public function __construct(Site $site){
        $this->_site = $site;
    }
    public function resolve($page){
        try{
            $data = $this->resolvePageBySite($page);
            return view($data['path'],$data['data']);
        }catch(BaseException $e){
            return view("404");
        }
    }
    //
    public function resolvePageBySite(string $page,$inData = null) : array{
		if(!$this->_site->id){
            throw new BaseException('No site ID set!');
		}else{
			if(Site::$template_dir){
				$templateDir = Site::$template_dir;
			}else{
				$ent = PropertyEntity::find($this->_site->id);
				$templateDir = Template::find($ent->fk_template_id)->get()->first()-filesystem_id;
			}
			$entity = $this->_site->getEntity();
			try{
				$entity->loadLegacyProperty();
			}catch(Exception $e){
				throw new BaseException("Unable to grab legacy property info");
			}
			$aliases = app()->make('App\Property\Site\Aliases');
			$aliases->setTemplateDir($templateDir)
				->loadAliases();
			$data = ['site' => $this->_site,
				'entity' => $entity,
				'page' => $page,
                'extras' => $inData,
			];
            $aliased = false;
            $origPage = $page;
			if($aliases->hasAlias($page)){
				$data['alias'] = $aliases->getAlias($page);
                $aliased = true;
				$page = $aliases->getAlias($page);
			}
			return [
				'path' => 'layouts/' . $templateDir . '/pages/' . $page,
				'fsid' => $templateDir,
                'aliased' =>$aliased,
                'orig' => $origPage,
                'data' => $data,
            ];
		}
        return [];
    }
}
