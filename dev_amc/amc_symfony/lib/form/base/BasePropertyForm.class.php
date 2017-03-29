<?php

/**
 * Property form base class.
 *
 * @method Property getObject() Returns the current form's model object
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePropertyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'code'        => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'address'     => new sfWidgetFormInputText(),
      'city'        => new sfWidgetFormInputText(),
      'state_id'    => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => false)),
      'zip'         => new sfWidgetFormInputText(),
      'phone'       => new sfWidgetFormInputText(),
      'fax'         => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'image'       => new sfWidgetFormInputText(),
      'url'         => new sfWidgetFormInputText(),
      'price_range' => new sfWidgetFormInputText(),
      'unit_type'   => new sfWidgetFormInputText(),
      'special'     => new sfWidgetFormInputText(),
      'mercial'     => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'hours'       => new sfWidgetFormTextarea(),
      'pet_policy'  => new sfWidgetFormTextarea(),
      'directions'  => new sfWidgetFormTextarea(),
      'featured'    => new sfWidgetFormInputCheckbox(),
      'status_id'   => new sfWidgetFormPropelChoice(array('model' => 'Status', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 50)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'address'     => new sfValidatorString(array('max_length' => 128)),
      'city'        => new sfValidatorString(array('max_length' => 50)),
      'state_id'    => new sfValidatorPropelChoice(array('model' => 'State', 'column' => 'id')),
      'zip'         => new sfValidatorString(array('max_length' => 20)),
      'phone'       => new sfValidatorString(array('max_length' => 20)),
      'fax'         => new sfValidatorString(array('max_length' => 20)),
      'email'       => new sfValidatorString(array('max_length' => 128)),
      'image'       => new sfValidatorString(array('max_length' => 50)),
      'url'         => new sfValidatorString(array('max_length' => 150)),
      'price_range' => new sfValidatorString(array('max_length' => 50)),
      'unit_type'   => new sfValidatorString(array('max_length' => 50)),
      'special'     => new sfValidatorString(array('max_length' => 100)),
      'mercial'     => new sfValidatorString(array('max_length' => 150)),
      'description' => new sfValidatorString(),
      'hours'       => new sfValidatorString(),
      'pet_policy'  => new sfValidatorString(),
      'directions'  => new sfValidatorString(),
      'featured'    => new sfValidatorBoolean(),
      'status_id'   => new sfValidatorPropelChoice(array('model' => 'Status', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Property';
  }


}
