<?php

/**
 * property_blogarticles actions.
 *
 * @package    amc_symfony
 * @subpackage property_blogarticles
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class property_blogarticlesActions extends autoproperty_blogarticlesActions
{
  protected function addFiltersCriteria($c)
  {
    //$c->add(PropertyTemplatePeer::PROPERTY_ID, 1);
    
    parent::addFiltersCriteria($c);
  }
}
