<?php

/**
 * autoProperty_templates actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoProperty_templates
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoProperty_templatesActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('property_templates', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('PropertyTemplate', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/property_template')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/property_template');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('property_templates', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('property_templates', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (PropertyTemplatePeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Property templates. Make sure they do not have any associated items.');
      return $this->forward('property_templates', 'list');
    }

    return $this->redirect('property_templates/list');
  }

  public function executeEdit($request)
  {
    $this->property_template = $this->getPropertyTemplateOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updatePropertyTemplateFromRequest();

      try
      {
        $this->savePropertyTemplate($this->property_template);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Property templates.');
        return $this->forward('property_templates', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('property_templates/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('property_templates/list');
      }
      else
      {
        return $this->redirect('property_templates/edit?id='.$this->property_template->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->property_template = PropertyTemplatePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->property_template);

    try
    {
      $this->deletePropertyTemplate($this->property_template);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Property template. Make sure it does not have any associated items.');
      return $this->forward('property_templates', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getRentalappFile();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

      $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getCommunityImage();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

    return $this->redirect('property_templates/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->property_template = $this->getPropertyTemplateOrCreate();
    $this->updatePropertyTemplateFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function savePropertyTemplate($property_template)
  {
    $property_template->save();

  }

  protected function deletePropertyTemplate($property_template)
  {
    $property_template->delete();
  }

  protected function updatePropertyTemplateFromRequest()
  {
    $property_template = $this->getRequestParameter('property_template');

    if (isset($property_template['welcome']))
    {
      $this->property_template->setWelcome($property_template['welcome']);
    }
    if (isset($property_template['announcements']))
    {
      $this->property_template->setAnnouncements($property_template['announcements']);
    }
    if (isset($property_template['email']))
    {
      $this->property_template->setEmail($property_template['email']);
    }
    if (isset($property_template['style_color']))
    {
      $this->property_template->setStyleColor($property_template['style_color']);
    }
    if (isset($property_template['background_color']))
    {
      $this->property_template->setBackgroundColor($property_template['background_color']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getRentalappFile();
    if (!$this->getRequest()->hasErrors() && isset($property_template['rentalapp_file_remove']))
    {
      $this->property_template->setRentalappFile('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_template[rentalapp_file]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_template[rentalapp_file]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_template[rentalapp_file]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_template[rentalapp_file]', sfConfig::get('sf_upload_dir')."/properties/".$fileName.$ext);
      $this->property_template->setRentalappFile($fileName.$ext);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getCommunityImage();
    if (!$this->getRequest()->hasErrors() && isset($property_template['community_image_remove']))
    {
      $this->property_template->setCommunityImage('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_template[community_image]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_template[community_image]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_template[community_image]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_template[community_image]', sfConfig::get('sf_upload_dir')."/properties/".$fileName.$ext);
      $this->property_template->setCommunityImage($fileName.$ext);
    }
    if (isset($property_template['community_description']))
    {
      $this->property_template->setCommunityDescription($property_template['community_description']);
    }
    $this->property_template->setShowWalkscore(isset($property_template['show_walkscore']) ? $property_template['show_walkscore'] : 0);
    if (isset($property_template['community_attractions_list']))
    {
      $this->property_template->setCommunityAttractionsList($property_template['community_attractions_list']);
    }
    if (isset($property_template['custom_page_name']))
    {
      $this->property_template->setCustomPageName($property_template['custom_page_name']);
    }
    if (isset($property_template['custom_page_content']))
    {
      $this->property_template->setCustomPageContent($property_template['custom_page_content']);
    }
    if (isset($property_template['contact_email_text']))
    {
      $this->property_template->setContactEmailText($property_template['contact_email_text']);
    }
    if (isset($property_template['facebook_url']))
    {
      $this->property_template->setFacebookUrl($property_template['facebook_url']);
    }
  }

  protected function getPropertyTemplateOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $property_template = new PropertyTemplate();
    }
    else
    {
      $property_template = PropertyTemplatePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($property_template);
    }

    return $property_template;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/property_template/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/property_template/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/property_template/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/property_template/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = PropertyTemplatePeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/property_template/sort') == 'asc')
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
      'property_template{property}' => 'Property:',
      'property_template{welcome}' => 'Welcome:',
      'property_template{description}' => 'Description:',
      'property_template{announcements}' => 'Announcements:',
      'property_template{email}' => 'Email:',
      'property_template{style_color}' => 'Style color:',
      'property_template{background_color}' => 'Background color:',
      'property_template{rentalapp_file}' => 'Rental Application:',
      'property_template{community_image}' => 'Community image:',
      'property_template{community_description}' => 'Community description:',
      'property_template{show_walkscore}' => 'Show walkscore:',
      'property_template{community_attractions_list}' => 'Community attractions list:',
      'property_template{custom_page_name}' => 'Custom page name:',
      'property_template{custom_page_content}' => 'Custom page content:',
      'property_template{contact_email_text}' => 'Contact email text:',
      'property_template{facebook_url}' => 'Facebook url:',
    );
  }
}
