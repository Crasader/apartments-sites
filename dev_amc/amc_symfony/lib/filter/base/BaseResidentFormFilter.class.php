<?php

/**
 * Resident filter form base class.
 *
 * @package    amc_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseResidentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tenantid'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'property_id' => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'status_id'   => new sfWidgetFormPropelChoice(array('model' => 'Status', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'first_name'  => new sfValidatorPass(array('required' => false)),
      'last_name'   => new sfValidatorPass(array('required' => false)),
      'password'    => new sfValidatorPass(array('required' => false)),
      'email'       => new sfValidatorPass(array('required' => false)),
      'tenantid'    => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'property_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'status_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Status', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('resident_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resident';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'first_name'  => 'Text',
      'last_name'   => 'Text',
      'password'    => 'Text',
      'email'       => 'Text',
      'tenantid'    => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'property_id' => 'ForeignKey',
      'status_id'   => 'ForeignKey',
    );
  }
}
