<?php

/**
 * residents actions.
 *
 * @package    amc_symfony
 * @subpackage residents
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class residentsActions extends autoresidentsActions
{
  protected function addFiltersCriteria($c)
  {
   /* for ($i=0; $i < $this->getContext()->getActionStack()->getSize(); $i++) {
      if(isset($this->getContext()->getActionStack()->getEntry($i)->getActionInstance()->arrPropertyIDs)){
        $arrPropertyIDs = $this->getContext()->getActionStack()->getEntry($i)->getActionInstance()->arrPropertyIDs;
      }
    }*/
    $c->add(ResidentPeer::PROPERTY_ID, $this->getContext()->getUser()->getAttribute('poperty'), Criteria::IN);
    
    parent::addFiltersCriteria($c);
  }
}
