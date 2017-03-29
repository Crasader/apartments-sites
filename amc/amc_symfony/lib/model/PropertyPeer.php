<?php

class PropertyPeer extends BasePropertyPeer
{
  //public static function addSelectColumns(Criteria $criteria){
  //  parent::addSelectColumns($criteria);
  //  $criteria->add(PropertyPeer::ID, 1);
  //}
  public static function getAll()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::NAME);
    return self::doSelect($c);
  }

  public static function getSortedObject() {
  $c = new Criteria();
  $c->addAscendingOrderByColumn(self::NAME);
  $rs = self::doSelect($c);
  return $rs;
  }
}