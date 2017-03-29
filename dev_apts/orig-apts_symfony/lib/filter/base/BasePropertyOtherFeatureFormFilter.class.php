<?php

/**
 * PropertyOtherFeature filter form base class.
 *
 * @package    apts_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyOtherFeatureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id'      => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'other_feature_id' => new sfWidgetFormPropelChoice(array('model' => 'OtherFeature', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'property_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'other_feature_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'OtherFeature', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_other_feature_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyOtherFeature';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'property_id'      => 'ForeignKey',
      'other_feature_id' => 'ForeignKey',
    );
  }
}
