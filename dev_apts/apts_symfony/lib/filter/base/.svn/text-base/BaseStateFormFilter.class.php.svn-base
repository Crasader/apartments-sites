<?php

/**
 * State filter form base class.
 *
 * @package    apts_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseStateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'order_by' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'code'     => new sfValidatorPass(array('required' => false)),
      'country'  => new sfValidatorPass(array('required' => false)),
      'order_by' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('state_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'State';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'code'     => 'Text',
      'country'  => 'Text',
      'order_by' => 'Number',
    );
  }
}
