<?php

/**
 * PropertyNeighborhood form base class.
 *
 * @method PropertyNeighborhood getObject() Returns the current form's model object
 *
 * @package    amc_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePropertyNeighborhoodForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'property_id' => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'url'         => new sfWidgetFormInputText(),
      'image'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'name'        => new sfValidatorString(array('max_length' => 128)),
      'description' => new sfValidatorString(),
      'url'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('property_neighborhood[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyNeighborhood';
  }


}
