<?php
class customLookFilter extends sfFilter
{
  public function execute($filterChain)
  {
    // Execute this filter only once
    if ($this->isFirstCall()){


      // Filters don't have direct access to the request and user objects.
      // You will need to use the context object to get them
      $request = $this->getContext()->getRequest();
      $user    = $this->getContext()->getUser();
      if(preg_match('/(.*)\.apt\.amcapartments\.com/',$_SERVER['HTTP_HOST'],$matches)){
      	//print_r($matches);
      	//echo md5('silent redirect for amc aparment mangers4/16/2011027SCW');
      	$cfltr1 = New Criteria();
	      $cfltr1->add(PropertyPeer::CODE, $matches[1]);
	      //$cfltr1->add(PropertyPeer::STATUS_ID, 2);
			  $property = PropertyPeer::doSelectOne($cfltr1);
			  //var_dump($property);
			  //exit;
			  //var_dump($cfltr);
			/*Comment out for Dev  
      } else if(!preg_match('/^www\./',$_SERVER['HTTP_HOST'],$matches)){
      	//$this->getContext()->getResponse()->setStatusCode(301);
      	return $this->getContext()->getController()->redirect("http://www.".$_SERVER['HTTP_HOST'],0,301);
      	//var_dump($matches);
        exit;*/
      } else {
	      $cfltr = New Criteria();
	      $cfltr->add(PropertyPeer::URL, '%'.$_SERVER['HTTP_HOST'].'%', Criteria::LIKE);
	      $cfltr->add(PropertyPeer::STATUS_ID, 2);
			  $property = PropertyPeer::doSelectOne($cfltr);
			  //var_dump($property);
			  //exit;
      }
		  $arrProperty = array();
		  if($property){
		    //foreach($properties as $property){
		  	  $arrProperty[]= $property->getId();
		  	  //var_dump($arrProperty);
		    //}
		  } else {

			  if($this->getContext()->getModuleName() == 'silent_login'){
	    		$key = $this->getContext()->getRequest()->getParameter('k');
	    		$code = $this->getContext()->getRequest()->getParameter('c');
	    		$cfltr2 = New Criteria();
	      	$cfltr2->add(PropertyPeer::CODE, $code);
	      	$cfltr2->add(PropertyPeer::STATUS_ID, 2);
			  	$property = PropertyPeer::doSelectOne($cfltr2);


			  	//silent login for amc aparment mangers1/13/201106COV = b8d67d5e0856c067ef002686c07bb66a
			  	if($property && $key === md5('silent login for amc aparment mangers'.date('n/j/Y').$property->getCode()) ){
			  		$rdphrase = md5('silent redirect for amc aparment mangers'.date('Y-m-d').$property->getCode());
			  		$c = new Criteria();
				    $c->add(PropertyTemplatePeer::PROPERTY_ID,$property->getId());
				    $propertyTemplate = PropertyTemplatePeer::doSelectOne($c);
				    if($propertyTemplate){
					  	if(preg_match('/^(http\:\/\/[0-9a-zA-Z.\-]+).*$/',$property->getUrl(),$matches)){
					  		return $this->getContext()->getController()->redirect($matches[1]."/backend.php/silent_login?k=$rdphrase");
					  		//return $this->getContext()->getController()->redirect("http://".$property->getCode().".apt.ubwest.com/backend_dev.php/silent_login?k=$rdphrase");
					  	} else {
					  		return $this->getContext()->getController()->redirect('http://www.amcapartments.com');
					  	}
				    } else {
				    	return $this->getContext()->getController()->redirect("http://".$property->getCode().".apt.amcapartments.com/backend.php/silent_login?k=$rdphrase");
				    }
			  	}


	    	}
	    	/*Comment for Dev
		  	return $this->getContext()->getController()->redirect('http://www.amcapartments.com');
		  	*/
		  	
		  	//$arrProperty = array(1);
		  	//$property = PropertyPeer::retrieveByPk(1);

		  }
      //$property = PropertyPeer::retrieveByPk(1);
      //print_r($property)
      //foreach($property->getPropertyTemplates() as $propertyTemplate){
      //  $propertyTemplate = $propertyTemplate;
      //}
      $this->getContext()->getUser()->setAttribute('poperty',$arrProperty);
      $this->getContext()->getResponse()->setTitle($property->getCity()." Apartments | ".$property->getName()." Apartments | Apartments ".$property->getCity().", ".$property->getState()->getCode());
      $this->getContext()->getResponse()->addMeta("description",$property->getCity()." Apartment Complex - ".$property->getName()." Apartments - See Virtual Tour, Photos and Floor Plan Information");
      //$this->getContext()->getResponse()->addMeta("keywords",$property->getCity()." Apartments, Apartments ".$property->getCity().", ".$property->getState()->getName()." Apartments, ".$property->getName().", Apartments in ".$property->getState()->getName());
      $this->getContext()->getResponse()->addMeta("keywords",$property->getCity()." Apartments, Apartments ".$property->getCity().", ".$property->getName().", ".$property->getCity()." Rental Apartments, ".$property->getCity()." Apts, Apartment Community ".$property->getCity().", ".$property->getCity()." Apartment Complex, Apts ".$property->getCity()." ".$property->getState()->getCode());
      /*for ($i=0; $i < $this->getContext()->getActionStack()->getSize(); $i++) {
        //$this->getContext()->getActionStack()->getEntry($i)->getActionInstance()->property = $property;
        //$this->getContext()->getActionStack()->getEntry($i)->getActionInstance()->propertyTemplate = $propertyTemplate;
        $this->getContext()->getActionStack()->getEntry($i)->getActionInstance()->arrPropertyIDs = array("1");
      }*/

    }

    // Execute next filter
    $filterChain->execute();
  }
}
