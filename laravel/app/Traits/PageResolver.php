<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseException;
use App\Traits\TextCache;
use App\Property\Site;
use App\ResidentPortal\Session;

trait PageResolver {
    use TextCache;
    protected $_site = null;
	public function resolve($page = 'home'){
        try{
            $data = $this->resolvePageBySite($page);
            return view($data['path'],$data['data']);
        }catch(BaseException $e){
            return view("404");
        }
    }
    public function resolvePageBySite(string $page,$inData = null) : array{
        //TODO: implement TextCache wrapper here. not crazy important though
        if(!$this->_site){
            $this->_site = Site::$instance;
        }
        if(!$this->_site->id){
            $this->_site = app()->make("App\Property\Site");
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

            //TODO: add custom resolvers that we can add dynamically. i.e. for resident portal !organization !refactor
            $data['fsid'] = $templateDir;
            $data['aliased'] = $aliased;
            $data['orig'] = $origPage;
            return [
                'path' => $this->resolveTemplatePath($templateDir,$page,$inData),
                'data' => $this->resolveTemplateData($templateDir,$page,$inData,$data),
            ];
        }
        return [];
    }

    public function resolveTemplatePath($templateDir,$page,$inData){
        if(isset($inData['resident-portal'])){
            return 'layouts/resident-portal/pages/' . str_replace('resident-portal/',"",$page);
        }
        return "layouts/$templateDir/pages/$page";
    }

    public function resolveTemplateData($templateDir,$page,$inData,$data){
        if(isset($inData['resident-portal'])){
            $data['residentInfo'] = session('user_info');
            $data['extends'] = "layouts/$templateDir/main";
        }
        return $data;
    }
}
