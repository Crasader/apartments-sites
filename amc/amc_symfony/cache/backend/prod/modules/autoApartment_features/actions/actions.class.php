<?php

/**
 * autoApartment_features actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoApartment_features
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoApartment_featuresActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('apartment_features', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/apartment_feature/filters');

    // pager
    $this->pager = new sfPropelPager('ApartmentFeature', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/apartment_feature')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/apartment_feature');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('apartment_features', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('apartment_features', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (ApartmentFeaturePeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Apartment features. Make sure they do not have any associated items.');
      return $this->forward('apartment_features', 'list');
    }

    return $this->redirect('apartment_features/list');
  }

  public function executeEdit($request)
  {
    $this->apartment_feature = $this->getApartmentFeatureOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updateApartmentFeatureFromRequest();

      try
      {
        $this->saveApartmentFeature($this->apartment_feature);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Apartment features.');
        return $this->forward('apartment_features', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('apartment_features/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('apartment_features/list');
      }
      else
      {
        return $this->redirect('apartment_features/edit?id='.$this->apartment_feature->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->apartment_feature = ApartmentFeaturePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->apartment_feature);

    try
    {
      $this->deleteApartmentFeature($this->apartment_feature);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Apartment feature. Make sure it does not have any associated items.');
      return $this->forward('apartment_features', 'list');
    }

    return $this->redirect('apartment_features/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->apartment_feature = $this->getApartmentFeatureOrCreate();
    $this->updateApartmentFeatureFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveApartmentFeature($apartment_feature)
  {
    $apartment_feature->save();

  }

  protected function deleteApartmentFeature($apartment_feature)
  {
    $apartment_feature->delete();
  }

  protected function updateApartmentFeatureFromRequest()
  {
    $apartment_feature = $this->getRequestParameter('apartment_feature');

    if (isset($apartment_feature['name']))
    {
      $this->apartment_feature->setName($apartment_feature['name']);
    }
  }

  protected function getApartmentFeatureOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $apartment_feature = new ApartmentFeature();
    }
    else
    {
      $apartment_feature = ApartmentFeaturePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($apartment_feature);
    }

    return $apartment_feature;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/apartment_feature/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/apartment_feature');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/apartment_feature/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/apartment_feature/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/apartment_feature/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/apartment_feature/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/apartment_feature/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(ApartmentFeaturePeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(ApartmentFeaturePeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(ApartmentFeaturePeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/apartment_feature/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = ApartmentFeaturePeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/apartment_feature/sort') == 'asc')
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
      'apartment_feature{name}' => 'Name:',
    );
  }
}
