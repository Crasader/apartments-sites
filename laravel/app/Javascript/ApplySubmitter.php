<?php
namespace App\Javascript;

use Illuminate\Database\Eloquent\Model;
use App\Util\Util;

class ApplySubmitter extends Model
{
    protected $_collection = [];
    protected $_generatedIDs = [];
    public function setCollection(array $objects)
    {
        $this->_collection = $objects;
    }

    public function generateIDs()
    {
        /* Iterated through the collection and generates uniqids that
         * will be used to identify each member in the collection
         */
        foreach ($this->_collection as $key => $object) {
            $this->_generatedIDs[$key . '_' . uniqid()] = $key;
        }

    }

    public function getGenId($key)
    {
        foreach ($this->_generatedIDs as $uniq => $collectionKey) {
            if ($collectionKey == $key) {
                return $uniq;
            }
        }
        return null;
    }

    public function getByGenId(string $genId)
    {
        return $this->_collection[$this->_generatedIDs[$genId]];
    }

    public function dumpJSON()
    {
        $tempCollection = [];
        foreach ($this->_generatedIDs as $uniqId => $collectionKey) {
            $tempCollection[$uniqId] = $this->_collection[$collectionKey];
        }
        return json_encode($tempCollection);
    }
}
