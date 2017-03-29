<?php

class PropertyPeer extends BasePropertyPeer
{
    //public static function addSelectColumns(Criteria $criteria){
    //  parent::addSelectColumns($criteria);

    //  $criteria->add(PropertyPeer::ID, sfContext::getInstance()->getUser()->getAttribute('property'), Criteria::IN);
    //}
  
  public static function doSelect(Criteria $criteria, PropelPDO $con = null){
      if(sfContext::getInstance()->getUser()->hasAttribute('poperty')){
        $criteria->add(PropertyPeer::ID, sfContext::getInstance()->getUser()->getAttribute('poperty'), Criteria::IN);
      }
      return PropertyPeer::populateObjects(PropertyPeer::doSelectStmt($criteria, $con));
  }
  
  public static function getPropertiesForDomain()
  {
    exit;
    $c = new Criteria();
    $c->add(PropertyPeer::ID, sfContext::getInstance()->getUser()->getAttribute('poperty'),Criteria::IN);
    
    return self::doSelect($c);
     
  }
}
