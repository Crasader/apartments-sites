<?php

/**
 * floorplans actions.
 *
 * @package    apts_symfony
 * @subpackage floorplans
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class floorplansActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');

    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);

    $this->getResponse()->setTitle(preg_replace('/\|/',' Floor Plans | ',$this->getResponse()->getTitle())." - Floor Plans");
    $this->getResponse()->addMeta('description',$this->property->getName()." Apartments offers ".$this->property->getUnitType()." apartments in ".$this->property->getCity().", ".$this->property->getState()->getCode().". View floor plans and ".$this->property->getCity()." apartment information");
    $this->getResponse()->addMeta('keywords',$this->property->getCity()." Apartment Floor Plans, ".$this->property->getCity()." ".$this->property->getUnitType()." Apartment, ".$this->property->getUnitType()." ".$this->property->getCity().", ".$this->property->getState()->getName()." Apartment Floor Plans, ".$this->property->getName()." Apartments Floor Plans, 3D Floor Plans");
    /*
    $this->getContext()->getResponse()->addMeta("description",$property->getCity()." Apartment Complex - ".$property->getName()." Apartments - See Virtual Tour, Photos and Floor Plan Information");
    $this->getContext()->getResponse()->addMeta("keywords",$property->getCity()." Apartments, Apartments ".$property->getCity().", ".$property->getState()->getName()." Apartments, ".$property->getName().", Apartments in ".$property->getState()->getName());

    <meta name="description" content="Brookwood Park Apartments offers 2 bedroom apartments in West Valley City, UT. View floor plans and West Valley City apartment information" />

    <meta name="keywords" content="West Valley City Apartment Floor Plans, West Valley City 2 Bedroom Apartment, 2 Bedroom Apartments West Valley City, Utah Apartment Floor Plans, Brookwood Park Apartments Floor Plans, 3D Floor Plans " />
    */

    $FaceBookUrl = $this->propertyTemplate->getFacebookUrl();
    $arrURLitemList = array();
    if(1 === preg_match('/\<\-multi\-\>/', $FaceBookUrl, $matches, PREG_OFFSET_CAPTURE)){
      $arrURLList = preg_split ('/$\R?^/m', $FaceBookUrl);
      array_shift($arrURLList);
      //print_r($arrURLList);
      foreach($arrURLList as $itemURL){
        //print_r($itemURL);
        $arrURLitem = explode('~',$itemURL);
        $arrURLitemList[$arrURLitem[0]] = $arrURLitem[1];
        //print_r($arrURLitem);
      }
    } else {
      $arrURLitemList['facebook'] = $FaceBookUrl;
    }
    //print_r($arrURLitemList);
    $this->arrSocialUrls = $arrURLitemList;

    $this->objCustomTemplate= new myCustomTemplate();

    $arrFloorPlans = array();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(PropertyFloorPlanPeer::DISPLAY_ORDER);
    $this->mainFloorPlans =  $this->property->getPropertyFloorPlans($c);

    foreach($this->mainFloorPlans as $floorplan){
      $arrFloorPlans[$floorplan->getID()] = array('floorplan' => array('name' => $floorplan->getName(),'squarefeet' => $floorplan->getSquareFeet(),'bedrooms' => $floorplan->getBedrooms(),'bathrooms' => $floorplan->getBathrooms(),'deposit' => $floorplan->getDeposit(),'price' => $floorplan->getPrice(),'leaseterm' => $floorplan->getLeaseTerm(),'image' => $floorplan->getImage()));
    }
    // [id:protected] => 1604 [property_id:protected] => 150 [name:protected] => Little Cottonwood [bedrooms:protected] => 1 [bathrooms:protected] => 1 [square_feet:protected] => 695 [price:protected] => $849 [lease_term:protected] => 12 months [deposit:protected] => $0 on approved credit [image:protected] => 3a8914dfa496c4181e3a545d061b4048.jpg [availability_link:protected] => [aProperty:protected] => [alreadyInSave:protected] => [alreadyInValidation:protected] => [validationFailures:protected] => Array ( ) [_new:BaseObject:private] => [_deleted:BaseObject:private] => [modifiedColumns:protected] => Array


    $arrFloorPlansAvailability = $this->getAvailabilty($this->property->getCode(),$arrFloorPlans);
    $this->arrFloorPlansAvailability = $arrFloorPlansAvailability;
    //$this->logMessage(print_r($arrFloorPlansAvailability,true),'info');
  }
  public function executeIndex(sfWebRequest $request)
  {
    //$objAcacia = new myAcacia();

    //if($objAcacia->isAcatia($this->property->getCode())){
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acacia');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jsp');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout('amc_layout');
      $this->setTemplate('amc');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('cornerstone_layout');
      $this->setTemplate('cornerstone');
    }



  }

  public function executeDetail(sfWebRequest $request)
  {
    //$objAcacia = new myAcacia();

    //if($objAcacia->isAcatia($this->property->getCode())){
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acaciadetail');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jspdetail');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout('amc_layout');
      $this->setTemplate('amcdetail');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('cornerstone_layout');
      $this->setTemplate('cornerstonedetail');
    }


    $this->arrFloorPlans = $this->arrFloorPlansAvailability[$request->getParameter('id')];

    //$this->logMessage(print_r($this->arrFloorPlans,true), 'info');


  }

  private function getAvailabilty($propertyCode,$arrFloorPlans){

    $arrOut =  array();
    $URL = "http://192.168.1.195:8088/mapts_com.asmx?WSDL";
    try {
      $client = new SoapClient($URL,array('trace' => 1));

      foreach($arrFloorPlans as $floorplanID => $floorplan){
        $arrUnits = array();
        //$this->logMessage(print_r($arrFloorPlans[$floorplanID]['floorplan']['name']." - ".$arrFloorPlans[$floorplanID]['floorplan']['squarefeet'],true), 'info');
        $data_query = new StdClass();
        $data_query->sysPassword = 'g3tm3s0m3pr0ps';
        $data_query->sPropertyCode = $propertyCode;
        $data_query->sSqFt = $floorplan['floorplan']['squarefeet'];

        if(in_array($propertyCode,array('70MTN','607SET','222CSF','223CBO','217VLM','220OCT','755VMF','753HIG','957SUT','756CC6','203PSR','951OAW','181LYR','553HHL'))){
          $soapResult = $client->GetUnitAvailabilityDetailBySqFt($data_query);
        }

        $this->logMessage(print_r($client->__getLastRequest(),true));
        //$this->logMessage(print_r($soapResult,true), 'info');

        if(in_array($propertyCode,array('70MTN','607SET','222CSF','223CBO','217VLM','220OCT','755VMF','753HIG','957SUT','756CC6','203PSR','951OAW','181LYR','553HHL'))){
          $xml = simplexml_load_string("<Result>".$soapResult->GetUnitAvailabilityDetailBySqFtResult."</Result>");
        } else {
          $xml = null;
        }

        if(!empty($xml)){
          //var_dump($xml->Unit[0]);
          $arrUnits = array();
          foreach($xml->Unit as $unit){
            //var_dump($unit);
            $json = json_encode($unit);
            $arrUnits[] = json_decode($json,TRUE);

          }
          //$this->logMessage(print_r($arrUnits,true), 'info');
          //if(is_array($xml->Unit)){
          $arrFloorPlans[$floorplanID]['floorplan']['unitcount'] = count($arrUnits);
          $arrFloorPlans[$floorplanID]['units'] = $arrUnits;
          //  var_dump($arrFloorPlans[$floorplanID]);

          //}

          //$this->logMessage(print_r($arrFloorPlans,true), 'info');
        } else {
          $arrFloorPlans[$floorplanID]['floorplan']['unitcount'] = 0;
          $arrFloorPlans[$floorplanID]['units'] = array();
        }

      }
      $this->logMessage(print_r($arrFloorPlans,true), 'info');

      //$soapResult = $client->GetUnitAvailability($data_query);
      //$this->logMessage(print_r($soapResult,true), 'info');
      //$this->logMessage(print_r($client->__getLastRequest(),true));
      //$soapResult = $client->GetUnitAvailability($data_query);

      //$this->logMessage(print_r($client->__getLastRequest(),true));
      //$xml = simplexml_load_string("<Result>".$soapResult->GetUnitsResult."</Result>");
      //$json = json_encode($xml);
      //$arrUnits = json_decode($json,TRUE);
      //$this->logMessage(print_r($arrUnits,true),'info');
      //foreach($arrUnits['UNIT'] as $unit){
      //  $arrOut[$unit['@attributes']['UnitNumber']] = $unit['@attributes']['UnitNumber'];
      //}
      //print_r($xml);

      //$p = xml_parser_create();
      //xml_parse_into_struct($p, "<Result>".$soapResult->GetWorkOrderCategoriesResult."</result>", $vals, $index);
      //xml_parser_free($p);
      //$thisWorkOrderCats = $vals;
      //echo "Index array\n";
      //$this->logMessage(print_r($index,true),'info');
      //echo "\nVals array\n";
      //$this->logMessage(print_r($vals,true),'info');
    } catch(SoapFault $e){
    //print_r($e);

    }
    return $arrFloorPlans;
  }
}
