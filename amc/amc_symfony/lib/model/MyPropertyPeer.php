<?php

class MyPropertyPeer extends BasePropertyPeer
{
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        $criteria = new Criteria();
        $criteria->add(PropertyPeer::ID, 1);
        //return MyPropertyPeer::doSelect($criteria);
    }
}