<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseException;
use App\Traits\TextCache;
use App\Property\Site;
use App\ResidentPortal\Session;
use App\System\Session as Sesh;
use App\Util\Util;
use App\Traits\RedirectHooks;

trait PageResolver
{
    use TextCache;
    use RedirectHooks;
    protected $_site = null;
    protected $_guardedResidentPages = [
        'maintenance-request',
        'portal-center',
        'contact-request',
    ];

    protected $_redirect = null;

    /*
     * The following protected variable comes from the App\Trait\RedirectHooks trait 
     * and is used by $this->resolve()
     * protected $_redirectHooks = [
     * ];
    */
    public function resolve($page = 'home')
    {
        try {
            if($this->hasRedirectHooks($page)){
                return $this->dispatchRedirectHook($page);
            }
            $data = $this->resolvePageBySite($page);
            if(Util::arrayGet($data,'redirect')){
                return redirect(Util::arrayGet($data,'redirect'));
            }
            return view(Util::arrayGet($data,'path'), $data['data']);
        } catch (BaseException $e) {
            return view("404");
        }
    }
    public function resolvePageBySite(string $page, $inData = null)
    {
        $this->_redirect = null;
        $this->_site = app()->make('App\Property\Site');
        if (!$this->_site->id) {
            $this->_site = app()->make("App\Property\Site");
        } else {
            if (Site::$template_dir) {
                $templateDir = Site::$template_dir;
            } else {
                $ent = PropertyEntity::find($this->_site->id);
                $templateDir = Template::find($ent->fk_template_id)->get()->first()-filesystem_id;
            }
            $entity = $this->_site->getEntity();
            try {
                $entity->loadLegacyProperty();
            } catch (Exception $e) {
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
            if ($aliases->hasAlias($page)) {
                $data['alias'] = $aliases->getAlias($page);
                $aliased = true;
                $page = $aliases->getAlias($page);
            }

            //TODO: add custom resolvers that we can add dynamically. i.e. for resident portal !organization !refactor
            $data['fsid'] = $templateDir;
            $data['aliased'] = $aliased;
            $data['orig'] = $origPage;
            
            return [
                'path' => $this->resolveTemplatePath($templateDir, $data, $page, $inData),
                'data' => $this->resolveTemplateData($templateDir, $page, $inData, $data),
                'redirect' => $this->_redirect,
            ];
        }
        return [];
    }


    public function isGuarded($data,$inData) : bool{
        $page = str_replace('/resident-portal/','',$data['page']);
        return in_array($page,$this->_guardedResidentPages);
    }

    public function resolveTemplatePath($templateDir, $data,$page, $inData)
    {
        if (isset($inData['resident-portal'])) {
            /*
             * If the particular page should be guarded (user has to be authenticated), and the user is not authenticated, 
             * then return them to the resident portal
             */
            if($this->isGuarded($data,$inData) && Sesh::residentUserLoggedIn() == false){
                $this->_redirect = '/resident-portal';
                return null;
            }
            /*
             * If the user is logged in and they are attempting to access the portal center
             */
            if(Sesh::get(Sesh::RESIDENT_USER_KEY) !== null && preg_match("|/portal\-center|",$data['page'])){
                return "layouts/$templateDir/pages/resident-portal/portal-center";
            }
            return "layouts/$templateDir/pages/resident-portal/" . str_replace('resident-portal/', "", $page);

        }
        return "layouts/$templateDir/pages/$page";
    }

    public function resolveTemplateData($templateDir, $page, $inData, $data)
    {
        if (isset($inData['resident-portal'])) {
            if (Sesh::get(Sesh::RESIDENT_USER_KEY) !== null) {
                $data['residentInfo'] = json_decode(explode("|", Sesh::get(Sesh::RESIDENT_USER_KEY))[1], 1); //TODO !ugly
            }
            $data['extends'] = "layouts/$templateDir/main";
        }
        return $data;
    }}
