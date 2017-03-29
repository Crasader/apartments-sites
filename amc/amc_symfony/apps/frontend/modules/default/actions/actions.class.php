<?php

/**
 * default actions.
 *
 * @package    amc_symfony
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class defaultActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(PropertyPeer::FEATURED, '1');
    $c->add(PropertyPeer::STATUS_ID, '2');
    $c->addAscendingOrderByColumn(PropertyPeer::NAME);
    $c->setLimit(2);
    $this->properties = PropertyPeer::doSelect($c);
  }
	public function executeError404(sfWebRequest $request)
  {
  	$this->forward('default', 'index');
  }
}
