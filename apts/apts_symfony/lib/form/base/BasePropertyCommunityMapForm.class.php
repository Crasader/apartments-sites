<?php

/**
 * PropertyCommunityMap form base class.
 *
 * @method PropertyCommunityMap getObject() Returns the current form's model object
 *
 * @package    apts_symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePropertyCommunityMapForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'property_id' => new sfWidgetFormInputText(),
      'type'        => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'latitude'    => new sfWidgetFormInputText(),
      'longitude'   => new sfWidgetFormInputText(),
      'url'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'type'        => new sfValidatorString(),
      'name'        => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'latitude'    => new sfValidatorNumber(array('required' => false)),
      'longitude'   => new sfValidatorNumber(array('required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('property_community_map[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyCommunityMap';
  }


}
