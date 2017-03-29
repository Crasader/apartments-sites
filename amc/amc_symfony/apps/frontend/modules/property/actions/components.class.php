<?php
 
class propertyComponents extends sfComponents
{
  public function executeSearch()
  {
  
    //$c = new Criteria();
    //$c->addJoin(StatePeer::ID, PropertyPeer::STATE_ID);
    //$c->addAscendingOrderByColumn(StatePeer::ORDER_BY);
    //$c->addAscendingOrderByColumn(StatePeer::NAME);
    //$this->states = StatePeer::doSelect($c);
    
    $connection = Propel::getConnection();
    $query = 'SELECT DISTINCT %s AS code, %s AS state FROM %s, %s WHERE %s = %s AND %s = %s ORDER BY %s ';
    $query = sprintf($query, StatePeer::CODE, StatePeer::NAME, StatePeer::TABLE_NAME, PropertyPeer::TABLE_NAME, StatePeer::ID, PropertyPeer::STATE_ID, PropertyPeer::STATUS_ID, 2, StatePeer::NAME);
    $statement = $connection->prepare($query);
    $statement->execute();
    $this->states = array();
    while($row = $statement->fetch(PDO::FETCH_OBJ)){
      $this->states[$row->code] = $row->state;
    }
    
    $connection = Propel::getConnection();
    $query = 'SELECT DISTINCT %s AS city FROM %s WHERE %s = %s ORDER BY %s ';
    $query = sprintf($query, PropertyPeer::CITY, PropertyPeer::TABLE_NAME, PropertyPeer::STATUS_ID, 2, PropertyPeer::CITY);
    $statement = $connection->prepare($query);
    $statement->execute();
    $this->cities = array();
    while($row = $statement->fetch(PDO::FETCH_OBJ)){
      $this->cities[$row->city] = $row->city;
    }

    /*$connection = Propel::getConnection();
    $query = 'SELECT %s as id, %s as name FROM %s WHERE %s = %s ORDER BY %s';
    $query = sprintf($query, PropertyPeer::ID, PropertyPeer::NAME, PropertyPeer::TABLE_NAME, PropertyPeer::STATUS_ID, 2,PropertyPeer::NAME);
    $statement = $connection->prepare($query);
    $statement->execute();
    $this->properties = array();
    while($row = $statement->fetch(PDO::FETCH_OBJ)){
      $this->properties[$row->id] = $row->name;
    }*/
    $c = new Criteria();
    $c->add(PropertyPeer::STATUS_ID, '2');
    $c->add(PropertyPeer::CORPORATE_GROUP_ID, '1');
    $c->addAscendingOrderByColumn(PropertyPeer::NAME);
    $this->properties = PropertyPeer::doSelect($c);
  }
}