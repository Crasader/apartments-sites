<?php

/**
 * PropertyOtherFeature form base class.
 *
 * @method PropertyOtherFeature getObject() Returns the current form's model object
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePropertyOtherFeatureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'property_id'      => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'other_feature_id' => new sfWidgetFormPropelChoice(array('model' => 'OtherFeature', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id'      => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'other_feature_id' => new sfValidatorPropelChoice(array('model' => 'OtherFeature', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_other_feature[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyOtherFeature';
  }


}
