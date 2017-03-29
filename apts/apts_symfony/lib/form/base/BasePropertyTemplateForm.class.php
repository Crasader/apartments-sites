<?php

/**
 * PropertyTemplate form base class.
 *
 * @method PropertyTemplate getObject() Returns the current form's model object
 *
 * @package    apts_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePropertyTemplateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'property_id'                => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'logo_image'                 => new sfWidgetFormInputText(),
      'home_image'                 => new sfWidgetFormInputText(),
      'welcome'                    => new sfWidgetFormInputText(),
      'description'                => new sfWidgetFormTextarea(),
      'announcements'              => new sfWidgetFormTextarea(),
      'style_color'                => new sfWidgetFormInputText(),
      'background_color'           => new sfWidgetFormInputText(),
      'chat'                       => new sfWidgetFormTextarea(),
      'rentalapp_file'             => new sfWidgetFormInputText(),
      'map_html'                   => new sfWidgetFormTextarea(),
      'map_frame_src'              => new sfWidgetFormTextarea(),
      'community_image'            => new sfWidgetFormInputText(),
      'community_description'      => new sfWidgetFormTextarea(),
      'community_attractions_list' => new sfWidgetFormTextarea(),
      'custom_page_name'           => new sfWidgetFormInputText(),
      'custom_page_perma_link'     => new sfWidgetFormInputText(),
      'custom_page_content'        => new sfWidgetFormTextarea(),
      'home_flash'                 => new sfWidgetFormInputText(),
      'tracking_code'              => new sfWidgetFormTextarea(),
      'contact_email_text'         => new sfWidgetFormTextarea(),
      'show_walkscore'             => new sfWidgetFormInputCheckbox(),
      'email'                      => new sfWidgetFormTextarea(),
      'facebook_url'               => new sfWidgetFormTextarea(),
      'acacia_home1_desc'          => new sfWidgetFormInputText(),
      'acacia_features_desc'       => new sfWidgetFormTextarea(),
      'acacia_home2_desc'          => new sfWidgetFormInputText(),
      'acacia_home3_desc'          => new sfWidgetFormInputText(),
      'acacia_floorplan_desc'      => new sfWidgetFormTextarea(),
      'acacia_ebrochure_desc'      => new sfWidgetFormTextarea(),
      'latitude'                   => new sfWidgetFormInputText(),
      'longitude'                  => new sfWidgetFormInputText(),
      'online_application_url'     => new sfWidgetFormTextarea(),
      'e_brochure'                 => new sfWidgetFormInputText(),
      'src_3dtour'                 => new sfWidgetFormTextarea(),
      'home_photo_desc'            => new sfWidgetFormTextarea(),
      'gmap_key'                   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id'                => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'logo_image'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'home_image'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'welcome'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'                => new sfValidatorString(array('required' => false)),
      'announcements'              => new sfValidatorString(array('required' => false)),
      'style_color'                => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'background_color'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'chat'                       => new sfValidatorString(array('required' => false)),
      'rentalapp_file'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'map_html'                   => new sfValidatorString(array('required' => false)),
      'map_frame_src'              => new sfValidatorString(array('required' => false)),
      'community_image'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'community_description'      => new sfValidatorString(array('required' => false)),
      'community_attractions_list' => new sfValidatorString(array('required' => false)),
      'custom_page_name'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'custom_page_perma_link'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'custom_page_content'        => new sfValidatorString(array('required' => false)),
      'home_flash'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tracking_code'              => new sfValidatorString(array('required' => false)),
      'contact_email_text'         => new sfValidatorString(array('required' => false)),
      'show_walkscore'             => new sfValidatorBoolean(),
      'email'                      => new sfValidatorString(array('required' => false)),
      'facebook_url'               => new sfValidatorString(array('required' => false)),
      'acacia_home1_desc'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'acacia_features_desc'       => new sfValidatorString(array('required' => false)),
      'acacia_home2_desc'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'acacia_home3_desc'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'acacia_floorplan_desc'      => new sfValidatorString(array('required' => false)),
      'acacia_ebrochure_desc'      => new sfValidatorString(array('required' => false)),
      'latitude'                   => new sfValidatorNumber(array('required' => false)),
      'longitude'                  => new sfValidatorNumber(array('required' => false)),
      'online_application_url'     => new sfValidatorString(array('required' => false)),
      'e_brochure'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'src_3dtour'                 => new sfValidatorString(array('required' => false)),
      'home_photo_desc'            => new sfValidatorString(array('required' => false)),
      'gmap_key'                   => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('property_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyTemplate';
  }


}
