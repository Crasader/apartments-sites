<?php

/**
 * PropertyBlogarticle filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePropertyBlogarticleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'property_id'     => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'title'           => new sfWidgetFormFilterInput(),
      'perma_link'      => new sfWidgetFormFilterInput(),
      'article_image1'  => new sfWidgetFormFilterInput(),
      'article_image2'  => new sfWidgetFormFilterInput(),
      'article_content' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'property_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'title'           => new sfValidatorPass(array('required' => false)),
      'perma_link'      => new sfValidatorPass(array('required' => false)),
      'article_image1'  => new sfValidatorPass(array('required' => false)),
      'article_image2'  => new sfValidatorPass(array('required' => false)),
      'article_content' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('property_blogarticle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropertyBlogarticle';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'property_id'     => 'ForeignKey',
      'title'           => 'Text',
      'perma_link'      => 'Text',
      'article_image1'  => 'Text',
      'article_image2'  => 'Text',
      'article_content' => 'Text',
    );
  }
}
