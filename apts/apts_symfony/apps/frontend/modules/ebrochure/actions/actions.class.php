<?php

/**
 * ebrochure actions.
 *
 * @package    apts_symfony
 * @subpackage ebrochure
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class ebrochureActions extends sfActions
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
    $this->objCustomTemplate= new myCustomTemplate();
  }
  public function executeIndex(sfWebRequest $request)
  {

  	$this->arrCommunityAttractions = array();
    $arrCommAttrs = explode('<br />',nl2br($this->propertyTemplate->getCommunityAttractionsList()));
    foreach($arrCommAttrs as $commAttrItem){
      $this->arrCommunityAttractions[] = explode('~',$commAttrItem);
    }
    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'community');
    $this->communityPhotos =  $this->property->getPropertyPhotos($c);

    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'feature');
    $this->featurePhotos =  $this->property->getPropertyPhotos($c);

    $this->arrFeaturePhoto = array();
    $photocnt = 0;
    foreach($this->featurePhotos as $featurePhoto){
			$photocnt++;
			if($photocnt == 1){
				$this->arrFeaturePhoto[0]['path'] ="/uploads/photos/".$featurePhoto->getImage();
				$this->arrFeaturePhoto[0]['name'] ="/uploads/photos/".$featurePhoto->getName();
			}
			if($photocnt == 2){
				$this->arrFeaturePhoto[1]['path'] ="/uploads/photos/".$featurePhoto->getImage();
				$this->arrFeaturePhoto[1]['name'] ="/uploads/photos/".$featurePhoto->getName();
			}
		}

  	//$objAcacia = new myAcacia();

  	//if($objAcacia->isAcatia($this->property->getCode())){
  	if($this->objCustomTemplate->isAcatia($this->property->getCode())){
  		//$this->forward('default', 'acacia');
  		$this->setLayout('acacia_eb_layout');
  		$this->setTemplate('acacia');
  	} elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
  		$this->setLayout('jsp_eb_layout');
			$this->setTemplate('jsp');
  	}

  }
}
