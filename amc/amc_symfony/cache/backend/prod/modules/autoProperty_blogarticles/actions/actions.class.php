<?php

/**
 * autoProperty_blogarticles actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoProperty_blogarticles
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 3501 2007-02-18 10:28:17Z fabien $
 */
class autoProperty_blogarticlesActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('property_blogarticles', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/property_blogarticle/filters');
    
    // pager
    $this->finder = DbFinder::from('PropertyBlogarticle');
    $this->addSort($this->finder);
    $this->addFilters($this->finder);
    $this->pager = $this->finder->paginate($this->getRequestParameter('page', 1), 20);
  }

  public function executeCreate()
  {
    return $this->forward('property_blogarticles', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('property_blogarticles', 'edit');
  }

  public function executeEdit()
  {
    $this->property_blogarticle = $this->getPropertyBlogarticleOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updatePropertyBlogarticleFromRequest();

      $this->savePropertyBlogarticle($this->property_blogarticle);

      $this->setFlashCompatible('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('property_blogarticles/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('property_blogarticles/list');
      }
      else
      {
        return $this->redirect('property_blogarticles/edit?id='.$this->property_blogarticle->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->property_blogarticle = DbFinder::from('PropertyBlogarticle')->findPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->property_blogarticle);

    try
    {
      $this->deletePropertyBlogarticle($this->property_blogarticle);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Property blogarticle. Make sure it does not have any associated items.');
      return $this->forward('property_blogarticles', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."/blogarticles/".$this->property_blogarticle->getArticleImage1();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

      $currentFile = sfConfig::get('sf_upload_dir')."/blogarticles/".$this->property_blogarticle->getArticleImage2();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

    return $this->redirect('property_blogarticles/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->property_blogarticle = $this->getPropertyBlogarticleOrCreate();
    $this->updatePropertyBlogarticleFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function savePropertyBlogarticle($property_blogarticle)
  {
    $property_blogarticle->save();

  }

  protected function deletePropertyBlogarticle($property_blogarticle)
  {
    $property_blogarticle->delete();
  }

  protected function updatePropertyBlogarticleFromRequest()
  {
    $property_blogarticle = $this->getRequestParameter('property_blogarticle');

    if (isset($property_blogarticle['property_id']))
    {
  $this->property_blogarticle->setPropertyId($property_blogarticle['property_id'] ? $property_blogarticle['property_id'] : null);
    }
    if (isset($property_blogarticle['title']))
    {
    $this->property_blogarticle->setTitle($property_blogarticle['title']);
    }
    if (isset($property_blogarticle['perma_link']))
    {
    $this->property_blogarticle->setPermaLink($property_blogarticle['perma_link']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/blogarticles/".$this->property_blogarticle->getArticleImage1();
    if (!$this->getRequest()->hasErrors() && isset($property_blogarticle['article_image1_remove']))
    {
      $this->property_blogarticle->setArticleImage1('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_blogarticle[article_image1]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_blogarticle[article_image1]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_blogarticle[article_image1]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_blogarticle[article_image1]', sfConfig::get('sf_upload_dir')."/blogarticles/".$fileName.$ext);
      $this->property_blogarticle->setArticleImage1($fileName.$ext);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/blogarticles/".$this->property_blogarticle->getArticleImage2();
    if (!$this->getRequest()->hasErrors() && isset($property_blogarticle['article_image2_remove']))
    {
      $this->property_blogarticle->setArticleImage2('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_blogarticle[article_image2]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_blogarticle[article_image2]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_blogarticle[article_image2]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_blogarticle[article_image2]', sfConfig::get('sf_upload_dir')."/blogarticles/".$fileName.$ext);
      $this->property_blogarticle->setArticleImage2($fileName.$ext);
    }
    if (isset($property_blogarticle['article_content']))
    {
    $this->property_blogarticle->setArticleContent($property_blogarticle['article_content']);
    }
  }

  protected function getPropertyBlogarticleOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $property_blogarticle = new PropertyBlogarticle();
    }
    else
    {
      $finder = DbFinder::from('PropertyBlogarticle');
      $property_blogarticle = $finder->findPk($this->getRequestParameter($id));
      
      $this->forward404Unless($property_blogarticle);
    }

    return $property_blogarticle;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_blogarticle/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/property_blogarticle/filters');
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/property_blogarticle/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/property_blogarticle/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/property_blogarticle/sort'))
    {
    }
  }

  protected function addFilters($finder)
  {
    if (isset($this->filters['property_id_is_empty']))
    {
      $finder->where('PropertyId', '=', '');
      $finder->_or('PropertyId', 'is null', null);
    }
    else if (isset($this->filters['property_id']) && $this->filters['property_id'] !== '')
    {
      $finder->where('PropertyId', $this->filters['property_id']);
    }
  }

  protected function addSort($finder)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/property_blogarticle/sort'))
    {
      $sort_order = $this->getUser()->getAttribute('type', null, 'sf_admin/property_blogarticle/sort');
      switch($sort_column)
      {
        case 'property':
          $finder->orderByProperty($sort_order);
          break;
        default:
          $sort_column = sfInflector::camelize($sort_column);
          $finder->orderBy($sort_column, $sort_order);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'property_blogarticle{property_id}' => 'Property:',
      'property_blogarticle{title}' => 'Title:',
      'property_blogarticle{perma_link}' => 'Perma link:',
      'property_blogarticle{article_image1}' => 'Article image1:',
      'property_blogarticle{article_image2}' => 'Article image2:',
      'property_blogarticle{article_content}' => 'Article content:',
    );
  }
  
  // For 1.1 compatibility (why doesn't sfCompat10Plugin take care of that ?)
  protected function setFlashCompatible($name, $value)
  {
    if(method_exists($this, 'setFlash'))
    {
      parent::setFlash($name, $value);
    }
    else
    {
      $this->getUser()->setFlash($name, $value);
    }
  }
}
