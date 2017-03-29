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
    
    $this->objCustomTemplate= new myCustomTemplate();

  }
  public function executeIndex(sfWebRequest $request)
  {
  	$c = new Criteria();
		$c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
		$c->add(PhotoTypePeer::NAME,'community');
		$this->communityPhotos =  $this->property->getPropertyPhotos($c);

		$c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'main');
    $this->mainPhotos =  $this->property->getPropertyPhotos($c);



  	//echo $request->getHttpHeader('User-Agent');
  	//exit;

		if (preg_match('/Mobile|Android/i', $request->getHttpHeader('User-Agent'))){
			$this->forward('default', 'mobile');
		} else {

			if($this->objCustomTemplate->isAcatia($this->property->getCode())){
				$c = new Criteria();
				$c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
				$c->add(PhotoTypePeer::NAME,'acaciahome');
				$c->setLimit(3);
				$this->acaciahomePhotos =  $this->property->getPropertyPhotos($c);

				$this->setLayout('home_acacia_layout');
				$this->setTemplate('acacia');
			} elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
				$c = new Criteria();
				$c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
				$c->add(PhotoTypePeer::NAME,'acaciahome');
				$c->setLimit(3);
				$homePhotos =  $this->property->getPropertyPhotos($c);
				$arrhomePhotos = array();
				foreach($homePhotos as $photo){
					$arrhomePhotos[] = $photo->getImage();
				}
				$this->arrhomePhotos = $arrhomePhotos;

				$this->setLayout('home_jsp_layout');
				$this->setTemplate('jsp');
			} else {
				$this->setLayout('home_layout');
			}
		}


    //$this->logMessage(print_r($IntPropertyId,true),'warning');
    //print_r($request->getHttpHeader('User-Agent'));



    //return sfView::NONE;
  }
  public function executeMobile(sfWebRequest $request)
  {

		if($this->objCustomTemplate->isAcatia($this->property->getCode())){
			$c = new Criteria();
			$c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
			$c->add(PhotoTypePeer::NAME,'acaciahome');
			$c->setLimit(3);
			$this->acaciahomePhotos =  $this->property->getPropertyPhotos($c);

			$this->setLayout('acaciamobile_layout');
			$this->setTemplate('acaciamobile');
		} else {
			$this->setLayout('mobile_layout');
		}


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
