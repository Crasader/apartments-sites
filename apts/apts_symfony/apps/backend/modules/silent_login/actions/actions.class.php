<?php

class silent_loginActions extends sfActions
{
  public function executeIndex($request)
  {

    if ($request->isMethod('get')){

    	$IntPropertyId = $this->getUser()->getAttribute('poperty');

    	//silent redirect for amc aparment mangers1/13/201106COV = f20682bf8ed803819abfafe480a78981
    	//06COV = 7b16539a2ab069066b86cbf9536f2f1c
    	//http://apt.ubwest.com/backend.php/silent_login?k=656d8bf053e6ddea37f389d8bd946e6a&c=27SCW

      $property = PropertyPeer::retrieveByPk($IntPropertyId[0]);
      if ($property !== NULL){
	    	$strKeyPhrase = 'silent redirect for amc aparment mangers';
	    	$this->strKey = md5($strKeyPhrase.date('Y-m-d').$property->getCode());
	    	$this->strGetKey = $request->getParameter('k');
	    	$this->strGetCode = $request->getParameter('c');
	    	$this->strPropertyName = $property->getName()." - ".$property->getCode();

		    if($this->strKey === $this->strGetKey) {
		    	$this->getUser()->setAuthenticated(true);
		    	$this->getUser()->addCredential('manager');
		    	$this->redirect('default/index');
		    } else {
		    	$this->getUser()->setAuthenticated(false);
		    	$this->getUser()->clearCredentials();
		      $this->redirect('default/login');
		    }
      } else {
      	$this->getUser()->setAuthenticated(false);
		    $this->getUser()->clearCredentials();
      	$this->redirect('default/login');
      }
    } else {
    	$this->getUser()->setAuthenticated(false);
		  $this->getUser()->clearCredentials();
      $this->redirect('default/login');
    }
  }
}