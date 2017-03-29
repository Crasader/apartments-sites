<?php

/**
 * PropertyApartmentFeature form base class.
 *
 * @method PropertyApartmentFeature getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePropertyApartmentFeatureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'property_id'          => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'apartment_feature_id' => new sfWidgetFormPropelChoice(array('model' => 'ApartmentFeature', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id'          => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'apartment_feature_id' => new sfValidatorPropelChoice(array('model' => 'ApartmentFeature', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_apartment_feature[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyApartmentFeature';
  }


}
