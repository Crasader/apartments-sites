<?php

/**
 * default actions.
 *
 * @package    apts_symfony
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class defaultActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');

    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);

    //$this->getResponse()->setTitle($this->getResponse()->getTitle()." - Home");
  }
  public function executeIndex(sfWebRequest $request)
  {
  	if (preg_match('/Mobile/', $request->getHttpHeader('User-Agent'))){
    	$this->forward('default', 'mobile');
    } else {
    	$this->setLayout('home_layout');
    }
		$c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'community');
    $this->communityPhotos =  $this->property->getPropertyPhotos($c);

    //$this->logMessage(print_r($IntPropertyId,true),'warning');
    //print_r($request->getHttpHeader('User-Agent'));

    
    
    //return sfView::NONE;
  }
  public function executeMobile(sfWebRequest $request)
  {
  	$this->setLayout('mobile_layout');
  	
  	$c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'community');
    $this->communityPhotos =  $this->property->getPropertyPhotos($c);
  	
  	
  	$c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'main');
    $this->mainPhotos =  $this->property->getPropertyPhotos($c);
    

		$address = urlencode($this->property->getAddress().", ".$this->property->getCity().", ".$this->property->getState()->getCode().", ".$this->property->getZip());
		$request = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=" . $address . "&sensor=false");
		//print_r($request);
		$this->jsonAddress = json_decode($request, true);
  }
}
