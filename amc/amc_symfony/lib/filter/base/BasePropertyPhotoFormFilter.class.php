<?php

/**
 * PropertyPhoto filter form base class.
 *
 * @package    amc_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyPhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id'   => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo_type_id' => new sfWidgetFormPropelChoice(array('model' => 'PhotoType', 'add_empty' => true)),
      'display_order' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'property_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'name'          => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'photo_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PhotoType', 'column' => 'id')),
      'display_order' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('property_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyPhoto';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'property_id'   => 'ForeignKey',
      'name'          => 'Text',
      'image'         => 'Text',
      'photo_type_id' => 'ForeignKey',
      'display_order' => 'Number',
    );
  }
}
