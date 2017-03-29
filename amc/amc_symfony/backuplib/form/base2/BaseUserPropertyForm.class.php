<?php

/**
 * UserProperty form base class.
 *
 * @method UserProperty getObject() Returns the current form's model object
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUserPropertyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
      'property_id' => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'     => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
      'property_id' => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_property[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserProperty';
  }


}
