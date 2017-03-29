<?php

/**
 * properties actions.
 *
 * @package    amc_symfony
 * @subpackage properties
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class propertiesActions extends autopropertiesActions
{
	protected function addFiltersCriteria($c)
  {
    //$c->add(PropertyTemplatePeer::PROPERTY_ID, 1);
    
    parent::addFiltersCriteria($c);
  }
}
