<?php

/**
 * ourpage actions.
 *
 * @package    apts_symfony
 * @subpackage ourpage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class matterportActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');

    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);

    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'3dtour');
    $c->setLimit(4);
    $this->tour3dphotos =  $this->property->getPropertyPhotos($c);

    $this->getResponse()->setTitle(preg_replace('/\|/',' Floor Plans | ',$this->getResponse()->getTitle())." - 3D Tour");
    $this->getResponse()->addMeta('description',$this->property->getName()." Apartments offers ".$this->property->getUnitType()." apartments in ".$this->property->getCity().", ".$this->property->getState()->getCode().". View floor plans and ".$this->property->getCity()." apartment information");
    $this->getResponse()->addMeta('keywords',$this->property->getCity()." Apartment Floor Plans, ".$this->property->getCity()." ".$this->property->getUnitType()." Apartment, ".$this->property->getUnitType()." ".$this->property->getCity().", ".$this->property->getState()->getName()." Apartment Floor Plans, ".$this->property->getName()." Apartments Floor Plans, 3D Floor Plans");




    $this->objCustomTemplate= new myCustomTemplate();
  }
  public function executeIndex(sfWebRequest $request)
  {
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
