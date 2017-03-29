<?php

/**
 * Contact form base class.
 *
 * @method Contact getObject() Returns the current form's model object
 *
 * @package    apts_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseContactForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'first_name'         => new sfWidgetFormInputText(),
      'last_name'          => new sfWidgetFormInputText(),
      'employer'           => new sfWidgetFormInputText(),
      'email'              => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'property_id'        => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'occupants'          => new sfWidgetFormInputText(),
      'pets'               => new sfWidgetFormInputText(),
      'when'               => new sfWidgetFormInputText(),
      'bedrooms'           => new sfWidgetFormInputText(),
      'howhear'            => new sfWidgetFormInputText(),
      'howcontact'         => new sfWidgetFormInputText(),
      'notes'              => new sfWidgetFormTextarea(),
      'phone'              => new sfWidgetFormInputText(),
      'fax'                => new sfWidgetFormInputText(),
      'corporate_group_id' => new sfWidgetFormPropelChoice(array('model' => 'CorporateGroup', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'first_name'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'last_name'          => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'employer'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'property_id'        => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'occupants'          => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'pets'               => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'when'               => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'bedrooms'           => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'howhear'            => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'howcontact'         => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'notes'              => new sfValidatorString(array('required' => false)),
      'phone'              => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'fax'                => new sfValidatorString(array('max_length' => 48, 'required' => false)),
      'corporate_group_id' => new sfValidatorPropelChoice(array('model' => 'CorporateGroup', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }


}
