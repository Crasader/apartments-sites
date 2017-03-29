<?php

class PropertyTemplatePeer extends BasePropertyTemplatePeer
{
  //public static function addSelectColumns(Criteria $criteria){
  //  parent::addSelectColumns($criteria);
  //  $criteria->add(PropertyTemplatePeer::PROPERTY_ID, 1);
 // }
 public static function getAll()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::DESCRIPTION);
    return self::doSelect($c);
  }
}
