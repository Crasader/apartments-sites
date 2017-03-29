<?php

/**
 * ZipCode filter form base class.
 *
 * @package    amc_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseZipCodeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'zip_code_type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'state'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'location_type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lat'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'long'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'location'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'decommisioned'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tax_returns_filed'    => new sfWidgetFormFilterInput(),
      'estimated_population' => new sfWidgetFormFilterInput(),
      'total_wages'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'zip_code_type'        => new sfValidatorPass(array('required' => false)),
      'city'                 => new sfValidatorPass(array('required' => false)),
      'state'                => new sfValidatorPass(array('required' => false)),
      'location_type'        => new sfValidatorPass(array('required' => false)),
      'lat'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'long'                 => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'location'             => new sfValidatorPass(array('required' => false)),
      'decommisioned'        => new sfValidatorPass(array('required' => false)),
      'tax_returns_filed'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estimated_population' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_wages'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('zip_code_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ZipCode';
  }

  public function getFields()
  {
    return array(
      'zip_code'             => 'Text',
      'zip_code_type'        => 'Text',
      'city'                 => 'Text',
      'state'                => 'Text',
      'location_type'        => 'Text',
      'lat'                  => 'Number',
      'long'                 => 'Number',
      'location'             => 'Text',
      'decommisioned'        => 'Text',
      'tax_returns_filed'    => 'Number',
      'estimated_population' => 'Number',
      'total_wages'          => 'Number',
    );
  }
}
