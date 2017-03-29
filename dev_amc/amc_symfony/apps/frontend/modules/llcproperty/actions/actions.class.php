<?php

/**
 * property actions.
 *
 * @package    amc_symfony
 * @subpackage property
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class llcpropertyActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('property', 'list');
    
    
  }
  public function executeList(sfWebRequest $request)
  {
    $this->setTemplate('index');
    if($request->getParameter('view') == 'scode'){
      $this->property = PropertyPeer::retrieveByPk($request->getParameter('id'));
      $this->setLayout(false);
      $this->setTemplate('scdetail');
      $this->getResponse()->addStylesheet('scodeiframe', 'last');
      
    } elseif($request->getParameter('view') == 'detail'){
      $this->property = PropertyPeer::retrieveByPk($request->getParameter('id'));
      $this->setTemplate('listdetail');
      
    } elseif($request->getParameter('view') == 'state'){
      $c = new Criteria();
      $c->add(StatePeer::CODE, $request->getParameter('code'));
      $c->addJoin(StatePeer::ID, PropertyPeer::STATE_ID);
      $c->add(PropertyPeer::STATUS_ID, '2');
      $c->addAscendingOrderByColumn(PropertyPeer::NAME);
      $this->properties = PropertyPeer::doSelect($c);
      
      
      $c = new Criteria();
      $c->add(StatePeer::CODE, $request->getParameter('code'));
      $state = StatePeer::doSelectOne($c);
      $this->title = $state->getName();
    } elseif($request->getParameter('view') == 'city'){
      $c = new Criteria();
      $c->add(PropertyPeer::CITY, $request->getParameter('code'));
      $c->add(PropertyPeer::STATUS_ID, '2');
      $c->addAscendingOrderByColumn(PropertyPeer::NAME);
      $this->properties = PropertyPeer::doSelect($c);
      
      $this->title = $request->getParameter('code');
    } else {
      $c = new Criteria();
      $c->add(PropertyPeer::STATUS_ID, '2');
      $c->addAscendingOrderByColumn(PropertyPeer::NAME);
      $this->properties = PropertyPeer::doSelect($c);
      
      $this->title = 'All';
    }
  }  
  public function executeMap(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
}
