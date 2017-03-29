<?php

/**
 * default actions.
 *
 * @package    apts_symfony
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class defaultActions extends sfActions
{
  public function preExecute(){
    $IntPropertyId = $this->getUser()->getAttribute('poperty');

    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);

    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);

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

    //$this->getResponse()->setTitle($this->getResponse()->getTitle()." - Home");

    $this->objCustomTemplate= new myCustomTemplate();

    $this->showmobile = true;

    if($this->getUser()->hasAttribute('nomobile') && $this->getUser()->getAttribute('nomobile') == true){
        $this->showmobile = false;

    }


  }
  public function executeNomobile(sfWebRequest $request){
    $this->getUser()->setAttribute('nomobile', true);

    $this->redirect('default', 'index');
  }
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'community');
    $this->communityPhotos =  $this->property->getPropertyPhotos($c);

    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'main');
    $this->mainPhotos =  $this->property->getPropertyPhotos($c);



    //echo $request->getHttpHeader('User-Agent');
    //exit;


    //} else {
      //$objAcacia = new myAcacia();
      //if($objAcacia->isAcatia($this->property->getCode())){
      if($this->objCustomTemplate->isAcatia($this->property->getCode())){
        //if ($this->showmobile && preg_match('/Mobile|Android/i', $request->getHttpHeader('User-Agent'))){
        //  $this->forward('default', 'mobile');
        //}
        $c = new Criteria();
        $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
        $c->add(PhotoTypePeer::NAME,'acaciahome');
        $c->setLimit(3);
        $this->acaciahomePhotos =  $this->property->getPropertyPhotos($c);

        $this->setLayout('home_acacia_layout');
        $this->setTemplate('acacia');
      } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
        if ($this->showmobile && preg_match('/Mobile|Android/i', $request->getHttpHeader('User-Agent'))){
          $this->forward('default', 'mobile');
        }
        $c = new Criteria();
        $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
        $c->add(PhotoTypePeer::NAME,'jsphome');
        $c->setLimit(3);
        $homePhotos =  $this->property->getPropertyPhotos($c);
        $arrhomePhotos = array();
        foreach($homePhotos as $photo){
          $arrhomePhotos[] = $photo->getImage();
        }
        $this->arrhomePhotos = $arrhomePhotos;

        $this->setLayout('home_jsp_layout');
        $this->setTemplate('jsp');
      } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
        $c = new Criteria();
        $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
        $c->add(PhotoTypePeer::NAME,'main');
        $c->addAscendingOrderByColumn(PropertyPhotoPeer::DISPLAY_ORDER);
        $c->addAscendingOrderByColumn(PropertyPhotoPeer::ID);
        $c->setLimit(9);
        $this->homePhotos =  $this->property->getPropertyPhotos($c);
        $this->setLayout('home_amc_layout');
        $this->setTemplate('amc');
      } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
        $c = new Criteria();
        $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
        $c->add(PhotoTypePeer::NAME,'main');
        $c->addAscendingOrderByColumn(PropertyPhotoPeer::DISPLAY_ORDER);
        $c->addAscendingOrderByColumn(PropertyPhotoPeer::ID);
        $c->setLimit(9);
        $this->homePhotos =  $this->property->getPropertyPhotos($c);
        $this->setLayout('home_cornerstone_layout');
        $this->setTemplate('cornerstone');
      } else {
        $this->setLayout('home_layout');
      }
    //}


    //$this->logMessage(print_r($IntPropertyId,true),'warning');
    //print_r($request->getHttpHeader('User-Agent'));



    //return sfView::NONE;
  }
  public function executeMobile(sfWebRequest $request)
  {
  //	$objAcacia = new myAcacia();
    //if($objAcacia->isAcatia($this->property->getCode())){
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      $c = new Criteria();
      $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
      $c->add(PhotoTypePeer::NAME,'acaciahome');
      $c->setLimit(3);
      $this->acaciahomePhotos =  $this->property->getPropertyPhotos($c);

      $this->setLayout('acaciamobile_layout');
      $this->setTemplate('acaciamobile');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
        $c = new Criteria();
        $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
        $c->add(PhotoTypePeer::NAME,'jsphome');
        $c->setLimit(3);
        $homePhotos =  $this->property->getPropertyPhotos($c);
        $arrhomePhotos = array();
        foreach($homePhotos as $photo){
          $arrhomePhotos[] = $photo->getImage();
        }
        $this->arrhomePhotos = $arrhomePhotos;

        $this->setLayout('jspmobile_layout');
        $this->setTemplate('jspmobile');
    } else {
      $this->setLayout('mobile_layout');
    }


    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'community');
    $this->communityPhotos =  $this->property->getPropertyPhotos($c);


    $c = new Criteria();
    $c->addJoin(PhotoTypePeer::ID,PropertyPhotoPeer::PHOTO_TYPE_ID);
    $c->add(PhotoTypePeer::NAME,'main');
    $c->addAscendingOrderByColumn(PropertyPhotoPeer::DISPLAY_ORDER);
    $c->addAscendingOrderByColumn(PropertyPhotoPeer::ID);
    $this->mainPhotos =  $this->property->getPropertyPhotos($c);


    //$address = urlencode($this->property->getAddress().", ".$this->property->getCity().", ".$this->property->getState()->getCode().", ".$this->property->getZip());
    //$request = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=" . $address . "&sensor=false");
    //print_r($request);
    //$this->jsonAddress = json_decode($request, true);


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
  }
  public function executeError404(sfWebRequest $request)
  {
    try {
      $this->forward('default', 'index');
    } catch(sfStopException $e){
      die();
    }
  }
}
