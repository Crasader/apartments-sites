<?php

/**
 * property_photos actions.
 *
 * @package    amc_symfony
 * @subpackage property_photos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class property_photosActions extends autoproperty_photosActions
{
  protected function updatePropertyPhotoFromRequest(){
    $property_photo = $this->getRequestParameter('property_photo');
    
    $thumbnails[]=array('dir' => '177', 'width' => 177);
    $thumbnails[]=array('dir' => '258', 'width' => 258);
    
    if (!$this->getRequest()->hasErrors() && isset($property_photo['image_remove'])){
      foreach ($thumbnails as $thumbParam){
        $currentFile = sfConfig::get('sf_upload_dir')."/photos/".$thumbParam['dir'].'/'.$this->property_floorplan->getImage();

        if (is_file($currentFile)) unlink($currentFile);
      }
    }
    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_photo[image]')){
      $fileName=$this->property_photo->getImage();
      foreach ($thumbnails as $thumbParam)
      {
        $currentFile = sfConfig::get('sf_upload_dir')."/photos/".$thumbParam['dir'].'/'.$fileName;
        if (is_file($currentFile)) unlink($currentFile);
      }
    }
    
    parent::updatePropertyPhotoFromRequest();
    
    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_photo[image]')){
      $fileName=$this->property_photo->getImage();
      foreach ($thumbnails as $thumbParam)
      {
        $thumbnail = new sfThumbnail($thumbParam['width'], null,true,false); 
        $thumbnail->loadFile(sfConfig::get('sf_upload_dir')."/photos/".$fileName);
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/photos/'.$thumbParam['dir'].'/'.$fileName, 'image/jpeg');
      }
      $thumbnail = new sfThumbnail('800', null,true,false);
      $thumbnail->loadFile(sfConfig::get('sf_upload_dir')."/photos/".$fileName);
      $thumbnail->save(sfConfig::get('sf_upload_dir').'/photos/'.$fileName, 'image/jpeg');
    }
  }
}
