<?php
class LoginForm extends sfForm
{

  public function configure()
  {
    
    $this->setWidgets(array(
      'email'       => new sfWidgetFormInput(),
      'password'    => new sfWidgetFormInputPassword(),
    ));

    
    $this->widgetSchema->setNameFormat('login[%s]');
    
    
    
    $this->setValidators(array(
      'email'      => new sfValidatorEmail(array('required' => true),array('required' => 'Email Required','invalid' => 'The email address is invalid.')),
      'password'   => new sfValidatorAnd(array(new sfValidatorCallback(array('callback' => array('myLoginValidator','execute',),'arguments' => array()),array('invalid' => 'Invalid login.'))
                                               ),
                                        array('required' => true),array('required' => 'Password Required')
    )));
    
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

class myLoginValidator {
  /**
   * execute validator
   *
   * @param sfValidatorBase Validator instance that calls  this method
   * @param string Value of field that sfValidatorCallback  checks
   * @param array Arguments for correct working
   *
   * @return value field when OK. Nothing if error (sfValidatorError  exception)
   */
  public static function execute ($oValidator, $sValue, $aArguments) {
    $req = sfContext::getInstance()->getRequest();
    $email = $req->getParameter('login[email]');
    $password = $req->getParameter('login[password]');
    
    $c = new Criteria();
    $c->add(ResidentPeer::EMAIL, $email);
    $c->add(ResidentPeer::PROPERTY_ID, sfContext::getInstance()->getUser()->getAttribute('poperty'),Criteria::IN);
    
    $resident = ResidentPeer::doSelectOne($c);
    if($resident){
      
      if($password == $resident->getPassword()){
        //Login Ok.

        if($resident->getStatus()->getName() == 'Inactive'){
          throw new sfValidatorError($oValidator, 'inactive'); // Account inactive
        } else {
          //print_r($sValue);
          return $sValue; // Account active.
        }      
      }
    }

    // Throw exception when not OK
    throw new sfValidatorError($oValidator, 'invalid');
  }
}

class ForgotpasswordForm extends sfForm
{

  public function configure()
  {
    
    $this->setWidgets(array(
      'email'       => new sfWidgetFormInput(),
    ));

    
    $this->widgetSchema->setNameFormat('forgot[%s]');
    
    
    
    $this->setValidators(array(
      'email' => new sfValidatorEmail(array('required' => true),
                                      array('required' => 'Email Required','invalid' => 'The email address is invalid.'))     
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

class MaintenanceForm extends sfForm
{

  public function configure()
  {
    
    $arrMaintType = array(    
            'Bath sink clogged'=>'Bath sink clogged',
            'Bathtub clogged'=>'Bathtub clogged',
            'Bedroom door lock falling off'=>'Bedroom door lock falling off',
            'Cabinet Drawer Busted'=>'Cabinet Drawer Busted',
            'Ceiling fan not working'=>'Ceiling fan not working',
            'Closet door off track'=>'Closet door off track',
            'Closet light out'=>'Closet light out',
            'Closet shelf broken'=>'Closet shelf broken',
            'Cold air coming through window'=>'Cold air coming through window',
            'Dishwasher rusted inside'=>'Dishwasher rusted inside',
            'Entry door hard to unlock/key broken'=>'Entry door hard to unlock/key broken',
            'Entry door knob/dead bolt loose'=>'Entry door knob/dead bolt loose',
            'Exhaust fan loud or not working'=>'Exhaust fan loud or not working',
            'Garbage disposal jammed'=>'Garbage disposal jammed',
            'Kitchen light out'=>'Kitchen light out',
            'Kitchen screen missing, bent, or torn'=>'Kitchen screen missing, bent, or torn',
            'Large hole in bedroom door'=>'Large hole in bedroom door',
            'Leak under sink'=>'Leak under sink',
            'Leaky faucet'=>'Leaky faucet',
            'Light switch broken'=>'Light switch broken',
            'Microwave not working'=>'Microwave not working',
            'No power in part of bedroom'=>'No power in part of bedroom',
            'Oven element out'=>'Oven element out',
            'Pantry door off track'=>'Pantry door off track',
            'Pantry shelf has fallen'=>'Pantry shelf has fallen',
            'Patio door handle broken'=>'Patio door handle broken',
            'Patio door hard to open'=>'Patio door hard to open',
            'Patio screen bent, torn, or missing'=>'Patio screen bent, torn, or missing',
            'Refrigerator light out'=>'Refrigerator light out',
            'Several bulbs out in dining room light'=>'Several bulbs out in dining room light',
            'Shower head not spraying much water'=>'Shower head not spraying much water',
            'Sink faucet dripping'=>'Sink faucet dripping',
            'Sink sprayer leaking or not working'=>'Sink sprayer leaking or not working',
            'Slats missing in patio blinds'=>'Slats missing in patio blinds',
            'Standing water in dishwasher'=>'Standing water in dishwasher',
            'Standing water in refrigerator'=>'Standing water in refrigerator',
            'Stove eye not heating'=>'Stove eye not heating',
            'Thermostat not working'=>'Thermostat not working',
            'Toilet clogged'=>'Toilet clogged',
            'Toilet runs constantly'=>'Toilet runs constantly',
            'Toilet seat loose'=>'Toilet seat loose',
            'Towel bar has fallen off'=>'Towel bar has fallen off',
            'Towel bar has fallen off'=>'Wall switch not woring',
            'Water all over floor'=>'Water all over floor',
            'Water leaking around window'=>'Water leaking around window',
            'Window screen missing, bent, or torn'=>'Window screen missing, bent, or torn',
            'Other" >Other',
     );
    
    $this->setWidgets(array(
      'name'       => new sfWidgetFormInput(),
      'aptnum'     => new sfWidgetFormInput(),
      'phone'      => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
      'mtype'       => new sfWidgetFormChoice(array(
                                              //'expanded' => true,
                                              'multiple' => true,
                                              'choices' => $arrMaintType)),
      'mrequest'    => new sfWidgetFormTextarea(),
    ));
    

    $this->widgetSchema->setNameFormat('maintenance[%s]');

    
    $this->setValidators(array(
      'name'        => new sfValidatorString(array('required' => true),array('required' => 'Name Required')),
      'aptnum'      => new sfValidatorString(array('required' => true),array('required' => 'Apartment Number Required')),
      'phone'       => new sfValidatorString(array('required' => true),array('required' => 'Phone Required')),
      'email'       => new sfValidatorString(array('required' => false)),
      'mtype'      => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arrMaintType),'multiple' => true),array('required' => 'Maintenance Type Required','invalid' => 'type invalid')),
      'mrequest'     => new sfValidatorString(array('required' => true),array('required' => 'Request Detail Required')),
    ));
    
  }
 
}

class MovedForm extends sfForm
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
      'file'         => new sfWidgetFormInputFile(),
      'email1'       => new sfWidgetFormInput(),
      'email2'       => new sfWidgetFormInput(),
      'email3'       => new sfWidgetFormInput(),
      'email4'       => new sfWidgetFormInput(),
      'email5'       => new sfWidgetFormInput(),
      'email6'       => new sfWidgetFormInput(),
      'email7'       => new sfWidgetFormInput(),
      'email8'       => new sfWidgetFormInput(),
      'email9'       => new sfWidgetFormInput(),
      'email10'      => new sfWidgetFormInput(),
      'notes'        => new sfWidgetFormTextarea(),
    ));

