<?php

/**
 * UserUserRole form base class.
 *
 * @method UserUserRole getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseUserUserRoleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormPropelChoice(array('model' => 'User', 'add_empty' => false)),
      'user_role_id' => new sfWidgetFormPropelChoice(array('model' => 'UserRole', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'user_id'      => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id')),
      'user_role_id' => new sfValidatorPropelChoice(array('model' => 'UserRole', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_user_role[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserUserRole';
  }


}
