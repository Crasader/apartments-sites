<?php

/**
 * PropertyFloorplan form base class.
 *
 * @method PropertyFloorplan getObject() Returns the current form's model object
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePropertyFloorplanForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'property_id'       => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'name'              => new sfWidgetFormInputText(),
      'bedrooms'          => new sfWidgetFormInputText(),
      'bathrooms'         => new sfWidgetFormInputText(),
      'square_feet'       => new sfWidgetFormInputText(),
      'price'             => new sfWidgetFormInputText(),
      'lease_term'        => new sfWidgetFormInputText(),
      'deposit'           => new sfWidgetFormInputText(),
      'image'             => new sfWidgetFormInputText(),
      'availability_link' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id'       => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'name'              => new sfValidatorString(array('max_length' => 50)),
      'bedrooms'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'bathrooms'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'square_feet'       => new sfValidatorString(array('max_length' => 50)),
      'price'             => new sfValidatorString(array('max_length' => 50)),
      'lease_term'        => new sfValidatorString(array('max_length' => 50)),
      'deposit'           => new sfValidatorString(array('max_length' => 50)),
      'image'             => new sfValidatorString(array('max_length' => 50)),
      'availability_link' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('property_floorplan[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyFloorplan';
  }


}
