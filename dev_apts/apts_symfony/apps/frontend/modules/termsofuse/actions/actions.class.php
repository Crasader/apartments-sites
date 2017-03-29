<?php

/**
 * photos actions.
 *
 * @package    apts_symfony
 * @subpackage terms of use
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class termsofuseActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');

    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);

    $this->getResponse()->setTitle($this->getResponse()->getTitle()." - Terms of Use");
    
    $this->objCustomTemplate= new myCustomTemplate();
  }
  public function executeIndex(sfWebRequest $request)
  {

    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'main');
    $this->mainPhotos =  $this->property->getPropertyPhotos($c);

    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
  		//$this->forward('default', 'acacia');
  		$this->setLayout('acacia_layout');
  		$this->setTemplate('acacia');
  	} elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
  		$this->setLayout('jsp_layout');
			$this->setTemplate('jsp');
  	}

  }
}
