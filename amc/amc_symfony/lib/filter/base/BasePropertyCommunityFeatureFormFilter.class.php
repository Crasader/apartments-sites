<?php

/**
 * PropertyCommunityFeature filter form base class.
 *
 * @package    amc_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyCommunityFeatureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id'          => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'community_feature_id' => new sfWidgetFormPropelChoice(array('model' => 'CommunityFeature', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'property_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'community_feature_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CommunityFeature', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_community_feature_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyCommunityFeature';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'property_id'          => 'ForeignKey',
      'community_feature_id' => 'ForeignKey',
    );
  }
}
