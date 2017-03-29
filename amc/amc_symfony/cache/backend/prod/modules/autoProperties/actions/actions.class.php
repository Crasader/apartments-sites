<?php

/**
 * autoProperties actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoProperties
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoPropertiesActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('properties', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/property/filters');

    // pager
    $this->pager = new sfPropelPager('Property', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/property')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/property');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('properties', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('properties', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (PropertyPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Propertys. Make sure they do not have any associated items.');
      return $this->forward('properties', 'list');
    }

    return $this->redirect('properties/list');
  }

  public function executeEdit($request)
  {
    $this->property = $this->getPropertyOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updatePropertyFromRequest();

      try
      {
        $this->saveProperty($this->property);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Propertys.');
        return $this->forward('properties', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('properties/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('properties/list');
      }
      else
      {
        return $this->redirect('properties/edit?id='.$this->property->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->property = PropertyPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->property);

    try
    {
      $this->deleteProperty($this->property);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Property. Make sure it does not have any associated items.');
      return $this->forward('properties', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property->getImage();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

    return $this->redirect('properties/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->property = $this->getPropertyOrCreate();
    $this->updatePropertyFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveProperty($property)
  {
    $property->save();

      // Update many-to-many for "apartment_features"
      $c = new Criteria();
      $c->add(PropertyApartmentFeaturePeer::PROPERTY_ID, $property->getPrimaryKey());
      PropertyApartmentFeaturePeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_apartment_features');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $PropertyApartmentFeature = new PropertyApartmentFeature();
          $PropertyApartmentFeature->setPropertyId($property->getPrimaryKey());
          $PropertyApartmentFeature->setApartmentFeatureId($id);
          $PropertyApartmentFeature->save();
        }
      }

      // Update many-to-many for "community_features"
      $c = new Criteria();
      $c->add(PropertyCommunityFeaturePeer::PROPERTY_ID, $property->getPrimaryKey());
      PropertyCommunityFeaturePeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_community_features');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $PropertyCommunityFeature = new PropertyCommunityFeature();
          $PropertyCommunityFeature->setPropertyId($property->getPrimaryKey());
          $PropertyCommunityFeature->setCommunityFeatureId($id);
          $PropertyCommunityFeature->save();
        }
      }

      // Update many-to-many for "other_features"
      $c = new Criteria();
      $c->add(PropertyOtherFeaturePeer::PROPERTY_ID, $property->getPrimaryKey());
      PropertyOtherFeaturePeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_other_features');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $PropertyOtherFeature = new PropertyOtherFeature();
          $PropertyOtherFeature->setPropertyId($property->getPrimaryKey());
          $PropertyOtherFeature->setOtherFeatureId($id);
          $PropertyOtherFeature->save();
        }
      }

  }

  protected function deleteProperty($property)
  {
    $property->delete();
  }

  protected function updatePropertyFromRequest()
  {
    $property = $this->getRequestParameter('property');

    if (isset($property['code']))
    {
      $this->property->setCode($property['code']);
    }
    if (isset($property['name']))
    {
      $this->property->setName($property['name']);
    }
    $this->property->setFeatured(isset($property['featured']) ? $property['featured'] : 0);
    if (isset($property['status_id']))
    {
    $this->property->setStatusId($property['status_id'] ? $property['status_id'] : null);
    }
    if (isset($property['description']))
    {
      $this->property->setDescription($property['description']);
    }
    if (isset($property['address']))
    {
      $this->property->setAddress($property['address']);
    }
    if (isset($property['city']))
    {
      $this->property->setCity($property['city']);
    }
    if (isset($property['state_id']))
    {
    $this->property->setStateId($property['state_id'] ? $property['state_id'] : null);
    }
    if (isset($property['zip']))
    {
      $this->property->setZip($property['zip']);
    }
    if (isset($property['phone']))
    {
      $this->property->setPhone($property['phone']);
    }
    if (isset($property['fax']))
    {
      $this->property->setFax($property['fax']);
    }
    if (isset($property['email']))
    {
      $this->property->setEmail($property['email']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property->getImage();
    if (!$this->getRequest()->hasErrors() && isset($property['image_remove']))
    {
      $this->property->setImage('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property[image]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property[image]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property[image]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property[image]', sfConfig::get('sf_upload_dir')."/properties/".$fileName.$ext);
      $this->property->setImage($fileName.$ext);
    }
    if (isset($property['url']))
    {
      $this->property->setUrl($property['url']);
    }
    if (isset($property['price_range']))
    {
      $this->property->setPriceRange($property['price_range']);
    }
    if (isset($property['unit_type']))
    {
      $this->property->setUnitType($property['unit_type']);
    }
    if (isset($property['special']))
    {
      $this->property->setSpecial($property['special']);
    }
    if (isset($property['hours']))
    {
      $this->property->setHours($property['hours']);
    }
    if (isset($property['pet_policy']))
    {
      $this->property->setPetPolicy($property['pet_policy']);
    }
    if (isset($property['directions']))
    {
      $this->property->setDirections($property['directions']);
    }
    if (isset($property['apartment_features']))
    {
      $this->property->setApartmentFeatures($property['apartment_features']);
    }
    if (isset($property['community_features']))
    {
      $this->property->setCommunityFeatures($property['community_features']);
    }
    if (isset($property['other_features']))
    {
      $this->property->setOtherFeatures($property['other_features']);
    }
  }

  protected function getPropertyOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $property = new Property();
    }
    else
    {
      $property = PropertyPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($property);
    }

    return $property;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/property/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/property/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/property/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/property/sort'))
    {
      $this->getUser()->setAttribute('sort', 'name', 'sf_admin/property/sort');
      $this->getUser()->setAttribute('type', 'asc', 'sf_admin/property/sort');
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['code_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPeer::CODE, '');
      $criterion->addOr($c->getNewCriterion(PropertyPeer::CODE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['code']) && $this->filters['code'] !== '')
    {
      $c->add(PropertyPeer::CODE, strtr($this->filters['code'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(PropertyPeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(PropertyPeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['city_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPeer::CITY, '');
      $criterion->addOr($c->getNewCriterion(PropertyPeer::CITY, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['city']) && $this->filters['city'] !== '')
    {
      $c->add(PropertyPeer::CITY, strtr($this->filters['city'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['state_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPeer::STATE_ID, '');
      $criterion->addOr($c->getNewCriterion(PropertyPeer::STATE_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['state_id']) && $this->filters['state_id'] !== '')
    {
      $c->add(PropertyPeer::STATE_ID, $this->filters['state_id']);
    }
    if (isset($this->filters['featured_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPeer::FEATURED, '');
      $criterion->addOr($c->getNewCriterion(PropertyPeer::FEATURED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['featured']) && $this->filters['featured'] !== '')
    {
      $c->add(PropertyPeer::FEATURED, $this->filters['featured']);
    }
    if (isset($this->filters['status_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPeer::STATUS_ID, '');
      $criterion->addOr($c->getNewCriterion(PropertyPeer::STATUS_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['status_id']) && $this->filters['status_id'] !== '')
    {
      $c->add(PropertyPeer::STATUS_ID, $this->filters['status_id']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/property/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = PropertyPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/property/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'property{code}' => 'Code:',
      'property{name}' => 'Name:',
      'property{featured}' => 'Featured:',
      'property{status_id}' => 'Status:',
      'property{description}' => 'Description:',
      'property{address}' => 'Address:',
      'property{city}' => 'City:',
      'property{state_id}' => 'State:',
      'property{zip}' => 'Zip:',
      'property{phone}' => 'Phone:',
      'property{fax}' => 'Fax:',
      'property{email}' => 'Email:',
      'property{image}' => 'Image:',
      'property{url}' => 'Url:',
      'property{price_range}' => 'Price range:',
      'property{unit_type}' => 'Unit type:',
      'property{special}' => 'Special:',
      'property{hours}' => 'Hours:',
      'property{pet_policy}' => 'Pet policy:',
      'property{directions}' => 'Directions:',
      'property{apartment_features}' => 'Apartment features:',
      'property{community_features}' => 'Community features:',
      'property{other_features}' => 'Other features:',
    );
  }
}
