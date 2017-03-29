<?php
 
class propertyComponents extends sfComponents
{
  public function executeSearch()
  {
  
    $c = new Criteria();
    $c->addJoin(StatePeer::ID, PropertyPeer::STATE_ID);
    $c->addAscendingOrderByColumn(StatePeer::ORDER_BY);
    $c->addAscendingOrderByColumn(StatePeer::NAME);
    $this->states = StatePeer::doSelect($c);
    
    $connection = Propel::getConnection();
    $query = 'SELECT DISTINCT %s AS city FROM %s';
    $query = sprintf($query, PropertyPeer::CITY, PropertyPeer::TABLE_NAME);
    $statement = $connection->prepare($query);
    $statement->execute();
    $this->cities = array();
    while($row = $statement->fetch(PDO::FETCH_OBJ)){
      $this->cities[$row->city] = $row->city;
    }
    
    $connection = Propel::getConnection();
    $query = 'SELECT %s as id, %s as name FROM %s';
    $query = sprintf($query, PropertyPeer::ID, PropertyPeer::NAME, PropertyPeer::TABLE_NAME);
    $statement = $connection->prepare($query);
    $statement->execute();
    $this->properties = array();
    while($row = $statement->fetch(PDO::FETCH_OBJ)){
      $this->properties[$row->id] = $row->name;
    }
  }
}