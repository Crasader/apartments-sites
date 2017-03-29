<?php

/**
 * autoResidents actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoResidents
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoResidentsActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('residents', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/resident/filters');

    // pager
    $this->pager = new sfPropelPager('Resident', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/resident')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/resident');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('residents', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('residents', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (ResidentPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Residents. Make sure they do not have any associated items.');
      return $this->forward('residents', 'list');
    }

    return $this->redirect('residents/list');
  }

  public function executeEdit($request)
  {
    $this->resident = $this->getResidentOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updateResidentFromRequest();

      try
      {
        $this->saveResident($this->resident);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Residents.');
        return $this->forward('residents', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('residents/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('residents/list');
      }
      else
      {
        return $this->redirect('residents/edit?id='.$this->resident->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->resident = ResidentPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->resident);

    try
    {
      $this->deleteResident($this->resident);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Resident. Make sure it does not have any associated items.');
      return $this->forward('residents', 'list');
    }

    return $this->redirect('residents/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->resident = $this->getResidentOrCreate();
    $this->updateResidentFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveResident($resident)
  {
    $resident->save();

  }

  protected function deleteResident($resident)
  {
    $resident->delete();
  }

  protected function updateResidentFromRequest()
  {
    $resident = $this->getRequestParameter('resident');

    if (isset($resident['first_name']))
    {
      $this->resident->setFirstName($resident['first_name']);
    }
    if (isset($resident['last_name']))
    {
      $this->resident->setLastName($resident['last_name']);
    }
    if (isset($resident['email']))
    {
      $this->resident->setEmail($resident['email']);
    }
    if (isset($resident['password']))
    {
      $this->resident->setPassword($resident['password']);
    }
    if (isset($resident['tenantid']))
    {
      $this->resident->setTenantid($resident['tenantid']);
    }
    if (isset($resident['property_id']))
    {
    $this->resident->setPropertyId($resident['property_id'] ? $resident['property_id'] : null);
    }
    if (isset($resident['status_id']))
    {
    $this->resident->setStatusId($resident['status_id'] ? $resident['status_id'] : null);
    }
  }

  protected function getResidentOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $resident = new Resident();
    }
    else
    {
      $resident = ResidentPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($resident);
    }

    return $resident;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/resident/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/resident');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/resident/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/resident/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/resident/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/resident/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/resident/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['email_is_empty']))
    {
      $criterion = $c->getNewCriterion(ResidentPeer::EMAIL, '');
      $criterion->addOr($c->getNewCriterion(ResidentPeer::EMAIL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['email']) && $this->filters['email'] !== '')
    {
      $c->add(ResidentPeer::EMAIL, strtr($this->filters['email'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['property_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(ResidentPeer::PROPERTY_ID, '');
      $criterion->addOr($c->getNewCriterion(ResidentPeer::PROPERTY_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['property_id']) && $this->filters['property_id'] !== '')
    {
      $c->add(ResidentPeer::PROPERTY_ID, $this->filters['property_id']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/resident/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = ResidentPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/resident/sort') == 'asc')
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
      'resident{first_name}' => 'First name:',
      'resident{last_name}' => 'Last name:',
      'resident{email}' => 'Email:',
      'resident{password}' => 'Password:',
      'resident{tenantid}' => 'Tenantid:',
      'resident{property_id}' => 'Property:',
      'resident{status_id}' => 'Status:',
    );
  }
}
