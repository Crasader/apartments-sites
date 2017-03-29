<?php

/**
 * highgroveWildreed actions.
 *
 * @package    amc_symfony
 * @subpackage highgroveWildreed
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class highgrovewildreedActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    $this->forward('apartmentsineverett','index');
    //$this->setLayout('apartmentsineverett');
		//$this->setTemplate('acaciamobile');
  }
}
