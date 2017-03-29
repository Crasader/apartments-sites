<?php

/**
 * autoProperty_photos actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoProperty_photos
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoProperty_photosActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('property_photos', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/property_photo/filters');

    // pager
    $this->pager = new sfPropelPager('PropertyPhoto', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/property_photo')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/property_photo');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('property_photos', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('property_photos', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (PropertyPhotoPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Property photos. Make sure they do not have any associated items.');
      return $this->forward('property_photos', 'list');
    }

    return $this->redirect('property_photos/list');
  }

  public function executeEdit($request)
  {
    $this->property_photo = $this->getPropertyPhotoOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updatePropertyPhotoFromRequest();

      try
      {
        $this->savePropertyPhoto($this->property_photo);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Property photos.');
        return $this->forward('property_photos', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('property_photos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('property_photos/list');
      }
      else
      {
        return $this->redirect('property_photos/edit?id='.$this->property_photo->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->property_photo = PropertyPhotoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->property_photo);

    try
    {
      $this->deletePropertyPhoto($this->property_photo);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Property photo. Make sure it does not have any associated items.');
      return $this->forward('property_photos', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."/photos/".$this->property_photo->getImage();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

    return $this->redirect('property_photos/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->property_photo = $this->getPropertyPhotoOrCreate();
    $this->updatePropertyPhotoFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function savePropertyPhoto($property_photo)
  {
    $property_photo->save();

  }

  protected function deletePropertyPhoto($property_photo)
  {
    $property_photo->delete();
  }

  protected function updatePropertyPhotoFromRequest()
  {
    $property_photo = $this->getRequestParameter('property_photo');

    if (isset($property_photo['name']))
    {
      $this->property_photo->setName($property_photo['name']);
    }
    if (isset($property_photo['property_id']))
    {
    $this->property_photo->setPropertyId($property_photo['property_id'] ? $property_photo['property_id'] : null);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/photos/".$this->property_photo->getImage();
    if (!$this->getRequest()->hasErrors() && isset($property_photo['image_remove']))
    {
      $this->property_photo->setImage('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_photo[image]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_photo[image]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_photo[image]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_photo[image]', sfConfig::get('sf_upload_dir')."/photos/".$fileName.$ext);
      $this->property_photo->setImage($fileName.$ext);
    }
    if (isset($property_photo['photo_type_id']))
    {
    $this->property_photo->setPhotoTypeId($property_photo['photo_type_id'] ? $property_photo['photo_type_id'] : null);
    }
    if (isset($property_photo['display_order']))
    {
      $this->property_photo->setDisplayOrder($property_photo['display_order']);
    }
  }

  protected function getPropertyPhotoOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $property_photo = new PropertyPhoto();
    }
    else
    {
      $property_photo = PropertyPhotoPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($property_photo);
    }

    return $property_photo;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_photo/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_photo');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_photo/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/property_photo/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/property_photo/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/property_photo/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/property_photo/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPhotoPeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(PropertyPhotoPeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(PropertyPhotoPeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['property_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPhotoPeer::PROPERTY_ID, '');
      $criterion->addOr($c->getNewCriterion(PropertyPhotoPeer::PROPERTY_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['property_id']) && $this->filters['property_id'] !== '')
    {
      $c->add(PropertyPhotoPeer::PROPERTY_ID, $this->filters['property_id']);
    }
    if (isset($this->filters['photo_type_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(PropertyPhotoPeer::PHOTO_TYPE_ID, '');
      $criterion->addOr($c->getNewCriterion(PropertyPhotoPeer::PHOTO_TYPE_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['photo_type_id']) && $this->filters['photo_type_id'] !== '')
    {
      $c->add(PropertyPhotoPeer::PHOTO_TYPE_ID, $this->filters['photo_type_id']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/property_photo/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = PropertyPhotoPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/property_photo/sort') == 'asc')
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
      'property_photo{name}' => 'Name:',
      'property_photo{property_id}' => 'Property:',
      'property_photo{image}' => 'Image:',
      'property_photo{photo_type_id}' => 'Photo type:',
      'property_photo{display_order}' => 'Display order:',
    );
  }
}
