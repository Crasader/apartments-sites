<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Legacy\Property as LegacyProperty;
use App\Property\Group as PropertyGroup;
use App\Interfaces\IFormatter;
use App\Property\Text as PropertyText;
use App\Property\Text\Type as TextType;
use App\Property\Site;
use App\Traits\Features as FeaturesTrait;
use App\Property\Apartment\Feature as ApartmentFeature;
use App\Property\Community\Feature as CommunityFeature;
use App\Property\Other\Feature as OtherFeature;

trait Features {
    protected $_featuresFormatter = null;
    protected $_featuresSectionNames = ['apartment','community','other'];
    protected $_features = [];

    public function setFeaturesFormatter(IFormatter $if){
        $this->_featuresFormatter = $if;
    }

    public function setFeaturesChunkCount(int $count){
        $this->_featuresChunkCount = $count;
    }

    public function getFeaturesChunk(string $section,int $chunkOffset) : string{
        $chunkSize = (int)floor(count($this->_features[$section]) / $this->_featuresChunkCount);
        $this->_featuresFormatter->setLineItems($this->_features[$section]);
        return implode('', array_chunk($this->_featuresFormatter->getFormattedAsArray(),$chunkSize)[$chunkOffset]);
    }

    public function loadAllFeatures(){
        $this->_features = [];
        foreach($this->_featuresSectionNames as $index => $value){
            $this->_features[$value] = $this->_getFeaturesSection($value);
        }
        return $this;
    }

    protected function _getFeaturesSection(string $section){
        switch($section){
            case 'community':
                $a = CommunityFeature::where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)->get();
                $ret = [];
                foreach($a as $index => $object){
                    $ret[] = $object->hasFeature()->get()[0]->name;
                }
                return $ret;
            case 'other':
                $a = OtherFeature::where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)->get();
                $ret = [];
                foreach($a as $index => $object){
                    $ret[] = $object->hasFeature()->get()[0]->name;
                }
                return $ret;
            case 'apartment':
                $a = ApartmentFeature::where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)->get();
                $ret = [];
                foreach($a as $index => $object){
                    $ret[] = $object->hasFeature()->get()[0]->name;
                }
                return $ret;
            default:
                return null;
        }
    }
}