    $this->widgetSchema->setNameFormat('notice[%s]');
    
    $this->setValidators(array(
      'file'          => new sfValidatorFile(array('required' => true,'mime_types' => 'web_images'),array('required' => 'Image required','mime_types' => 'Invalid mime type (%mime_type%).')),
      'email1'        => new sfValidatorEmail(array('required' => true),array('required' => 'At least one email required','invalid' => 'The email address is invalid.')),
      'email2'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email3'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email4'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email5'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email6'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email7'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email8'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email9'        => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'email10'       => new sfValidatorEmail(array('required' => false),array('invalid' => 'The email address is invalid.')),
      'notes'         => new sfValidatorString(array('required' => true),array('required' => 'Message required.')),
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

class residentsActions extends sfActions
{
  public function preExecute()
  {
    $IntPropertyId = $this->getUser()->getAttribute('poperty');
    
    $c = new Criteria();
    $c->add(PropertyPeer::ID,$IntPropertyId,Criteria::IN);
    $this->property = PropertyPeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(PropertyTemplatePeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $this->propertyTemplate = PropertyTemplatePeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(ResidentPeer::EMAIL,  $this->getUser()->getAttribute('username'));
    $this->resident = ResidentPeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(UserPropertyPeer::PROPERTY_ID,$IntPropertyId,Criteria::IN);
    $c->addJoin(UserPropertyPeer::USER_ID, UserPeer::ID);
    $this->propmanger = UserPeer::doSelectOne($c);
    
    $this->getResponse()->setTitle($this->getResponse()->getTitle()." - Residents");
  }
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  public function executeWevemoved(sfWebRequest $request)
  {
  $this->form = new MovedForm();
    
    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('notice'),$request->getFiles('notice'));
      //$this->form->bind(array(
       //'captcha'   => $request->getParameter('captcha'),
      // 'contact' => $request->getParameter('contact')
//));

      if ($this->form->isValid()){
        
        $values = $this->form->getValues();
        
        $file = $this->form->getValue('file');
        $filename = $this->resident->getId().'_'.sha1($file->getOriginalName());
        $extension = $file->getExtension($file->getOriginalExtension());
        $img = new sfImage($file->getTempName());
        $img->thumbnail(271,180);
        $img->saveAs(sfConfig::get('sf_upload_dir').'/residents/'.$filename.$extension);
        
        //print_r($values);
        
        //return sfView::SUCCESS;
        /*
        //$blnCCSuccess = true;
        
        $blnCCSuccess = false;
        
        $joinTotal = '40.00';
       
        $post_string ="MerchantID=34348&";
        $post_string = $post_string . "RegKey=6YJDX9MG6KZH7T67&";
        $post_string = $post_string . "Amount=".$joinTotal."&";
        //$post_string = $post_string . "Amount=1.04&";
        $post_string = $post_string . "RefID=MEM-".session_id()."&";
        $post_string = $post_string . "TaxAmount=&";
        $post_string = $post_string . "PONumber=&";
        $post_string = $post_string . "TaxIndicator=&";
        $post_string = $post_string . "AccountNo=".$values['ccnum']."&";
        $post_string = $post_string . "NameonAccount=".$values['fname'] ." ". $values['lname']."&";
        $post_string = $post_string . "CCMonth=".$values['expmonth']."&";
        $post_string = $post_string . "CCYear=".$values['expyear']."&";
        $post_string = $post_string . "AVSADDR=".$values['address']."&";
        $post_string = $post_string . "AVSZIP=".$values['zip']."&";
        $post_string = $post_string . "CCRURL=&";
        $post_string = $post_string . "CVV2=".$values['ccv']."&";
        $post_string = $post_string . "USER1=".$values['phone']."&";
        $post_string = $post_string . "USER2=".$values['email']."&";
        $post_string = $post_string . "USER3=&";
        $post_string = $post_string . "USER4=&";
        
        //open connection  
        $ch = curl_init();
         
        //set the url, number of POST vars, POST data  
        curl_setopt($ch, CURLOPT_URL,'https://webservices.primerchants.com/billing/TransactionCentral/processCC.asp');
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post_string);
        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)");
        curl_setopt($ch, CURLOPT_TIMEOUT, 900);
        //curl_setopt($ch, CURLOPT_CONNECTIONTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
         

        //execute post  
        if($result = curl_exec($ch)){
          parse_str($result,$arrResult);
          if($arrResult['Auth'] != '0' && $arrResult['Auth'] != 'Declined'){
            $message = print_r($arrResult,true);
            $blnCCSuccess = true;
          } else {
            $message = print_r($arrResult,true);
            $this->logMessage($message,'err');
            $this->form->defineError("ccnum",$arrResult['Auth']. ' -- ' .$arrResult['Notes']);
            return sfView::SUCCESS;
          }
        } else {

          $this->logMessage(curl_error($ch),'err');
          $this->form->defineError('ccnum',"There was a problem with the credit card authorization.");
          return sfView::SUCCESS;
        }
        //close connection  
        curl_close($ch);
              

        if($blnCCSuccess){   
          try{
          $membership = new Membership();
          $membership->setFname($values['fname']);
          $membership->setLname($values['lname']);
          $membership->setAddress($values['address']);
          $membership->setAddress2($values['address2']);
          $membership->setCity($values['city']);
          $membership->setStateProvenceId($values['state']);
          $membership->setZip($values['zip']);
          $membership->setCountry($values['country']);
          $membership->setEmail($values['email']);
          $membership->setPhone($values['phone']);
          $membership->setPassword($values['password']);
          $membership->setExpMonth($values['expmonth']);
          $membership->setExpYear($values['expyear']);
          $membership->setSignupDate(date('Y-m-d H:i:s'));
          $membership->setmembershipStatusId('2');
          $membership->setAuthResponse($message);
          $membership->save();
          } catch(Exception $e) {
            $this->logMessage("DB Membership Exception" . $e->getMessage(),'err');
          }
                   
          */


         
          $mailBody = $this->getPartial('wevemovedemail', 
            array('strName' => $this->resident->getFirstName() .' '.$this->resident->getLastName(),
                  'strEmail' => $this->resident->getEmail(),
                  'strAddress' => $this->property->getAddress(),
                  'strCSZ' => $this->property->getCity().', '.$this->property->getState().' '.$this->property->getZip(),
                  'strPhone' => '',
                  'strMessage' => $values['notes'],
                  'siteName' => $this->property->getName(),
                  'siteEmail' => $this->property->getEmail(),
                  'sitePhone' => $this->property->getPhone(),
                  'siteFax' => $this->property->getFax(),
                  'siteAddress' => $this->property->getAddress(),
                  'siteCSZ' => $this->property->getCity().', '.$this->property->getState().' '.$this->property->getZip(),
                  'siteURL' => $this->property->getUrl(),
                  'strImageURL' => $this->property->getUrl().'/uploads/residents/'.$filename.$extension,
                  'siteLogo' => $this->propertyTemplate->getLogoImage(),
                  'siteStyleColor' => $this->propertyTemplate->getStyleColor(),
                  'siteBackgroundColor' => $this->propertyTemplate->getBackgroundColor(),
            ));
          $arrEmailList = array(); 
          $mailSuccess = true; 
          for($i=1;$i<=10;$i++){
            if($values['email'.$i] != '' && $this->resident->getEmail() != ''){
              
              try
              {
                // Create the mailer and message objects
                $mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
                $message = new Swift_Message($this->property->getName().' We\'ve moved request', $mailBody, 'text/HTML');
               
                // Send
      
                $recipients = new Swift_RecipientList();
                $recipients->addTo($values['email'.$i]);
                //$recipients->addTo('webguyblake@gmail.com');
                
                //$recipients->addBcc('webguyblake@gmail.com');
                
                $mailFrom = $this->resident->getEmail();
                $mailer->send($message, $recipients, $mailFrom);
                $mailer->disconnect();
                
                $mailSuccess = true;
                $arrEmailList[] = $values['email'.$i];
                //$this->redirect('thankyou/index');
              } catch (Swift_ConnectionException $e) {
                $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
              } catch (Swift_Message_MimeException $e) {
                $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
              }
            } else {
              if($this->resident->getEmail() == ''){
                $this->getUser()->setFlash('movedmailsuccess','<strong>You do not have an email address</strong>');
              }
            }
            if($mailSuccess){
              $this->getUser()->setFlash('movedmailsuccess','Thank you. Your email has been sent to:<br />');
              $this->getUser()->setFlash('movedmailsuccesslist',implode('<br />',$arrEmailList));
            }
          }
          /*
          $mailBody = $this->getPartial('memberEmailAdmin', 
            array('name' => $values['fname'] ." ".$values['lname'],
                  'email' => $values['email'],
                  'ordertotal' => $joinTotal,
            ));
          try
          {
            // Create the mailer and message objects
            $mailer = new Swift(new Swift_Connection_NativeMail());
            $message = new Swift_Message('SSS Join Notification', $mailBody, 'text/plain');
           
            // Send
  
            $recipients = new Swift_RecipientList();
            $recipients->addTo('orders@wherewomencreate.com', 'Orders');
            //$recipients->addBcc('webguyblake@gmail.com');
            
            $mailFrom = "orders@wherewomencreate.com";
            $mailer->send($message, $recipients, $mailFrom);
            $mailer->disconnect();
            
            //$this->getUser()->setFlash('message','Welcome Email Sent');
            //$this->redirect('thankyou/index');
          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          }

          
          
          //print_r($values);
          $this->getUser()->setAuthenticated(true);
          $this->redirect('member/confirmation');  
        } else {
          $this->logMessage('Problem with CC error','err');
          $this->getUser()->setFlash('error', true);
        }*/
      }
    }
    
  }
  public function executeMaintenance(sfWebRequest $request)
  {
    $this->form = new MaintenanceForm();
    
    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('maintenance'));
      if ($this->form->isValid()){
        
        $values = $this->form->getValues();
        
        $strMaintTypes = implode(', ',$values['mtype']);

        
        $mailBody = $this->getPartial('maintenanceEmail',
          array('name' => $values['name'],
          'name' => $values['name'],
          'aptnum' => $values['aptnum'],
          'phone' => $values['phone'],
          'email' => $values['email'],
          'mtype' => $strMaintTypes,
          'mrequest' => $values['mrequest'],
          ));
        try
        {
          // Create the mailer and message objects
          $mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
          $message = new Swift_Message($this->property->getName().' Maintenance request', $mailBody, 'text/plain');
           
          // Send
  
          $recipients = new Swift_RecipientList();
          $recipients->addTo($this->property->getEmail());
          //$recipients->addTo('webguyblake@gmail.com');
            
          //$recipients->addBcc('webguyblake@gmail.com');
            
          //$mailFrom = $values['email'];
          $mailFrom = 'noreply@amcapartments.com';
          $mailer->send($message, $recipients, $mailFrom);
          $mailer->disconnect();
            
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
  public function executeLogin(sfWebRequest $request){
    
    $this->form = new LoginForm();
    if ($request->isMethod('post')){
      
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid()){
        $values = $this->form->getValues();
        $this->getUser()->setAttribute('username',$values['email']);
        $this->getUser()->setAuthenticated(true);
        $this->redirect('residents/index');
      }
    }
  }
  public function executeForgotpassword(sfWebRequest $request){
    
    $this->form = new ForgotpasswordForm();
    if ($request->isMethod('post')){
      
      $this->form->bind($request->getParameter('forgot'));
      if ($this->form->isValid()){
        $values = $this->form->getValues();
        /*$mailBody = $this->getPartial('memberEmail', 
          array('name' => $values['fname'] ." ".$values['lname'],
                'email' => $values['email'],
                'ordertotal' => $joinTotal,
          ));
        try
        {
          // Create the mailer and message objects
          $mailer = new Swift(new Swift_Connection_NativeMail());
          $message = new Swift_Message('Remember Password Email', $mailBody, 'text/plain');
         
          // Send

          $recipients = new Swift_RecipientList();
          $recipients->addTo($values['email'], $values['fname'] ." ".$values['lname']);
          //$recipients->addBcc('webguyblake@gmail.com');
          
          $mailFrom = "orders@wherewomencreate.com";
          $mailer->send($message, $recipients, $mailFrom);
          $mailer->disconnect();
          
          //$this->getUser()->setFlash('message','Welcome Email Sent');
          //$this->redirect('thankyou/index');
        } catch (Swift_ConnectionException $e) {
          $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
        } catch (Swift_Message_MimeException $e) {
          $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
        }*/
        
        $this->redirect('residents/index');
      }
    }
  }
  public function executeLogout()
  {
    $this->getUser()->setAuthenticated(false);
    $this->redirect('residents/index');
  }
}
