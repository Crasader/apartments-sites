<?php

/**
 * Resident form base class.
 *
 * @method Resident getObject() Returns the current form's model object
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseResidentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'first_name'  => new sfWidgetFormInputText(),
      'last_name'   => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'tenantid'    => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'property_id' => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'status_id'   => new sfWidgetFormPropelChoice(array('model' => 'Status', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'first_name'  => new sfValidatorString(array('max_length' => 128)),
      'last_name'   => new sfValidatorString(array('max_length' => 128)),
      'password'    => new sfValidatorString(array('max_length' => 255)),
      'email'       => new sfValidatorString(array('max_length' => 255)),
      'tenantid'    => new sfValidatorString(array('max_length' => 24)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'property_id' => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'status_id'   => new sfValidatorPropelChoice(array('model' => 'Status', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('resident[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resident';
  }


}
