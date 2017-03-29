<?php

/**
 * PropertyPhoto form base class.
 *
 * @method PropertyPhoto getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePropertyPhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'property_id'   => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'name'          => new sfWidgetFormInputText(),
      'image'         => new sfWidgetFormInputText(),
      'photo_type_id' => new sfWidgetFormPropelChoice(array('model' => 'PhotoType', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id'   => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'name'          => new sfValidatorString(array('max_length' => 50)),
      'image'         => new sfValidatorString(array('max_length' => 50)),
      'photo_type_id' => new sfValidatorPropelChoice(array('model' => 'PhotoType', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('property_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyPhoto';
  }


}
