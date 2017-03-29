<?php

/**
 * ourpage actions.
 *
 * @package    apts_symfony
 * @subpackage ourpage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class ourpageActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');
    
    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);
    
    $this->getResponse()->setTitle($this->getResponse()->getTitle()." - ". $this->propertyTemplate->getCustomPageName());
  }
  public function executeIndex(sfWebRequest $request)
  {
    
  }
}
