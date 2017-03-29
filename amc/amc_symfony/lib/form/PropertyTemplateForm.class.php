<?php

/**
 * PropertyTemplate form.
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PropertyTemplateForm extends BasePropertyTemplateForm
{
  public function configure()
  {
  	$this->widgetSchema'property_template_custom_page_content'] =  new sfWidgetFormTextareaTinyMCE(
      array(
        'width'=>550,
        'height'=>350,
        'config'=>'theme_advanced_disable: "anchor,image,cleanup,help"',
        'theme'   =>  sfConfig::get('app_tinymce_theme','advanced'),
      ),
      array(
        'class'   =>  'tiny_mce'
      )
    );

  }
}
