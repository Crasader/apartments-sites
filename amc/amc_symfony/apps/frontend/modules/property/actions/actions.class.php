<?php

/**
 * property actions.
 *
 * @package    amc_symfony
 * @subpackage property
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class propertyActions extends sfActions
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
    if($request->getParameter('view') == 'detail'){
    	$c = new Criteria();
      $c->add(PropertyPeer::ID, $request->getParameter('id'));
      $c->add(PropertyPeer::STATUS_ID, 2);
      $c->add(PropertyPeer::CORPORATE_GROUP_ID, 1);
      $this->property = PropertyPeer::doSelectOne($c);
      if($this->property){

				$this->setTemplate('listdetail');
				$this->getResponse()->setTitle($this->property->getCity()." Apartments | ".$this->property->getName()." Apartments | Apartments ".$this->property->getCity().", ".$this->property->getState()->getCode());
				$this->getResponse()->addMeta("description",$this->property->getCity(). " Apartment Complex - ".$this->property->getName()." - See Virtual Tour, Photos and Floor Plan Informatio");
				$this->getResponse()->addMeta("keywords",$this->property->getCity()." Apartments, Apartments ".$this->property->getCity().", ".$this->property->getState()->getName()." Apartments, ".$this->property->getName().", Apartments  in ".$this->property->getState()->getName());
				//<title>Phoenix Apartments | Allegro At Foothills Gateway Apartments | Apartments Phoenix, AZ</title>
				//$property->getCity()." Apartments | ".$property->getName()." Apartments | Apartments ".$property->getCity().", ".$property->getState()->getCode());
				$this->title = $this->property->getName();
      } else {
    		$this->redirect('default/index',404);
    		//$this->forward404('default/error404');
    	}
    } elseif($request->getParameter('view') == 'state'){
      $c = new Criteria();
      $c->add(StatePeer::CODE, $request->getParameter('code'));
      $c->addJoin(StatePeer::ID, PropertyPeer::STATE_ID);
      $c->add(PropertyPeer::STATUS_ID, '2');
      $c->add(PropertyPeer::CORPORATE_GROUP_ID, 1);
      $c->addAscendingOrderByColumn(PropertyPeer::NAME);
      $this->properties = PropertyPeer::doSelect($c);
    
      $c = new Criteria();
      $c->add(StatePeer::CODE, $request->getParameter('code'));
      $state = StatePeer::doSelectOne($c);
      $this->title = $state->getName();
      $this->stateCode = $request->getParameter('code');
      $this->getResponse()->setTitle($state->getName()." Apartments | Apartments ".$state->getName()." | Apartment
Complexes in ".$state->getName()." | ".$state->getName()." Rentals ");
      $this->getResponse()->addMeta("description","Apartments, Rentals and Apartment Complexes in ".$state->getName()." - See Virtual Tour, Photos and Floor Plan Information");
      $this->getResponse()->addMeta("keywords",$state->getName()." Apartments, Apartments in ".$state->getName().",  ".$state->getName()." Apartment Complexes, ".$state->getName()." Floor Plans, ".$state->getName()." Photos, Rentals in ".$state->getName());
      //Apartments, Rentals and Apartment Complexes in Colorado - See Virtual Tour, Photos and Floor Plan Information
      //Colorado Apartments, Apartments in Colorado,  Colorado Apartment Complexes, Colorado Floor Plans, Colorado Photos, Rentals in Colorado
    } elseif($request->getParameter('view') == 'city'){
      $c = new Criteria();
      $c->add(PropertyPeer::CITY, $request->getParameter('code'));
      $c->add(PropertyPeer::STATUS_ID, '2');
      $c->add(PropertyPeer::CORPORATE_GROUP_ID, 1);
      $c->addAscendingOrderByColumn(PropertyPeer::NAME);
      $this->properties = PropertyPeer::doSelect($c);
      
      $this->title = $request->getParameter('code');
      $this->getResponse()->setTitle($request->getParameter('code')." Apartments | Apartments ".$request->getParameter('code'));
    } elseif($request->getParameter('view') == 'zip'){
    	$zcode = preg_replace('/[^0-9]/','',$request->getParameter('zcode'));
    	$radius = preg_replace('/[^0-9]/','',$request->getParameter('radius'));
    	
    	if(!empty($zcode) && !empty($radius)){
    	$this->setTemplate('zip');
      $c = new Criteria();
      $c->add(ZipCodePeer::ZIP_CODE, $request->getParameter('zcode'));
      $this->zip_code = ZipCodePeer::doSelectOne($c);
      
      $connection = Propel::getConnection();
			$query = 'SELECT b.distance,c.name as state_name,c.code as state_code,a.* 
			FROM property a,( 
			SELECT zip_code, ( 3959 * acos( cos( radians( ? ) ) * cos( radians( lat ) ) * cos( radians( `long` ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( lat ) ) ) ) AS distance
			FROM zip_code HAVING distance <= ? 
			ORDER BY distance) b, state c
			WHERE a.zip = b.zip_code
			AND c.id = a.state_id
			AND a.status_id = 2
      AND a.corporate_group_id = 1
			ORDER BY b.distance';
			$statement = $connection->prepare($query);
			$statement->bindValue(1, $this->zip_code->getLat());
			$statement->bindValue(2, $this->zip_code->getLong());
			$statement->bindValue(3, $this->zip_code->getLat());
			$statement->bindValue(4, $request->getParameter('radius'));
			
			$statement->execute();
			$resultset = $statement->fetchAll(PDO::FETCH_OBJ);
			//print_r($resultset);
			$this->properties = $resultset;
			      
      $this->title = "within ".$request->getParameter('radius')." miles of ".$request->getParameter('zcode');
      $this->getResponse()->setTitle($request->getParameter('code')." Apartments | Apartments ".$request->getParameter('code'));
    	} else {
    		$this->redirect('default/index');
    	}
    } else {
      $c = new Criteria();
      $c->add(PropertyPeer::STATUS_ID, '2');
      $c->addAscendingOrderByColumn(PropertyPeer::NAME);
      $c->add(PropertyPeer::CORPORATE_GROUP_ID, 1);
      $this->properties = PropertyPeer::doSelect($c);
      
      $this->title = 'All';
      //$this->getResponse()->setTitle("All Apartments");
    }
  }  
  public function executeMap(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
}
