<?php

/**
 * PropertyCommunityMap filter form base class.
 *
 * @package    amc_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyCommunityMapFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'        => new sfWidgetFormFilterInput(),
      'latitude'    => new sfWidgetFormFilterInput(),
      'longitude'   => new sfWidgetFormFilterInput(),
      'url'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'property_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'        => new sfValidatorPass(array('required' => false)),
      'name'        => new sfValidatorPass(array('required' => false)),
      'latitude'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'url'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('property_community_map_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyCommunityMap';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'property_id' => 'Number',
      'type'        => 'Text',
      'name'        => 'Text',
      'latitude'    => 'Number',
      'longitude'   => 'Number',
      'url'         => 'Text',
    );
  }
}
