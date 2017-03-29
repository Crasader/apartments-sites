<?php

/**
 * community actions.
 *
 * @package    apts_symfony
 * @subpackage community
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class communityActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');

    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyCommunityMapPeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyCommunityMaps = PropertyCommunityMapPeer::doSelect($c);

    $this->getResponse()->setTitle($this->getResponse()->getTitle()." - Community");

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
      $this->setLayout('community_cornerstone_layout');
      $this->setTemplate('cornerstone');
  	}
  }
}
