<?php

/**
 * property_floorplans actions.
 *
 * @package    amc_symfony
 * @subpackage property_floorplans
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class property_floorplansActions extends autoproperty_floorplansActions
{
  protected function updatePropertyFloorplanFromRequest(){
    $property_floorplan = $this->getRequestParameter('property_floorplan');
    
    $thumbnails[]=array('dir' => '169', 'width' => 169);

    
    if (!$this->getRequest()->hasErrors() && isset($property_floorplan['image_remove'])){
      foreach ($thumbnails as $thumbParam){
        $currentFile = sfConfig::get('sf_upload_dir')."/floorplans/".$thumbParam['dir'].'/'.$this->property_floorplan->getImage();

        if (is_file($currentFile)) unlink($currentFile);
      }
    }
    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_floorplan[image]')){
      $fileName=$this->property_floorplan->getImage();
      foreach ($thumbnails as $thumbParam)
      {
        $currentFile = sfConfig::get('sf_upload_dir')."/floorplans/".$thumbParam['dir'].'/'.$fileName;
        if (is_file($currentFile)) unlink($currentFile);
      }
    }
    
    parent::updatePropertyFloorplanFromRequest();
    
    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_floorplan[image]')){
      $fileName=$this->property_floorplan->getImage();
      foreach ($thumbnails as $thumbParam)
      {
        $thumbnail = new sfThumbnail($thumbParam['width'], null,true,false); 
        $thumbnail->loadFile(sfConfig::get('sf_upload_dir')."/floorplans/".$fileName);
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/floorplans/'.$thumbParam['dir'].'/'.$fileName, 'image/jpeg');
      }
    }
  }
}
