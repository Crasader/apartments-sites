<?php

/**
 * photos actions.
 *
 * @package    apts_symfony
 * @subpackage photos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class photosActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');

    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);

    $this->getResponse()->setTitle("Apartments in ".$this->property->getCity()." ".$this->property->getState()->getName()." | Photo Gallery | ".$this->property->getName()." Apartments");
    $this->getResponse()->addMeta('description',"View Photo Gallery at ".$this->property->getName()." Apartments in ".$this->property->getCity().", ".$this->property->getState()->getName().". Online Photo Tour of ".$this->property->getName()." Apartments. ");
    $this->getResponse()->addMeta('keywords',"apartment photos, apartment photo gallery, apartment photo tour, ".$this->property->getCity()." apartment photo tour, ".$this->property->getState()->getName()." Apartment Homes photos, ".$this->property->getCity().", ".$this->property->getState()->getName()." apartments for rent photo gallery");

    //$this->getResponse()->setTitle($this->getResponse()->getTitle()." - Photos");

    $FaceBookUrl = $this->propertyTemplate->getFacebookUrl();
    $arrURLitemList = array();
    if(1 === preg_match('/\<\-multi\-\>/', $FaceBookUrl, $matches, PREG_OFFSET_CAPTURE)){
      $arrURLList = preg_split ('/$\R?^/m', $FaceBookUrl);
      array_shift($arrURLList);
      //print_r($arrURLList);
      foreach($arrURLList as $itemURL){
        //print_r($itemURL);
        $arrURLitem = explode('~',$itemURL);
        $arrURLitemList[$arrURLitem[0]] = $arrURLitem[1];
        //print_r($arrURLitem);
      }
    } else {
      $arrURLitemList['facebook'] = $FaceBookUrl;
    }
    //print_r($arrURLitemList);
    $this->arrSocialUrls = $arrURLitemList;

    $this->objCustomTemplate= new myCustomTemplate();
  }
  public function executeIndex(sfWebRequest $request)
  {

    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,array('main','3dtour'),Criteria::IN);
    $c->addAscendingOrderByColumn(PropertyPhotoPeer::DISPLAY_ORDER);
    $c->addAscendingOrderByColumn(PropertyPhotoPeer::ID);
    $this->mainPhotos =  $this->property->getPropertyPhotos($c);

    //$objAcacia = new myAcacia();

    //if($objAcacia->isAcatia($this->property->getCode())){
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acacia');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jsp');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout('amc_layout');
      $this->setTemplate('amc');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('cornerstone_layout');
      $this->setTemplate('cornerstone');
    }
  }
}
