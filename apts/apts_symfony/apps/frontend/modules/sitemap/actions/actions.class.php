<?php

/**
 * sitemap actions.
 *
 * @package    apts_symfony
 * @subpackage sitemap
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sitemapActions extends sfActions
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

  public function executeXmlSiteMap(sfRequest $request){
		$this->setLayout(false);
		$this->getResponse()->setContentType('application/xml');
  }
}

