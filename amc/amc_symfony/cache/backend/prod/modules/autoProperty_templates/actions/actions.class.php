<?php

/**
 * autoProperty_templates actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoProperty_templates
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 3501 2007-02-18 10:28:17Z fabien $
 */
class autoProperty_templatesActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('property_templates', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/property_template/filters');
    
    // pager
    $this->finder = DbFinder::from('PropertyTemplate');
    $this->addSort($this->finder);
    $this->addFilters($this->finder);
    $this->pager = $this->finder->paginate($this->getRequestParameter('page', 1), 20);
  }

  public function executeCreate()
  {
    return $this->forward('property_templates', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('property_templates', 'edit');
  }

  public function executeEdit()
  {
    $this->property_template = $this->getPropertyTemplateOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updatePropertyTemplateFromRequest();

      $this->savePropertyTemplate($this->property_template);

      $this->setFlashCompatible('notice', 'Your modifications have been saved');

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

  public function executeDelete()
  {
    $this->property_template = DbFinder::from('PropertyTemplate')->findPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->property_template);

    try
    {
      $this->deletePropertyTemplate($this->property_template);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Property template. Make sure it does not have any associated items.');
      return $this->forward('property_templates', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getLogoImage();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

      $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getHomeImage();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

      $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getHomeFlash();
      if (is_file($currentFile))
      {
        unlink($currentFile);
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

      $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getEBrochure();
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

    if (isset($property_template['property_id']))
    {
  $this->property_template->setPropertyId($property_template['property_id'] ? $property_template['property_id'] : null);
    }
    if (isset($property_template['welcome']))
    {
    $this->property_template->setWelcome($property_template['welcome']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getLogoImage();
    if (!$this->getRequest()->hasErrors() && isset($property_template['logo_image_remove']))
    {
      $this->property_template->setLogoImage('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_template[logo_image]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_template[logo_image]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_template[logo_image]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_template[logo_image]', sfConfig::get('sf_upload_dir')."/properties/".$fileName.$ext);
      $this->property_template->setLogoImage($fileName.$ext);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getHomeImage();
    if (!$this->getRequest()->hasErrors() && isset($property_template['home_image_remove']))
    {
      $this->property_template->setHomeImage('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_template[home_image]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_template[home_image]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_template[home_image]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_template[home_image]', sfConfig::get('sf_upload_dir')."/properties/".$fileName.$ext);
      $this->property_template->setHomeImage($fileName.$ext);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getHomeFlash();
    if (!$this->getRequest()->hasErrors() && isset($property_template['home_flash_remove']))
    {
      $this->property_template->setHomeFlash('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_template[home_flash]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_template[home_flash]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_template[home_flash]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_template[home_flash]', sfConfig::get('sf_upload_dir')."/properties/".$fileName.$ext);
      $this->property_template->setHomeFlash($fileName.$ext);
    }
    if (isset($property_template['description']))
    {
    $this->property_template->setDescription($property_template['description']);
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
    if (isset($property_template['chat']))
    {
    $this->property_template->setChat($property_template['chat']);
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
    if (isset($property_template['map_html']))
    {
    $this->property_template->setMapHtml($property_template['map_html']);
    }
    if (isset($property_template['map_frame_src']))
    {
    $this->property_template->setMapFrameSrc($property_template['map_frame_src']);
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
    if (isset($property_template['custom_page_perma_link']))
    {
    $this->property_template->setCustomPagePermaLink($property_template['custom_page_perma_link']);
    }
    if (isset($property_template['custom_page_content']))
    {
    $this->property_template->setCustomPageContent($property_template['custom_page_content']);
    }
    if (isset($property_template['tracking_code']))
    {
    $this->property_template->setTrackingCode($property_template['tracking_code']);
    }
    if (isset($property_template['contact_email_text']))
    {
    $this->property_template->setContactEmailText($property_template['contact_email_text']);
    }
    if (isset($property_template['facebook_url']))
    {
    $this->property_template->setFacebookUrl($property_template['facebook_url']);
    }
    if (isset($property_template['online_application_url']))
    {
    $this->property_template->setOnlineApplicationUrl($property_template['online_application_url']);
    }
    if (isset($property_template['src3dtour']))
    {
    $this->property_template->setSrc3dtour($property_template['src3dtour']);
    }
    if (isset($property_template['home_photo_desc']))
    {
    $this->property_template->setHomePhotoDesc($property_template['home_photo_desc']);
    }
    if (isset($property_template['gmap_key']))
    {
    $this->property_template->setGmapKey($property_template['gmap_key']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/properties/".$this->property_template->getEBrochure();
    if (!$this->getRequest()->hasErrors() && isset($property_template['e_brochure_remove']))
    {
      $this->property_template->setEBrochure('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('property_template[e_brochure]'))
    {
      $fileName = md5($this->getRequest()->getFileName('property_template[e_brochure]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('property_template[e_brochure]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('property_template[e_brochure]', sfConfig::get('sf_upload_dir')."/properties/".$fileName.$ext);
      $this->property_template->setEBrochure($fileName.$ext);
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
      $finder = DbFinder::from('PropertyTemplate');
      $property_template = $finder->findPk($this->getRequestParameter($id));
      
      $this->forward404Unless($property_template);
    }

    return $property_template;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/property_template/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/property_template/filters');
    }
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
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/property_template/sort'))
    {
      $sort_order = $this->getUser()->getAttribute('type', null, 'sf_admin/property_template/sort');
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
      'property_template{property_id}' => 'Property:',
      'property_template{welcome}' => 'Welcome:',
      'property_template{logo_image}' => 'Logo image:',
      'property_template{home_image}' => 'Home image:',
      'property_template{home_flash}' => 'Home flash:',
      'property_template{description}' => 'Description:',
      'property_template{announcements}' => 'Announcements:',
      'property_template{email}' => 'Email:',
      'property_template{style_color}' => 'Style color:',
      'property_template{background_color}' => 'Background color:',
      'property_template{chat}' => 'Chat:',
      'property_template{rentalapp_file}' => 'Rentalapp file:',
      'property_template{map_html}' => 'Map html:',
      'property_template{map_frame_src}' => 'Map frame src:',
      'property_template{community_image}' => 'Community image:',
      'property_template{community_description}' => 'Community description:',
      'property_template{show_walkscore}' => 'Show walkscore:',
      'property_template{community_attractions_list}' => 'Community attractions list:',
      'property_template{custom_page_name}' => 'Custom page name:',
      'property_template{custom_page_perma_link}' => 'Custom page perma link:',
      'property_template{custom_page_content}' => 'Custom page content:',
      'property_template{tracking_code}' => 'Tracking code:',
      'property_template{contact_email_text}' => 'Contact email text:',
      'property_template{facebook_url}' => 'Facebook url:',
      'property_template{online_application_url}' => 'Online application url:',
      'property_template{src3dtour}' => 'Src3dtour:',
      'property_template{home_photo_desc}' => 'Home photo desc:',
      'property_template{gmap_key}' => 'Gmap key:',
      'property_template{e_brochure}' => 'E brochure:',
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
