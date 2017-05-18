<?php

namespace App\Property\Site;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\FileException;

class Aliases extends Model
{
    //
    protected $_aliases = [];
    protected $_aliasPath = '';

    public function setTemplateDir(string $tempDir) : Aliases
    {
        $this->_aliasPath = resource_path() . '/views/layouts/' . $tempDir;
        if (!file_exists($this->_aliasPath)) {
            throw new FileException("Template directory doesn't exist");
        }
        return $this;
    }

    public function loadAliases() : bool
    {
        if ($this->_aliasPath === null) {
            $this->_aliases = [];
            return false;
        }
        if (!file_exists($this->_aliasPath . '/aliases')) {
            $this->_aliases = [];
            return false;
        }
        $this->_aliases = json_decode(file_get_contents($this->_aliasPath . '/aliases'), true);
        return true;
    }

    public function hasAlias(string $page) : bool
    {
        return array_key_exists($page, $this->_aliases);
    }

    public function getAlias(string $page) : string
    {
        return $this->_aliases[$page] ?? "";
    }
}
