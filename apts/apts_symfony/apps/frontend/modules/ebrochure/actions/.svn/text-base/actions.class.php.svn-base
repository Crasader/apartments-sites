<?php

/**
 * floorplans actions.
 *
 * @package    apts_symfony
 * @subpackage floorplans
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class floorplansActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');
    
    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);
    
    $this->getResponse()->setTitle(preg_replace('/\|/',' Floor Plans | ',$this->getResponse()->getTitle())." - Floor Plans");
    $this->getResponse()->addMeta('description',$this->property->getName()." Apartments offers ".$this->property->getUnitType()." apartments in ".$this->property->getCity().", ".$this->property->getState()->getCode().". View floor plans and ".$this->property->getCity()." apartment information");
    $this->getResponse()->addMeta('keywords',$this->property->getCity()." Apartment Floor Plans, ".$this->property->getCity()." ".$this->property->getUnitType()." Apartment, ".$this->property->getUnitType()." ".$this->property->getCity().", ".$this->property->getState()->getName()." Apartment Floor Plans, ".$this->property->getName()." Apartments Floor Plans, 3D Floor Plans");
    /*
    $this->getContext()->getResponse()->addMeta("description",$property->getCity()." Apartment Complex - ".$property->getName()." Apartments - See Virtual Tour, Photos and Floor Plan Information");
    $this->getContext()->getResponse()->addMeta("keywords",$property->getCity()." Apartments, Apartments ".$property->getCity().", ".$property->getState()->getName()." Apartments, ".$property->getName().", Apartments in ".$property->getState()->getName());

    <meta name="description" content="Brookwood Park Apartments offers 2 bedroom apartments in West Valley City, UT. View floor plans and West Valley City apartment information" />

    <meta name="keywords" content="West Valley City Apartment Floor Plans, West Valley City 2 Bedroom Apartment, 2 Bedroom Apartments West Valley City, Utah Apartment Floor Plans, Brookwood Park Apartments Floor Plans, 3D Floor Plans " />
    */
  }
  public function executeIndex(sfWebRequest $request)
  {

  }
}
