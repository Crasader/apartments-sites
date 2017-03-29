<?php

/**
 * blog actions.
 *
 * @package    apts_symfony
 * @subpackage blog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class blogActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');
    
    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);
    
    
  }
  public function executeRead(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(PropertyBlogarticlePeer::PROPERTY_ID,$this->getUser()->getAttribute('poperty'),Criteria::IN);
    $c->add(PropertyBlogarticlePeer::PERMA_LINK,$request->getParameter('permalink'),Criteria::LIKE);
    $this->propertyBlogarticle = PropertyBlogarticlePeer::doSelectOne($c);
    
    if(!$this->propertyBlogarticle){
    	$this->redirect('default/index');
    }
    
    $this->getResponse()->setTitle($this->getResponse()->getTitle()." - ". $this->propertyBlogarticle->getTitle());
  }
}
