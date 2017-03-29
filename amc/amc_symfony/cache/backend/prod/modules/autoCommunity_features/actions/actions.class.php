<?php

/**
 * autoCommunity_features actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoCommunity_features
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoCommunity_featuresActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('community_features', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/community_feature/filters');

    // pager
    $this->pager = new sfPropelPager('CommunityFeature', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/community_feature')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/community_feature');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('community_features', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('community_features', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (CommunityFeaturePeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Community features. Make sure they do not have any associated items.');
      return $this->forward('community_features', 'list');
    }

    return $this->redirect('community_features/list');
  }

  public function executeEdit($request)
  {
    $this->community_feature = $this->getCommunityFeatureOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updateCommunityFeatureFromRequest();

      try
      {
        $this->saveCommunityFeature($this->community_feature);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Community features.');
        return $this->forward('community_features', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('community_features/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('community_features/list');
      }
      else
      {
        return $this->redirect('community_features/edit?id='.$this->community_feature->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->community_feature = CommunityFeaturePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->community_feature);

    try
    {
      $this->deleteCommunityFeature($this->community_feature);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Community feature. Make sure it does not have any associated items.');
      return $this->forward('community_features', 'list');
    }

    return $this->redirect('community_features/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->community_feature = $this->getCommunityFeatureOrCreate();
    $this->updateCommunityFeatureFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveCommunityFeature($community_feature)
  {
    $community_feature->save();

  }

  protected function deleteCommunityFeature($community_feature)
  {
    $community_feature->delete();
  }

  protected function updateCommunityFeatureFromRequest()
  {
    $community_feature = $this->getRequestParameter('community_feature');

    if (isset($community_feature['name']))
    {
      $this->community_feature->setName($community_feature['name']);
    }
  }

  protected function getCommunityFeatureOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $community_feature = new CommunityFeature();
    }
    else
    {
      $community_feature = CommunityFeaturePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($community_feature);
    }

    return $community_feature;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/community_feature/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/community_feature');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/community_feature/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/community_feature/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/community_feature/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/community_feature/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/community_feature/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(CommunityFeaturePeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(CommunityFeaturePeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(CommunityFeaturePeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/community_feature/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = CommunityFeaturePeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/community_feature/sort') == 'asc')
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
      'community_feature{name}' => 'Name:',
    );
  }
}
