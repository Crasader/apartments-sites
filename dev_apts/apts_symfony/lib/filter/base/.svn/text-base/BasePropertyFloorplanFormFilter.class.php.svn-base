<?php

/**
 * PropertyFloorplan filter form base class.
 *
 * @package    apts_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyFloorplanFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id'       => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bedrooms'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bathrooms'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'square_feet'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lease_term'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'deposit'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'availability_link' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'property_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'name'              => new sfValidatorPass(array('required' => false)),
      'bedrooms'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bathrooms'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'square_feet'       => new sfValidatorPass(array('required' => false)),
      'price'             => new sfValidatorPass(array('required' => false)),
      'lease_term'        => new sfValidatorPass(array('required' => false)),
      'deposit'           => new sfValidatorPass(array('required' => false)),
      'image'             => new sfValidatorPass(array('required' => false)),
      'availability_link' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('property_floorplan_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyFloorplan';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'property_id'       => 'ForeignKey',
      'name'              => 'Text',
      'bedrooms'          => 'Number',
      'bathrooms'         => 'Number',
      'square_feet'       => 'Text',
      'price'             => 'Text',
      'lease_term'        => 'Text',
      'deposit'           => 'Text',
      'image'             => 'Text',
      'availability_link' => 'Text',
    );
  }
}
