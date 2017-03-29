<?php

/**
 * PropertyCommunityFeature form base class.
 *
 * @method PropertyCommunityFeature getObject() Returns the current form's model object
 *
 * @package    apts_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePropertyCommunityFeatureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'property_id'          => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'community_feature_id' => new sfWidgetFormPropelChoice(array('model' => 'CommunityFeature', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id'          => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'community_feature_id' => new sfValidatorPropelChoice(array('model' => 'CommunityFeature', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_community_feature[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyCommunityFeature';
  }


}
