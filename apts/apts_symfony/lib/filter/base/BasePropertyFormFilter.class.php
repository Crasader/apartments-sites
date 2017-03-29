<?php

/**
 * Property filter form base class.
 *
 * @package    apts_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePropertyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'state_id'           => new sfWidgetFormPropelChoice(array('model' => 'State', 'add_empty' => true)),
      'zip'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fax'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price_range'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'unit_type'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'special'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mercial'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hours'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pet_policy'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'directions'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'featured'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'status_id'          => new sfWidgetFormPropelChoice(array('model' => 'Status', 'add_empty' => true)),
      'corporate_group_id' => new sfWidgetFormPropelChoice(array('model' => 'CorporateGroup', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'code'               => new sfValidatorPass(array('required' => false)),
      'name'               => new sfValidatorPass(array('required' => false)),
      'address'            => new sfValidatorPass(array('required' => false)),
      'city'               => new sfValidatorPass(array('required' => false)),
      'state_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'State', 'column' => 'id')),
      'zip'                => new sfValidatorPass(array('required' => false)),
      'phone'              => new sfValidatorPass(array('required' => false)),
      'fax'                => new sfValidatorPass(array('required' => false)),
      'email'              => new sfValidatorPass(array('required' => false)),
      'image'              => new sfValidatorPass(array('required' => false)),
      'url'                => new sfValidatorPass(array('required' => false)),
      'price_range'        => new sfValidatorPass(array('required' => false)),
      'unit_type'          => new sfValidatorPass(array('required' => false)),
      'special'            => new sfValidatorPass(array('required' => false)),
      'mercial'            => new sfValidatorPass(array('required' => false)),
      'description'        => new sfValidatorPass(array('required' => false)),
      'hours'              => new sfValidatorPass(array('required' => false)),
      'pet_policy'         => new sfValidatorPass(array('required' => false)),
      'directions'         => new sfValidatorPass(array('required' => false)),
      'featured'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'status_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Status', 'column' => 'id')),
      'corporate_group_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CorporateGroup', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Property';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'code'               => 'Text',
      'name'               => 'Text',
      'address'            => 'Text',
      'city'               => 'Text',
      'state_id'           => 'ForeignKey',
      'zip'                => 'Text',
      'phone'              => 'Text',
      'fax'                => 'Text',
      'email'              => 'Text',
      'image'              => 'Text',
      'url'                => 'Text',
      'price_range'        => 'Text',
      'unit_type'          => 'Text',
      'special'            => 'Text',
      'mercial'            => 'Text',
      'description'        => 'Text',
      'hours'              => 'Text',
      'pet_policy'         => 'Text',
      'directions'         => 'Text',
      'featured'           => 'Boolean',
      'status_id'          => 'ForeignKey',
      'corporate_group_id' => 'ForeignKey',
    );
  }
}
