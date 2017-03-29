<?php

/**
 * PropertyTemplate filter form base class.
 *
 * @package    amc_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyTemplateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id'                => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'logo_image'                 => new sfWidgetFormFilterInput(),
      'home_image'                 => new sfWidgetFormFilterInput(),
      'welcome'                    => new sfWidgetFormFilterInput(),
      'description'                => new sfWidgetFormFilterInput(),
      'announcements'              => new sfWidgetFormFilterInput(),
      'style_color'                => new sfWidgetFormFilterInput(),
      'background_color'           => new sfWidgetFormFilterInput(),
      'chat'                       => new sfWidgetFormFilterInput(),
      'rentalapp_file'             => new sfWidgetFormFilterInput(),
      'map_html'                   => new sfWidgetFormFilterInput(),
      'map_frame_src'              => new sfWidgetFormFilterInput(),
      'community_image'            => new sfWidgetFormFilterInput(),
      'community_description'      => new sfWidgetFormFilterInput(),
      'community_attractions_list' => new sfWidgetFormFilterInput(),
      'custom_page_name'           => new sfWidgetFormFilterInput(),
      'custom_page_perma_link'     => new sfWidgetFormFilterInput(),
      'custom_page_content'        => new sfWidgetFormFilterInput(),
      'home_flash'                 => new sfWidgetFormFilterInput(),
      'tracking_code'              => new sfWidgetFormFilterInput(),
      'contact_email_text'         => new sfWidgetFormFilterInput(),
      'show_walkscore'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'email'                      => new sfWidgetFormFilterInput(),
      'facebook_url'               => new sfWidgetFormFilterInput(),
      'acacia_home1_desc'          => new sfWidgetFormFilterInput(),
      'acacia_features_desc'       => new sfWidgetFormFilterInput(),
      'acacia_home2_desc'          => new sfWidgetFormFilterInput(),
      'acacia_home3_desc'          => new sfWidgetFormFilterInput(),
      'acacia_floorplan_desc'      => new sfWidgetFormFilterInput(),
      'acacia_ebrochure_desc'      => new sfWidgetFormFilterInput(),
      'latitude'                   => new sfWidgetFormFilterInput(),
      'longitude'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'property_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'logo_image'                 => new sfValidatorPass(array('required' => false)),
      'home_image'                 => new sfValidatorPass(array('required' => false)),
      'welcome'                    => new sfValidatorPass(array('required' => false)),
      'description'                => new sfValidatorPass(array('required' => false)),
      'announcements'              => new sfValidatorPass(array('required' => false)),
      'style_color'                => new sfValidatorPass(array('required' => false)),
      'background_color'           => new sfValidatorPass(array('required' => false)),
      'chat'                       => new sfValidatorPass(array('required' => false)),
      'rentalapp_file'             => new sfValidatorPass(array('required' => false)),
      'map_html'                   => new sfValidatorPass(array('required' => false)),
      'map_frame_src'              => new sfValidatorPass(array('required' => false)),
      'community_image'            => new sfValidatorPass(array('required' => false)),
      'community_description'      => new sfValidatorPass(array('required' => false)),
      'community_attractions_list' => new sfValidatorPass(array('required' => false)),
      'custom_page_name'           => new sfValidatorPass(array('required' => false)),
      'custom_page_perma_link'     => new sfValidatorPass(array('required' => false)),
      'custom_page_content'        => new sfValidatorPass(array('required' => false)),
      'home_flash'                 => new sfValidatorPass(array('required' => false)),
      'tracking_code'              => new sfValidatorPass(array('required' => false)),
      'contact_email_text'         => new sfValidatorPass(array('required' => false)),
      'show_walkscore'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'email'                      => new sfValidatorPass(array('required' => false)),
      'facebook_url'               => new sfValidatorPass(array('required' => false)),
      'acacia_home1_desc'          => new sfValidatorPass(array('required' => false)),
      'acacia_features_desc'       => new sfValidatorPass(array('required' => false)),
      'acacia_home2_desc'          => new sfValidatorPass(array('required' => false)),
      'acacia_home3_desc'          => new sfValidatorPass(array('required' => false)),
      'acacia_floorplan_desc'      => new sfValidatorPass(array('required' => false)),
      'acacia_ebrochure_desc'      => new sfValidatorPass(array('required' => false)),
      'latitude'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('property_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyTemplate';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'property_id'                => 'ForeignKey',
      'logo_image'                 => 'Text',
      'home_image'                 => 'Text',
      'welcome'                    => 'Text',
      'description'                => 'Text',
      'announcements'              => 'Text',
      'style_color'                => 'Text',
      'background_color'           => 'Text',
      'chat'                       => 'Text',
      'rentalapp_file'             => 'Text',
      'map_html'                   => 'Text',
      'map_frame_src'              => 'Text',
      'community_image'            => 'Text',
      'community_description'      => 'Text',
      'community_attractions_list' => 'Text',
      'custom_page_name'           => 'Text',
      'custom_page_perma_link'     => 'Text',
      'custom_page_content'        => 'Text',
      'home_flash'                 => 'Text',
      'tracking_code'              => 'Text',
      'contact_email_text'         => 'Text',
      'show_walkscore'             => 'Boolean',
      'email'                      => 'Text',
      'facebook_url'               => 'Text',
      'acacia_home1_desc'          => 'Text',
      'acacia_features_desc'       => 'Text',
      'acacia_home2_desc'          => 'Text',
      'acacia_home3_desc'          => 'Text',
      'acacia_floorplan_desc'      => 'Text',
      'acacia_ebrochure_desc'      => 'Text',
      'latitude'                   => 'Number',
      'longitude'                  => 'Number',
    );
  }
}
