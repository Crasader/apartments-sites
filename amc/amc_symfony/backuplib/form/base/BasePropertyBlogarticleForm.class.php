<?php

/**
 * PropertyBlogarticle form base class.
 *
 * @method PropertyBlogarticle getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePropertyBlogarticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'property_id'     => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => false)),
      'title'           => new sfWidgetFormInputText(),
      'perma_link'      => new sfWidgetFormInputText(),
      'article_image1'  => new sfWidgetFormInputText(),
      'article_image2'  => new sfWidgetFormInputText(),
      'article_content' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'property_id'     => new sfValidatorPropelChoice(array('model' => 'Property', 'column' => 'id')),
      'title'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'perma_link'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'article_image1'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'article_image2'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'article_content' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('property_blogarticle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyBlogarticle';
  }


}
