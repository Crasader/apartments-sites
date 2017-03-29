<?php

/**
 * Contact filter form base class.
 *
 * @package    amc_symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseContactFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'         => new sfWidgetFormFilterInput(),
      'last_name'          => new sfWidgetFormFilterInput(),
      'employer'           => new sfWidgetFormFilterInput(),
      'email'              => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'property_id'        => new sfWidgetFormPropelChoice(array('model' => 'Property', 'add_empty' => true)),
      'occupants'          => new sfWidgetFormFilterInput(),
      'pets'               => new sfWidgetFormFilterInput(),
      'when'               => new sfWidgetFormFilterInput(),
      'bedrooms'           => new sfWidgetFormFilterInput(),
      'howhear'            => new sfWidgetFormFilterInput(),
      'howcontact'         => new sfWidgetFormFilterInput(),
      'notes'              => new sfWidgetFormFilterInput(),
      'phone'              => new sfWidgetFormFilterInput(),
      'fax'                => new sfWidgetFormFilterInput(),
      'corporate_group_id' => new sfWidgetFormPropelChoice(array('model' => 'CorporateGroup', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'first_name'         => new sfValidatorPass(array('required' => false)),
      'last_name'          => new sfValidatorPass(array('required' => false)),
      'employer'           => new sfValidatorPass(array('required' => false)),
      'email'              => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'property_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Property', 'column' => 'id')),
      'occupants'          => new sfValidatorPass(array('required' => false)),
      'pets'               => new sfValidatorPass(array('required' => false)),
      'when'               => new sfValidatorPass(array('required' => false)),
      'bedrooms'           => new sfValidatorPass(array('required' => false)),
      'howhear'            => new sfValidatorPass(array('required' => false)),
      'howcontact'         => new sfValidatorPass(array('required' => false)),
      'notes'              => new sfValidatorPass(array('required' => false)),
      'phone'              => new sfValidatorPass(array('required' => false)),
      'fax'                => new sfValidatorPass(array('required' => false)),
      'corporate_group_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CorporateGroup', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'first_name'         => 'Text',
      'last_name'          => 'Text',
      'employer'           => 'Text',
      'email'              => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'property_id'        => 'ForeignKey',
      'occupants'          => 'Text',
      'pets'               => 'Text',
      'when'               => 'Text',
      'bedrooms'           => 'Text',
      'howhear'            => 'Text',
      'howcontact'         => 'Text',
      'notes'              => 'Text',
      'phone'              => 'Text',
      'fax'                => 'Text',
      'corporate_group_id' => 'ForeignKey',
    );
  }
}
