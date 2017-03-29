<?php

/**
 * ZipCode form base class.
 *
 * @method ZipCode getObject() Returns the current form's model object
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseZipCodeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'zip_code'             => new sfWidgetFormInputHidden(),
      'zip_code_type'        => new sfWidgetFormInputText(),
      'city'                 => new sfWidgetFormInputText(),
      'state'                => new sfWidgetFormInputText(),
      'location_type'        => new sfWidgetFormInputText(),
      'lat'                  => new sfWidgetFormInputText(),
      'long'                 => new sfWidgetFormInputText(),
      'location'             => new sfWidgetFormInputText(),
      'decommisioned'        => new sfWidgetFormInputText(),
      'tax_returns_filed'    => new sfWidgetFormInputText(),
      'estimated_population' => new sfWidgetFormInputText(),
      'total_wages'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'zip_code'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getZipCode()), 'empty_value' => $this->getObject()->getZipCode(), 'required' => false)),
      'zip_code_type'        => new sfValidatorString(array('max_length' => 32)),
      'city'                 => new sfValidatorString(array('max_length' => 128)),
      'state'                => new sfValidatorString(array('max_length' => 4)),
      'location_type'        => new sfValidatorString(array('max_length' => 32)),
      'lat'                  => new sfValidatorNumber(),
      'long'                 => new sfValidatorNumber(),
      'location'             => new sfValidatorString(array('max_length' => 32)),
      'decommisioned'        => new sfValidatorString(array('max_length' => 12)),
      'tax_returns_filed'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'estimated_population' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'total_wages'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zip_code[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ZipCode';
  }


}
