<?php

class ContactForm extends sfForm
{

  public function configure()
  {

    $arrHowHear = array('' => '--- Select ---',
     'Apartment Guide' => 'Apartment Guide',
     'ForRent Magazine' => 'ForRent Magazine',
     'Driveby Signage' => 'Driveby Signage',
     'Newspaper' => 'Newspaper',
     'Employee Referral' => 'Employee Referral',
     'Other' => 'Other',
     );
     
     $arrHowContact = array(
     'email' => 'E-mail',
     'fax' => 'Fax',
     'phone' => 'Phone',
     'mail' => 'Mail',
     );
     
    
    $this->setWidgets(array(
      'fname'       => new sfWidgetFormInput(),
      'lname'       => new sfWidgetFormInput(),
      'email'       => new sfWidgetFormInput(),
      'employer'    => new sfWidgetFormInput(),
      'occupants'   => new sfWidgetFormInput(),
      'pets'        => new sfWidgetFormInput(),
      'when'        => new sfWidgetFormInput(),
      'bedrooms'    => new sfWidgetFormInput(),
      'howhear'     => new sfWidgetFormSelect(array('choices' => $arrHowHear)),
      'howcontact'  => new sfWidgetFormChoice(array('expanded' => true,
                                                    'multiple' => true,
                                                    'choices' => $arrHowContact)),
      'notes'       => new sfWidgetFormTextarea(),
      'captcha' => new sfWidgetCaptchaGD(),
      //'captcha'     => new sfWidgetFormInput(),
      'phone'       => new sfWidgetFormInput(),
      'fax'         => new sfWidgetFormInput(),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');
    
    $this->setValidators(array(
      'fname'        => new sfValidatorString(array('required' => true),array('required' => 'First Name Required')),
      'lname'        => new sfValidatorString(array('required' => true),array('required' => 'Last Name Required')),
      'email'        => new sfValidatorEmail(array('required' => true),array('required' => 'Email Required','invalid' => 'The email address is invalid.')),
      'employer'     => new sfValidatorString(array('required' => false)),
      'occupants'    => new sfValidatorString(array('required' => false)),
      'pets'         => new sfValidatorString(array('required' => false)),
      'when'         => new sfValidatorString(array('required' => false)),
      'bedrooms'     => new sfValidatorString(array('required' => false)),
      'notes'        => new sfValidatorString(array('required' => false)),
      'phone'        => new sfValidatorString(array('required' => false)),
      'fax'          => new sfValidatorString(array('required' => false)),
      //'captcha'      => new sfValidatorString(array('required' => true),array('required' => 'Security code required')),
      'captcha' => new sfCaptchaGDValidator(array('length' => 4),array('required' => 'Security code required','invalid' => 'Securty code invalid.','length' => 'Securty code invalid.')),
      'howhear'      => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arrHowHear)),array('required' => 'How hear Required')),
      'howcontact'   => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arrHowContact),'multiple' => true),array('required' => 'Prefered contact Required')),
    ));
    
  }
  
 /* public function defineError($fieldName, $message)
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
  //}
  
}
/**
 * contact actions.
 *
 * @package    apts_symfony
 * @subpackage contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class contactusActions extends sfActions
{
  public function preExecute(){
  $IntPropertyId = $this->getUser()->getAttribute('poperty');
    
    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(UserPropertyPeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $c->addJoin(UserPropertyPeer::USER_ID, UserPeer::ID);
    $this->propmanger = UserPeer::doSelectOne($c);
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  $this->form = new ContactForm();
    
    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('contact'));


      if ($this->form->isValid()){
        
        $values = $this->form->getValues();
         
        $mailBody = $this->getPartial('contactEmail',
          array('name' => $values['fname'] ." ".$values['lname'],
                'email' => $values['email'],
                'employer' => $values['employer'],
                'occupants' => $values['occupants'],
                'pets' => $values['pets'],
                'when' => $values['when'],
                'bedrooms' => $values['bedrooms'],
                'howhear' => $values['howhear'],
                'howcontact' => $values['howcontact'],
                'notes' => $values['notes'],
                'phone' => $values['phone'],
                'fax' => $values['fax'],
          ));
          try{
            // Create the mailer and message objects
            //$mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
            //$message = new Swift_Message('AMC Apartments Contact request', $mailBody, 'text/plain');
           
            // Send
  
            //$recipients = new Swift_RecipientList();
            //$recipients->addTo($this->propmanger->getEmail());
            //$recipients->addTo('m.bradley@amcllc.net');
            //$recipients->addTo('k.ferran@amcllc.net');
            
            //$recipients->addBcc('webguyblake@gmail.com');
            
            $mailFrom = $values['email'];
            //$result = $mailer->send($message, $recipients, $mailFrom);
            //$mailer->disconnect();
            
            
            $message = $this->getMailer()->compose(
            $mailFrom,
            'm.bradley@amcllc.net',
            'AMC Apartments Contact request',
            $mailBody);
            
            $this->getMailer()->send($message);
            
            
            $this->getUser()->setFlash('mailsuccess','<strong>Thank you your email has been sent.</strong>');
            //$this->redirect('thankyou/index');
          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          }
      }
    }
  }
}
