<?php

/**
 * PropertyNeighborhood filter form base class.
 *
 * @package    apts_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyNeighborhoodFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'         => new sfWidgetFormFilterInput(),
      'image'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'property_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'url'         => new sfValidatorPass(array('required' => false)),
      'image'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('property_neighborhood_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyNeighborhood';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'property_id' => 'Number',
      'name'        => 'Text',
      'description' => 'Text',
      'url'         => 'Text',
      'image'       => 'Text',
    );
  }
}
