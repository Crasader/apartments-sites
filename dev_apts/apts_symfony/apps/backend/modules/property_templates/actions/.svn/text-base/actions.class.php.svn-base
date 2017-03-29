<?php

/**
 * property_templates actions.
 *
 * @package    apts_symfony
 * @subpackage property_templates
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class property_templatesActions extends autoproperty_templatesActions
{
//	public function executeEdit($request)
//	{
//		print_r($_FILES);
//		exit;
//	}
  protected function addFiltersCriteria($c)
  {
    /*for ($i=0; $i < $this->getContext()->getActionStack()->getSize(); $i++) {
      if(isset($this->getContext()->getActionStack()->getEntry($i)->getActionInstance()->arrPropertyIDs)){
        $arrPropertyIDs = $this->getContext()->getActionStack()->getEntry($i)->getActionInstance()->arrPropertyIDs;
      }
    }*/
    $c->add(PropertyTemplatePeer::PROPERTY_ID, $this->getContext()->getUser()->getAttribute('poperty'), Criteria::IN);
    
    parent::addFiltersCriteria($c);
  }
  
  /*public function executeIndex($request)
  {
    $this->logMessage(print_r($this->arrPropertyIDs,true),'warning');
    parent::executeIndex($request);
  }*/

}
