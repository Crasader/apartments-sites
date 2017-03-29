<?php
class PaymentForm extends sfForm
{

  public function configure()
  {

    
    $countries = array('US' => 'United States');//,'CA' => 'Canada',);
    
    $arrPayMethod =  array('' => '---Card Type---', 'Visa' => 'Visa', 'MC' => 'Master Card', 'AMEX' => 'American Express', 'DISC' => 'Discover');
      
     $arrMonths = array('' => '---Month---',
     '01' => 'Jan (01)',
     '02' => 'Feb (02)',
     '03' => 'Mar (03)',
     '04' => 'Apr (04)',
     '05' => 'May (05)',
     '06' => 'Jun (06)',
     '07' => 'Jul (07)',
     '08' => 'Aug (08)',
     '09' => 'Sep (09)',
     '10' => 'Oct (10)',
     '11' => 'Nov (11)',
     '12' => 'Dec (12)',
     );
     
     $arrYears = array('' => '---Year---');
     
     for($i=date('Y');$i<=date('Y')+10;$i++){
       $arrYears[substr($i,2,2)] = substr($i,2,2);
     }
        
    
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'aptnum'     => new sfWidgetFormInput(),
      'amount'       => new sfWidgetFormInput(),
      //'address2'    => new sfWidgetFormInput(),
      //'city'        => new sfWidgetFormInput(),
      //'state'       => new sfWidgetFormPropelSelect(array('model' => 'StateProvence','add_empty' => '--- Select ---')),
      //'zip'         => new sfWidgetFormInput(),
      //'country'     => new sfWidgetFormSelect(array('choices' => $countries)),
      //'dayphone'    => new sfWidgetFormInput(),
      //'nightphone'  => new sfWidgetFormInput(),
      //'email'       => new sfWidgetFormInput(),
      'ccnumber'    => new sfWidgetFormInput(),
      'method'     => new sfWidgetFormSelect(array('choices' => $arrPayMethod)),
      'cvv'        => new sfWidgetFormInput(),
      'expmonth'   => new sfWidgetFormSelect(array('choices' => $arrMonths)),
      'expyear'    => new sfWidgetFormSelect(array('choices' => $arrYears)),
    ));

    
    $this->widgetSchema->setNameFormat('payment[%s]');
        
    $this->setValidators(array(
      'name'      => new sfValidatorString(array('required' => true),array('required' => 'Name Required')),
      'aptnum'    => new sfValidatorString(array('required' => true),array('required' => 'Apartment Number Required')),
      'amount'      => new sfValidatorString(array('required' => true),array('required' => 'Amount Required')),
      //'city'       => new sfValidatorString(array('required' => true),array('required' => 'City Required')),
      //'state'      => new sfValidatorPropelChoice(array('model' => 'StateProvence'),array('required' => 'State Required')),
      //'zip'        => new sfValidatorString(array('required' => true),array('required' => 'Zip Required')),    
      //'country'    => new sfValidatorChoice(array('choices' => array_keys($countries)),array('required' => 'Country Required')),
      //'email'      => new sfValidatorEmail(array('required' => true),array('required' => 'Email Required','invalid' => 'The email address is invalid.')),
      //'address2'   => new sfValidatorString(array('required' => false)),
      //'dayphone'   => new sfValidatorRegex(array('pattern' => '/^(?:\([2-9]\d{2}\)\ ?|[2-9]\d{2}(?:\-?|\ ?\.?))[2-9]\d{2}[- .]?\d{4}$/'),
      //                    array('required' => 'Day Phone Required','invalid' => 'Day Phone Invalid')
      //                    ), 
      'id' => new sfValidatorString(array('required' => false)),
      'ccnumber'   => new sfValidatorString(array('required' => true),array('required' => 'Credit Card Number Required')),
      'method'     => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arrPayMethod)),array('required' => 'Payment Method Required')),
      'cvv'        => new sfValidatorString(array('required' => true),array('required' => 'Card Verifiction Code Required')),
      'expmonth'   => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arrMonths)),array('required' => 'Expiration Month Required')),
      'expyear'    => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arrYears)),array('required' => 'Expiration Year Required')),
    ));    
  }
  
  public function defineError($fieldName, $message)
  {
    $checkName = 'check_define_'.md5($fieldName);
    $this->getErrorSchema()->getValidator()->addOption($checkName);
    $this->getErrorSchema()->getValidator()->addMessage($checkName, $message);
    $this->getErrorSchema()->addError(
      new sfValidatorError(new sfValidatorString(), $message), $fieldName);
        //$this->getErrorSchema()->getValidator(),'',array('value' => '1234',$checkName => $fieldName)
       /* array(
          'value' => sfContext::getInstance()->getRequest()->getParameter($fieldName),
          $checkName => $this->getErrorSchema()->getValidator($checkName)
          )*/
          //)
     // );
  }
  
}
class paymentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
//   $this->forward('default', 'module');
    $this->setLayout(false);

    $this->propertyId = $request->getParameter('id');
    
    $this->property = PropertyPeer::retrieveByPk($this->propertyId);
   
    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$this->propertyId);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);
        
    
    $this->form = new PaymentForm();
    
    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('signup'));
      if ($this->form->isValid()){
      
      }
    }
  }
}
