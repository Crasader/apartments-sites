<?php

/**
 * autoProperty_floorplans actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoProperty_floorplans
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoProperty_floorplansActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('property_floorplans', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/property_floorplan/filters');

    // pager
    $this->pager = new sfPropelPager('PropertyFloorplan', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/property_floorplan')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/property_floorplan');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('property_floorplans', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('property_floorplans', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (PropertyFloorplanPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Property floorplans. Make sure they do not have any associated items.');
      return $this->forward('property_floorplans', 'list');
    }

    return $this->redirect('property_floorplans/list');
  }

  public function executeEdit($request)
  {
    $this->property_floorplan = $this->getPropertyFloorplanOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updatePropertyFloorplanFromRequest();

      try
      {
        $this->savePropertyFloorplan($this->property_floorplan);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Property floorplans.');
        return $this->forward('property_floorplans', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('property_floorplans/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('property_floorplans/list');
      }
      else
      {
        return $this->redirect('property_floorplans/edit?id='.$this->property_floorplan->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->property_floorplan = PropertyFloorplanPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->property_floorplan);

    try
    {
      $this->deletePropertyFloorplan($this->property_floorplan);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Property floorplan. Make sure it does not have any associated items.');
      return $this->forward('property_floorplans', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."/floorplans/".$this->property_floorplan->getImage();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

    return $this->redirect('property_floorplans/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->property_floorplan = $this->getPropertyFloorplanOrCreate();
    $this->updatePropertyFloorplanFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function savePropertyFloorplan($property_floorplan)
  {
    $property_floorplan->save();

  }

  protected function deletePropertyFloorplan($property_floorplan)
  {
    $property_floorplan->delete();
  }

  protected function updatePropertyFloorplanFromRequest()
  {
    $property_floorplan = $this->getRequestParameter('property_floorplan');

    if (isset($property_floorplan['name']))
    {
      $this->property_floorplan->setName($property_floorplan['name']);
    }
    if (isset($property_floorplan['property_id']))
    {
    $this->property_floorplan->setPropertyId($property_floorplan['property_id'] ? $property_floorplan['property_id'] : null);
    }
    if (isset($property_floorplan['bedrooms']))
    {
      $this->property_floorplan->setBedrooms($property_floorplan['bedrooms']);
    }
    if (isset($property_floorplan['bathrooms']))
    {
      $this->property_floorplan->setBathrooms($property_floorplan['bathrooms']);
    }
    if (isset($property_floorplan['square_feet']))
    {
      $this->property_floorplan->setSquareFeet($property_floorplan['square_feet']);
    }
    if (isset($property_floorplan['price']))
    {
      $this->property_floorplan->setPrice($property_floorplan['price']);
    }
    if (isset($property_floorplan['lease_term']))
    {
      $this->property_floorplan->setLeaseTerm($property_floorplan['lease_term']);
    }
    if (isset($property_floorplan['deposit']))
    {
      $this->property_floorplan->setDeposit($property_floorplan['deposit']);
    }
    if (isset($property_floorplan['availability_link']))
    {
      $this->property_floorplan->setAvailabilityLink($property_floorplan['availability_link']);
    }
    if (isset($property_floorplan['display_order']))
    {
      $this->property_floorplan->setDisplayOrder($property_floorplan['display_order']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/floorplans/".$this->property_floorplan->getImage();
    if (!$this->getRequest()->hasErrors() && isset($property_floorplan['image_remove']))
    {
      $this->property_floorplan->setImage('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_floorplan[image]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_floorplan[image]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_floorplan[image]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_floorplan[image]', sfConfig::get('sf_upload_dir')."/floorplans/".$fileName.$ext);
      $this->property_floorplan->setImage($fileName.$ext);
    }
  }

  protected function getPropertyFloorplanOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $property_floorplan = new PropertyFloorplan();
    }
    else
    {
      $property_floorplan = PropertyFloorplanPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($property_floorplan);
    }

    return $property_floorplan;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_floorplan/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_floorplan');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_floorplan/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/property_floorplan/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/property_floorplan/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/property_floorplan/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/property_floorplan/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyFloorplanPeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(PropertyFloorplanPeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(PropertyFloorplanPeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['property_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyFloorplanPeer::PROPERTY_ID, '');
      $criterion->addOr($c->getNewCriterion(PropertyFloorplanPeer::PROPERTY_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['property_id']) && $this->filters['property_id'] !== '')
    {
      $c->add(PropertyFloorplanPeer::PROPERTY_ID, $this->filters['property_id']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/property_floorplan/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = PropertyFloorplanPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/property_floorplan/sort') == 'asc')
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
      'property_floorplan{name}' => 'Name:',
      'property_floorplan{property_id}' => 'Property:',
      'property_floorplan{bedrooms}' => 'Bedrooms:',
      'property_floorplan{bathrooms}' => 'Bathrooms:',
      'property_floorplan{square_feet}' => 'Square feet:',
      'property_floorplan{price}' => 'Price:',
      'property_floorplan{lease_term}' => 'Lease term:',
      'property_floorplan{deposit}' => 'Deposit:',
      'property_floorplan{availability_link}' => 'Availability link:',
      'property_floorplan{display_order}' => 'Display order:',
      'property_floorplan{image}' => 'Image:',
    );
  }
}
