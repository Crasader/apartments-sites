<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\BaseException;
use App\Traits\TextCache;
use App\Property\Site;
use App\ResidentPortal\Session;
use App\System\Session as Sesh;
use App\Util\Util;

trait PageResolver
{
    use TextCache;
    protected $_site = null;
    public function resolve($page = 'home')
    {
        try {
            $data = $this->resolvePageBySite($page);
            return view($data['path'], $data['data']);
        } catch (BaseException $e) {
            return view("404");
        }
    }

    public function resolvePageBySite(string $page, $inData = null) : array
    {
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
                'path' => $this->resolveTemplatePath($templateDir, $page, $inData),
                'data' => $this->resolveTemplateData($templateDir, $page, $inData, $data),
            ];
        }
        return [];
    }

    public function resolveTemplatePath($templateDir, $page, $inData)
    {
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
    }
}
