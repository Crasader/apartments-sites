<?php

/**
 * autoOther_features actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoOther_features
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoOther_featuresActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('other_features', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/other_feature/filters');

    // pager
    $this->pager = new sfPropelPager('OtherFeature', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/other_feature')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/other_feature');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('other_features', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('other_features', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (OtherFeaturePeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Other features. Make sure they do not have any associated items.');
      return $this->forward('other_features', 'list');
    }

    return $this->redirect('other_features/list');
  }

  public function executeEdit($request)
  {
    $this->other_feature = $this->getOtherFeatureOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updateOtherFeatureFromRequest();

      try
      {
        $this->saveOtherFeature($this->other_feature);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Other features.');
        return $this->forward('other_features', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('other_features/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('other_features/list');
      }
      else
      {
        return $this->redirect('other_features/edit?id='.$this->other_feature->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->other_feature = OtherFeaturePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->other_feature);

    try
    {
      $this->deleteOtherFeature($this->other_feature);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Other feature. Make sure it does not have any associated items.');
      return $this->forward('other_features', 'list');
    }

    return $this->redirect('other_features/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->other_feature = $this->getOtherFeatureOrCreate();
    $this->updateOtherFeatureFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveOtherFeature($other_feature)
  {
    $other_feature->save();

  }

  protected function deleteOtherFeature($other_feature)
  {
    $other_feature->delete();
  }

  protected function updateOtherFeatureFromRequest()
  {
    $other_feature = $this->getRequestParameter('other_feature');

    if (isset($other_feature['name']))
    {
      $this->other_feature->setName($other_feature['name']);
    }
  }

  protected function getOtherFeatureOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $other_feature = new OtherFeature();
    }
    else
    {
      $other_feature = OtherFeaturePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($other_feature);
    }

    return $other_feature;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/other_feature/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/other_feature');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/other_feature/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/other_feature/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/other_feature/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/other_feature/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/other_feature/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(OtherFeaturePeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(OtherFeaturePeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(OtherFeaturePeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/other_feature/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = OtherFeaturePeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/other_feature/sort') == 'asc')
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
      'other_feature{name}' => 'Name:',
    );
  }
}
