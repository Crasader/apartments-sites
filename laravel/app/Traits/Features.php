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
use App\Traits\TextCache;
use App\Util\Util;
trait Features {
    use TextCache;

    protected $_featuresFormatter = null;
    protected $_featuresSectionNames = ['apartment','community','other'];
    protected $_features = [];
    protected $_featuresLimit = 0;

    public function setFeaturesLimit(array $limits){
        $this->_featuresLimit = $limits;
    }

    public function setFeaturesFormatter(IFormatter $if){
        $this->_featuresFormatter = $if;
    }

    public function setFeaturesChunkCount(int $count){
        $this->_featuresChunkCount = $count;
    }

    public function getFeaturesChunk(string $section,int $chunkOffset,string $page='home') : string{
        $foo = $this;
        return Util::redisFetchOrUpdate($page . '_' . $section . '_' . $chunkOffset,function() use($foo,$section,$chunkOffset) {
            $chunkSize = (int)ceil(count($this->_features[$section]) / $this->_featuresChunkCount);
            if($this->_featuresFormatter){
                $this->_featuresFormatter->setLineItems($this->_features[$section]);
                $arr = $this->_featuresFormatter->getFormattedAsArray();
                if(count($arr) == 0){
                    return '';
                }
                return implode('', array_chunk($arr,$chunkSize)[$chunkOffset]);
            }else{
                $arr = $this->_features[$section];
                if(count($arr) == 0){
                    return '';
                }
                return implode('',array_chunk($arr,$chunkSite)[$chunkOffset]);
            }
        });
    }

    public function loadSelectedFeatures(array $sections){
        $this->_features = [];
        foreach($sections as $index => $value){
            $this->_features[$value] = $this->_getFeaturesSection($value);
        }
        return $this;
    }

    public function getEntireFeaturesSection(string $section){
        if(!isset($this->_features[$section])){
            return null;
        }
        if($this->_featuresFormatter){
            $this->_featuresFormatter->setLineItems($this->_features[$section]);
            return $this->_featuresFormatter->getFormattedAsArray();
        }else{
            return $this->_features[$section];
        }
    }

    public function loadAllFeatures(){
        $this->_features = [];
        foreach($this->_featuresSectionNames as $index => $value){
            $this->_features[$value] = $this->_getFeaturesSection($value);
        }
        return $this;
    }

    protected function _getFeaturesSection(string $section){
        return Util::redisFetchOrUpdate('loaded_features_section_' . $section,function() use($section) {
        switch($section){
            case 'community':
                $builder = CommunityFeature::where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
                    ->orderBy('display_order','asc');
                if(isset($this->_featuresLimit['community'])){
                    $builder->limit($this->_featuresLimit['community']);
                }
                $ids = [];
                foreach($builder->get() as $index => $object){
                    $ids[] = $object->community_feature_id;
                }
                return \App\Community\Feature::select(['name'])->wherein('id',$ids)->pluck('name')->toArray();
            case 'other':
                $builder = OtherFeature::where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
                    ->orderBy('display_order','asc');
                if(isset($this->_featuresLimit['other'])){
                    $builder->limit($this->_featuresLimit['other']);
                }
                $ids = [];
                foreach($builder->get() as $index => $object){
                    $ids[] = $object->other_feature_id;
                }
                return \App\Other\Feature::select(['name'])->wherein('id',$ids)->pluck('name')->toArray();
            case 'apartment':
                $builder = ApartmentFeature::where('property_id',Site::$instance->getEntity()->fk_legacy_property_id)
                    ->orderBy('display_order','asc');
                \Debugbar::info("Features limit: ");
                \Debugbar::info($this->_featuresLimit);
                if(isset($this->_featuresLimit['apartment'])){
                    $builder->limit($this->_featuresLimit['apartment']);
                }
                $ids = [];
                foreach($builder->get() as $index => $object){
                    $ids[] = $object->apartment_feature_id;
                }
                \Debugbar::info(count($builder->get()));
                return \App\Apartment\Feature::select(['name'])->wherein('id',$ids)->pluck('name')->toArray();
            default:
                return null;
        }
        },true);
    }
}
