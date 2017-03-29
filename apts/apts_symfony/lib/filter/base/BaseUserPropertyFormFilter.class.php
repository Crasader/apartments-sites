<?php

/**
 * UserProperty filter form base class.
 *
 * @package    apts_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUserPropertyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => true)),
      'property_id' => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
      'property_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_property_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserProperty';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'ForeignKey',
      'property_id' => 'ForeignKey',
    );
  }
}
