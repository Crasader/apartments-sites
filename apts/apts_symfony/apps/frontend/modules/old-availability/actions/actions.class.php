<?php

/**
 * availability actions.
 *
 * @package    apts_symfony
 * @subpackage availability
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class availabilityActions extends sfActions
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
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
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
  	}

    $arrUnityAvailability = $this->getAvailabilty($this->property->getCode());
    $this->logMessage(print_r($arrUnityAvailability,true),'info');
    $this->arrUnityAvailability = $arrUnityAvailability;

  }

  private function getAvailabilty($propertyCode){
    $data_query = new StdClass();
    $data_query->sysPassword = 'g3tm3s0m3pr0ps';
    $data_query->sPropertyCode = $propertyCode;
    //$data_query->sSqFt = $sSqFt;
    $arrOut =  array();
    $URL = "http://192.168.1.135:8088/mapts_com.asmx?WSDL";
    try {
      $client = new SoapClient($URL,array('trace' => 1));
      //$soapResult = $client->GetUnitAvailabilityDetailBySqFt($data_query);
      //$soapResult = $client->GetUnitAvailability($data_query);
      //$this->logMessage(print_r($soapResult,true), 'info');
      //$this->logMessage(print_r($client->__getLastRequest(),true));
      $soapResult = $client->GetUnitAvailability($data_query);
      $this->logMessage(print_r($soapResult,true), 'info');
      $this->logMessage(print_r($client->__getLastRequest(),true));
      $xml = simplexml_load_string("<Result>".$soapResult->GetUnitAvailabilityResult."</Result>");
      $json = json_encode($xml);

      $arrUnits = json_decode($json,TRUE);
      //print_r($arrUnits);
      //$this->logMessage(print_r($arrUnits,true),'info');
      foreach($arrUnits['Unit'] as $unit){
        $arrOut[] = $unit;
      }


      //$p = xml_parser_create();
      //xml_parse_into_struct($p, "<Result>".$soapResult->GetWorkOrderCategoriesResult."</result>", $vals, $index);
      //xml_parser_free($p);
      //$thisWorkOrderCats = $vals;
      //echo "Index array\n";
      //$this->logMessage(print_r($index,true),'info');
      //echo "\nVals array\n";
      //$this->logMessage(print_r($vals,true),'info');
    } catch(SoapFault $e){
      print_r($e);

    }
    return $arrOut;
  }
}
