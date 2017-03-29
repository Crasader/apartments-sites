<?php

/**
 * PropertyApartmentFeature filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePropertyApartmentFeatureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id'          => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'apartment_feature_id' => new sfWidgetFormPropelChoice(array('model' => 'ApartmentFeature', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'property_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'apartment_feature_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ApartmentFeature', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_apartment_feature_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyApartmentFeature';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'property_id'          => 'ForeignKey',
      'apartment_feature_id' => 'ForeignKey',
    );
  }
}
