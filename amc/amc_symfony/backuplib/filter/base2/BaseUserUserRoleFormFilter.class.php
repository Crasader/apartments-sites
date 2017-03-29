<?php

/**
 * UserUserRole filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseUserUserRoleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => true)),
      'user_role_id' => new sfWidgetFormPropelChoice(array('model' => 'UserRole', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
      'user_role_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'UserRole', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_user_role_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserUserRole';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'user_id'      => 'ForeignKey',
      'user_role_id' => 'ForeignKey',
    );
  }
}
