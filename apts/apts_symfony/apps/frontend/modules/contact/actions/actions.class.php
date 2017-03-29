<?php
class ContactForm extends sfForm
{

  public function configure()
  {

    $arrHowHear = array('' => '--- Select ---',
     'Apartment Guide' => 'Apartment Guide',
     'Driveby Signage' => 'Driveby Signage',
     'Employee Referral' => 'Employee Referral',
     'Craigslist' => 'Craigslist',
     'Rent.com' => 'Rent.com',
     'Apartments.com' => 'Apartments.com',
     'Resident Referral' => 'Resident Referral',
     'Yelp' => 'Yelp',
     'Facebook' => 'Facebook',
     'Zillow' => 'Zillow',
     'ForRent' => 'ForRent',
     'Newspaper' => 'Newspaper',
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
  //}
  }
}

class MinContactForm extends sfForm
{

  public function configure()
  {

    $arrHowHear = array('' => '--- Select ---',
     'Apartment Guide' => 'Apartment Guide',
     'Driveby Signage' => 'Driveby Signage',
     'Employee Referral' => 'Employee Referral',
     'Craigslist' => 'Craigslist',
     'Rent.com' => 'Rent.com',
     'Apartments.com' => 'Apartments.com',
     'Resident Referral' => 'Resident Referral',
     'Yelp' => 'Yelp',
     'Facebook' => 'Facebook',
     'Zillow' => 'Zillow',
     'ForRent' => 'ForRent',
     'Newspaper' => 'Newspaper',
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
      'notes'       => new sfWidgetFormTextarea(),
      //'captcha' => new sfWidgetCaptchaGD(),
      //'g-recaptcha-response'     => new sfWidgetFormTextarea(),
      'phone'       => new sfWidgetFormInput(),
      'fax'       => new sfWidgetFormInput(),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->setValidators(array(
      'fname'        => new sfValidatorString(array('required' => true),array('required' => 'First Name Required')),
      'lname'        => new sfValidatorString(array('required' => true),array('required' => 'Last Name Required')),
      'email'        => new sfValidatorEmail(array('required' => true),array('required' => 'Email Required','invalid' => 'The email address is invalid.')),
      'notes'        => new sfValidatorString(array('required' => false)),
      'phone'        => new sfValidatorString(array('required' => false)),
      'fax'        => new sfValidatorString(array('required' => false)),

      //'captcha'      => new sfValidatorString(array('required' => true),array('required' => 'Security code required')),
      //'captcha' => new sfCaptchaGDValidator(array('length' => 4),array('required' => 'Security code required','invalid' => 'Securty code invalid.','length' => 'Securty code invalid.')),

      //'g-recaptcha-response' => new sfValidatorAnd(array(new sfValidatorCallback(array('callback' => array('gCaptchaValidator','execute',),'arguments' => array()),array('invalid' => 'Invalid Captcha'))
                                              // ),
                                              //array('required' => false))
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
  //}
  }
}

class gCaptchaValidator {
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
    //$req = sfContext::getInstance()->getRequest();
    //$userID = $req->getParameter('forgot[userid]');
    //$propertyCode = sfContext::getInstance()->getUser()->getAttribute('poperty');
    //$c = new Criteria();
    //$c->add(ResidentPeer::EMAIL, $email);
    //$c->add(ResidentPeer::PROPERTY_ID, sfContext::getInstance()->getUser()->getAttribute('poperty'),Criteria::IN);
    //$resident = ResidentPeer::doSelectOne($c);

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = ['secret'   => '6LcqTRYUAAAAALfQQPaDcv5NeFOTznd90hQIroJh',
             'response' => $_POST['g-recaptcha-response'],
             'remoteip' => $_SERVER['REMOTE_ADDR']];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    var_dump($result);
    exit;
    $capReturn = json_decode($result);


    if($capReturn->success == 'success'){
      //sfContext::getInstance()->getUser()->setAuthenticated(true);
      //sfContext::getInstance()->getUser()->setAttribute('userinfo',$arrResult);
      //return $sValue;

    }

    /*  if($password == $resident->getPassword()){
        //Login Ok.

        if($resident->getStatus()->getName() == 'Inactive'){
          throw new sfValidatorError($oValidator, 'inactive'); // Account inactive
        } else {
          //print_r($sValue);
          return $sValue; // Account active.
        }
      }
    }*/

    // Throw exception when not OK
    throw new sfValidatorError($oValidator, 'invalid');
  }
}
/**
 * contact actions.
 *
 * @package    apts_symfony
 * @subpackage contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class contactActions extends sfActions
{
  private function sendTraffic($data){
    //ini_set("memory_limit","300M");
    $data_query = new StdClass();
    $data_query->sysPassword = 'g3tm3s0m3pr0ps';
    $data_query->sPropertyCode = $data['propcode'];
    $data_query->FirstName = $data['fname'];
    $data_query->MiddleName = $data['mname'];
    $data_query->LastName = $data['lname'];
    $data_query->Address1 = $data['address'];
    $data_query->City = $data['city'];
    $data_query->State = $data['state'];
    $data_query->ZipCode = $data['zip'];
    $data_query->HomePhone = $data['hphone'];
    $data_query->WorkPhone = $data['wphone'];
    $data_query->CellPhone = $data['cphone'];
    $data_query->EmailAddress = $data['email'];
    $data_query->Notes = $data['notes'];
    $data_query->UnitNumber = $data['unitnum'];
    $data_query->UnitType = $data['unittype'];
    $data_query->PriceRange = $data['pricerange'];
    $data_query->PetType = $data['pettype'];
    $data_query->PetBreed = $data['petbreed'];
    $data_query->PetWeight = $data['petweight'];
    $data_query->LeaseTerm = $data['leaseterm'];
    $data_query->NumOccupants = $data['numocc'];


    $URL = "http://192.168.1.135:8088/mapts_com.asmx?WSDL";
    try {

    $client = new SoapClient($URL,array('trace' => 1));

    //print$soapResult = $client->__getFunctions();
    //print_r($client->__getTypes());
    //print_r($soapResult);


    $soapResult = $client->InsertTraffic($data_query);

    $this->logMessage(print_r($soapResult,true), 'info');

    //$soapResult = $client->GetData($search_query);
    //print_r($soapResult);
    //echo "REQUEST:\n" . $client->__getLastRequest() . "\n";
    //echo $count."\n";*/




    } catch(SoapFault $e){
    //print_r($e);
    //$outMessage .= print_r($client->__getLastRequest(),true);
    }
    //exit;
  }

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

    $this->getResponse()->setTitle($this->getResponse()->getTitle()." - Contact Us");

    $FaceBookUrl = $this->propertyTemplate->getFacebookUrl();
    $arrURLitemList = array();
    if(1 === preg_match('/\<\-multi\-\>/', $FaceBookUrl, $matches, PREG_OFFSET_CAPTURE)){
      $arrURLList = preg_split ('/$\R?^/m', $FaceBookUrl);
      array_shift($arrURLList);
      //print_r($arrURLList);
      foreach($arrURLList as $itemURL){
        //print_r($itemURL);
        $arrURLitem = explode('~',$itemURL);
        $arrURLitemList[$arrURLitem[0]] = $arrURLitem[1];
        //print_r($arrURLitem);
      }
    } else {
      $arrURLitemList['facebook'] = $FaceBookUrl;
    }
    //print_r($arrURLitemList);
    $this->arrSocialUrls = $arrURLitemList;

    $this->objCustomTemplate= new myCustomTemplate();
  }


  public function executeIndex(sfWebRequest $request)
  {
  $this->form = new ContactForm();



    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('contact'));
      //$this->form->bind(array(
       //'captcha'   => $request->getParameter('captcha'),
      // 'contact' => $request->getParameter('contact')
//));

      if ($this->form->isValid()){

        $values = $this->form->getValues();


        if($this->propertyTemplate->getEmail()){
          $arrEmails = array();
          $arrEmails = explode('~',$this->propertyTemplate->getEmail());
        } else {
          $arrEmails = array($this->property->getEmail());
        }

// Property Email -------------------------------------------------------------------
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
          try
          {
            // Create the mailer and message objects
            //$mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
            //$message = new Swift_Message($this->property->getName().' Contact request', $mailBody, 'text/plain');

            // Send

            //$recipients = new Swift_RecipientList();
            //if($this->propmanger){
            //  $recipients->addTo($this->propmanger->getEmail());
            //} else {
            //$recipients->addTo(trim($this->property->getEmail()));
            //}
            //$recipients->addTo('bjohnsonedsoup@gmail.com');

            //$recipients->addBcc('webguyblake@gmail.com');
            //$recipients->addBcc('m.bradley@amcllc.net');
            //$recipients->addBcc('k.ferran@amcllc.net');
            //if(is_array($arrEmails)){
            //  foreach($arrEmails as $itemEmail){
            //  	$recipients->addTo($itemEmail);
            //  }
            //}

            $mailFrom = $values['email'];
            //$mailer->send($message, $recipients, $mailFrom);
            //$mailer->disconnect();


            $message = $this->getMailer()->compose(
            $mailFrom,
            $arrEmails,
            $this->property->getName().'Contact request',
            $mailBody);
            $message->addBcc('matt@marketapts.com');
            $this->getMailer()->send($message);

            //$this->getUser()->setFlash('mailsuccess','<strong>Thank you<br /> Your information has been sent.<br /> “You will now be redirected</strong>');
            //$this->redirect('contact/thankyou');
          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }



// Auto Reply Email -------------------------------------------------------------------
          //if($this->propmanger){
          //  $mailFrom = $this->propmanger->getName() ? new Swift_Address($this->propmanger->getEmail(), $this->propmanger->getName()): $this->propmanger->getEmail();
            //$propmanager = $this->propmanger->getName() ? $this->propmanger->getName()." (Manager)\n".$this->propmanger->getEmail() : $this->propmanger->getEmail();
          //} else {
          $mailFrom = trim($this->property->getEmail());
          //$mailFrom = '';
          //$mailFrom = 'k.ferran@amcllc.net';
            //$propmanager = $mailFrom;
          //}
          $propmanager = $this->property->getName()."\n".$mailFrom;


          $strContactEmailText = $this->propertyTemplate->getContactEmailText();
          $arrEmailVars = array('emailtext' => $strContactEmailText,
                    'propertyname' => $this->property->getName(),
                    'name' => $values['fname'] ." ".$values['lname'],
                    'special' => $this->property->getSpecial(),
                    'propmanager' => $propmanager,
                    'petpolicy' => $this->property->getPetPolicy(),
                    'propertyphone' => $this->property->getPhone(),
                    'propertyaddress' => $this->property->getAddress(),
                    'propertycity' => $this->property->getCity(),
                    'propertystate' => $this->property->getState()->getCode(),
                    'propertyzip' => $this->property->getZip(),
                    'propertyfax' => $this->property->getFax());

          if($strContactEmailText != ''){
            $mailBody = $this->getPartial('contactReplyEmail',$arrEmailVars);
          } else {
            $mailFrom = $arrEmails[0];
            $mailBody = $this->getPartial('contactReplyEmailN',$arrEmailVars);
          }




          try
          {
          /*  // Create the mailer and message objects
            $mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
            $message = new Swift_Message($this->property->getName().' Contact request', $mailBody, 'text/plain');

            $recipients = new Swift_RecipientList();
            $recipients->addTo($values['email']);
            //$recipients->addBcc('webguyblake@gmail.com');

            $mailer->send($message, $recipients, $mailFrom);
            $mailer->disconnect();

            //$this->getUser()->setFlash('message','Welcome Email Sent');
            //$this->redirect('thankyou/index');
           */

          /*$message = $this->getMailer()->compose(
          $mailFrom,
          'webguyblake@gmail.com',
          $this->property->getName().' Contact request',
          $mailBody);
          $this->getMailer()->send($message);
          */
          $message = $this->getMailer()->compose(
          $mailFrom,
          $values['email'],
          $this->property->getName().' Contact request',
          $mailBody);
          $this->getMailer()->send($message);

          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }

          $contact = new Contact();
          $contact->setFirstName($values['fname']);
          $contact->setLastName($values['lname']);
          $contact->setEmail($values['email']);
          $contact->setEmployer($values['employer']);
          $contact->setOccupants($values['occupants']);
          $contact->setPets($values['pets']);
          $contact->setWhen($values['when']);
          $contact->setBedrooms($values['bedrooms']);
          $contact->setHowhear($values['howhear']);
          $contact->setHowcontact(print_r($values['howcontact'],true));
          $contact->setNotes($values['notes']);
          $contact->setPhone($values['phone']);
          $contact->setFax($values['fax']);
          $contact->setPropertyId($this->property->getId());
          $contact->save();

          $dataTraffic['propcode'] = $this->property->getCode();
          $dataTraffic['fname'] = $values['fname'];
          $dataTraffic['mname'] = '';
          $dataTraffic['lname'] = $values['lname'];
          $dataTraffic['address'] = '';
          $dataTraffic['city'] = '';
          $dataTraffic['state'] = '';
          $dataTraffic['zip'] = '';
          $dataTraffic['hphone'] = $values['phone'];
          $dataTraffic['wphone'] = '';
          $dataTraffic['cphone'] = '';
          $dataTraffic['email'] = $values['email'];
          $dataTraffic['notes'] = $values['notes'];
          $dataTraffic['unitnum'] = '';
          $dataTraffic['unittype'] = '';
          $dataTraffic['pricerange'] = '';
          $dataTraffic['pettype'] = '';
          $dataTraffic['petbreed'] = $values['pets'];
          $dataTraffic['petweight'] = '';
          $dataTraffic['leaseterm'] = $values['when'];
          $dataTraffic['numocc'] = $values['occupants'];

          $this->sendTraffic($dataTraffic);

          //print_r($values);
          $this->redirect('contact/thankyou');

      }
    }
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acacia');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jsp');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout('amc_layout');
      $this->setTemplate('amc');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('cornerstone_layout');
      $this->setTemplate('cornerstone');
    }
  }

  public function executeForm(sfWebRequest $request)
  {
  $this->form = new ContactForm();



    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('contact'));
      //$this->form->bind(array(
       //'captcha'   => $request->getParameter('captcha'),
      // 'contact' => $request->getParameter('contact')
//));

      if ($this->form->isValid()){

        $values = $this->form->getValues();


        if($this->propertyTemplate->getEmail()){
          $arrEmails = array();
          $arrEmails = explode('~',$this->propertyTemplate->getEmail());
        } else {
          $arrEmails = array($this->property->getEmail());
        }

// Property Email -------------------------------------------------------------------
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
          try
          {
            // Create the mailer and message objects
            //$mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
            //$message = new Swift_Message($this->property->getName().' Contact request', $mailBody, 'text/plain');

            // Send

            //$recipients = new Swift_RecipientList();
            //if($this->propmanger){
            //  $recipients->addTo($this->propmanger->getEmail());
            //} else {
            //$recipients->addTo(trim($this->property->getEmail()));
            //}
            //$recipients->addTo('bjohnsonedsoup@gmail.com');

            //$recipients->addBcc('webguyblake@gmail.com');
            //$recipients->addBcc('m.bradley@amcllc.net');
            //$recipients->addBcc('k.ferran@amcllc.net');
            //if(is_array($arrEmails)){
            //  foreach($arrEmails as $itemEmail){
            //  	$recipients->addTo($itemEmail);
            //  }
            //}

            $mailFrom = $values['email'];
            //$mailer->send($message, $recipients, $mailFrom);
            //$mailer->disconnect();


            $message = $this->getMailer()->compose(
            $mailFrom,
            $arrEmails,
            $this->property->getName().'Contact request',
            $mailBody);
            $message->addBcc('matt@marketapts.com');
            $this->getMailer()->send($message);

            //$this->getUser()->setFlash('mailsuccess','<strong>Thank you<br /> Your information has been sent.<br /> “You will now be redirected</strong>');
            //$this->redirect('contact/thankyou');
          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }



// Auto Reply Email -------------------------------------------------------------------
          //if($this->propmanger){
          //  $mailFrom = $this->propmanger->getName() ? new Swift_Address($this->propmanger->getEmail(), $this->propmanger->getName()): $this->propmanger->getEmail();
            //$propmanager = $this->propmanger->getName() ? $this->propmanger->getName()." (Manager)\n".$this->propmanger->getEmail() : $this->propmanger->getEmail();
          //} else {
          $mailFrom = trim($this->property->getEmail());
          //$mailFrom = 'k.ferran@amcllc.net';
            //$propmanager = $mailFrom;
          //}
          $propmanager = $this->property->getName()."\n".$mailFrom;

          $mailBody = $this->getPartial('contactReplyEmail',
              array('emailtext' => $this->propertyTemplate->getContactEmailText(),
                    'propertyname' => $this->property->getName(),
                    'name' => $values['fname'] ." ".$values['lname'],
                    'special' => $this->property->getSpecial(),
                    'propmanager' => $propmanager,
                    'petpolicy' => $this->property->getPetPolicy()));
          try
          {
          /*  // Create the mailer and message objects
            $mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
            $message = new Swift_Message($this->property->getName().' Contact request', $mailBody, 'text/plain');

            $recipients = new Swift_RecipientList();
            $recipients->addTo($values['email']);
            //$recipients->addBcc('webguyblake@gmail.com');

            $mailer->send($message, $recipients, $mailFrom);
            $mailer->disconnect();

            //$this->getUser()->setFlash('message','Welcome Email Sent');
            //$this->redirect('thankyou/index');
           */

          $message = $this->getMailer()->compose(
          $mailFrom,
          $values['email'],
          $this->property->getName().' Contact request',
          $mailBody);
          $this->getMailer()->send($message);

          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }

          $contact = new Contact();
          $contact->setFirstName($values['fname']);
          $contact->setLastName($values['lname']);
          $contact->setEmail($values['email']);
          $contact->setEmployer($values['employer']);
          $contact->setOccupants($values['occupants']);
          $contact->setPets($values['pets']);
          $contact->setWhen($values['when']);
          $contact->setBedrooms($values['bedrooms']);
          $contact->setHowhear($values['howhear']);
          $contact->setHowcontact(print_r($values['howcontact'],true));
          $contact->setNotes($values['notes']);
          $contact->setPhone($values['phone']);
          $contact->setFax($values['fax']);
          $contact->setPropertyId($this->property->getId());
          $contact->save();

          $dataTraffic['propcode'] = $this->property->getCode();
          $dataTraffic['fname'] = $values['fname'];
          $dataTraffic['mname'] = '';
          $dataTraffic['lname'] = $values['lname'];
          $dataTraffic['address'] = '';
          $dataTraffic['city'] = '';
          $dataTraffic['state'] = '';
          $dataTraffic['zip'] = '';
          $dataTraffic['hphone'] = $values['phone'];
          $dataTraffic['wphone'] = '';
          $dataTraffic['cphone'] = '';
          $dataTraffic['email'] = $values['email'];
          $dataTraffic['notes'] = $values['notes'];
          $dataTraffic['unitnum'] = '';
          $dataTraffic['unittype'] = '';
          $dataTraffic['pricerange'] = '';
          $dataTraffic['pettype'] = '';
          $dataTraffic['petbreed'] = $values['pets'];
          $dataTraffic['petweight'] = '';
          $dataTraffic['leaseterm'] = $values['when'];
          $dataTraffic['numocc'] = $values['occupants'];

          $this->sendTraffic($dataTraffic);

          //print_r($values);
          $this->redirect('contact/thankyou');

      }
    }
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acacia');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jsp');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout('amc_layout');
      $this->setTemplate('amc');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('contactform_cornerstone_layout');
      $this->setTemplate('cornerstoneform');
    }
  }


  public function executeMin(sfWebRequest $request){
    $this->form = new MinContactForm();



    if ($request->isMethod('post')){
      $this->form->bind($request->getParameter('contact'));
      //$this->form->bind(array(
       //'captcha'   => $request->getParameter('captcha'),
      // 'contact' => $request->getParameter('contact')
//));

      if ($this->form->isValid()){

        $values = $this->form->getValues();


        if($this->propertyTemplate->getEmail()){
          $arrEmails = array();
          $arrEmails = explode('~',$this->propertyTemplate->getEmail());
        } else {
          $arrEmails = $this->property->getEmail();
        }

// Property Email -------------------------------------------------------------------
          $mailBody = $this->getPartial('contactEmail',
            array('name' => $values['fname'] ." ".$values['lname'],
                  'email' => $values['email'],
                  'employer' => '',
                  'occupants' => '',
                  'pets' => '',
                  'when' => '',
                  'bedrooms' => '',
                  'howhear' => '',
                  'howcontact' => array(),
                  'notes' => $values['notes'],
                  'phone' => $values['phone'],
                  'fax' => $values['fax'],
            ));
          try
          {

            $mailFrom = $values['email'];

            $message = $this->getMailer()->compose(
            $mailFrom,
            $arrEmails,
            $this->property->getName().'Contact request',
            $mailBody);
            $message->addBcc('matt@marketapts.com');
            $this->getMailer()->send($message);


          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }



// Auto Reply Email -------------------------------------------------------------------

          $mailFrom = trim($this->property->getEmail());

          $propmanager = $this->property->getName()."\n".$mailFrom;

          $mailBody = $this->getPartial('contactReplyEmail',
              array('emailtext' => $this->propertyTemplate->getContactEmailText(),
                    'propertyname' => $this->property->getName(),
                    'name' => $values['fname'] ." ".$values['lname'],
                    'special' => $this->property->getSpecial(),
                    'propmanager' => $propmanager,
                    'petpolicy' => $this->property->getPetPolicy()));
          try{

          $message = $this->getMailer()->compose(
          $mailFrom,
          $values['email'],
          $this->property->getName().' Contact request',
          $mailBody);
          $this->getMailer()->send($message);

          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }

          $contact = new Contact();
          $contact->setFirstName($values['fname']);
          $contact->setLastName($values['lname']);
          $contact->setEmail($values['email']);

          $contact->setNotes($values['notes']);
          $contact->setPhone($values['phone']);
          $contact->setFax($values['fax']);
          $contact->setPropertyId($this->property->getId());
          $contact->setCorporateGroupId(2);
          $contact->save();

          $dataTraffic['propcode'] = $this->property->getCode();
          $dataTraffic['fname'] = $values['fname'];
          $dataTraffic['mname'] = '';
          $dataTraffic['lname'] = $values['lname'];
          $dataTraffic['address'] = '';
          $dataTraffic['city'] = '';
          $dataTraffic['state'] = '';
          $dataTraffic['zip'] = '';
          $dataTraffic['hphone'] = $values['phone'];
          $dataTraffic['wphone'] = $values['fax'];
          $dataTraffic['cphone'] = '';
          $dataTraffic['email'] = $values['email'];
          $dataTraffic['notes'] = $values['notes'];
          $dataTraffic['unitnum'] = '';
          $dataTraffic['unittype'] = '';
          $dataTraffic['pricerange'] = '';
          $dataTraffic['pettype'] = '';
          $dataTraffic['petbreed'] = '';
          $dataTraffic['petweight'] = '';
          $dataTraffic['leaseterm'] = '';
          $dataTraffic['numocc'] = '';

          $this->sendTraffic($dataTraffic);


          //print_r($values);
          $this->redirect('contact/minthankyou');

      }
    }
    //$objAcacia = new myAcacia();

  //	if($objAcacia->isAcatia($this->property->getCode())){
  if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acacia');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jsp');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout(false);
      $this->setTemplate('amcmin');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('contactform_cornerstone_layout');
      $this->setTemplate('cornerstonemin');
    }
  }

  public function executeShort(sfWebRequest $request)
  {
  //$this->form = new ContactForm();



    if ($request->isMethod('post')){
      //$this->form->bind($request->getParameter('contact'));
      //$this->form->bind(array(
       //'captcha'   => $request->getParameter('captcha'),
      // 'contact' => $request->getParameter('contact')
//));

      //if ($this->form->isValid()){

        //$values = $this->form->getValues();

        if($this->propertyTemplate->getEmail()){
          $arrEmails = array();
          $arrEmails = explode('~',$this->propertyTemplate->getEmail());
        } else {
          $arrEmails = array($this->property->getEmail());
        }

// Property Email -------------------------------------------------------------------
          $mailBody = $this->getPartial('contactEmail',
            array('name' => $request->getParameter('firstname') ." ". $request->getParameter('lastname'),
                  'email' => $request->getParameter('emailaddress'),
                  'employer' => '',
                  'occupants' => '',
                  'pets' => '',
                  'when' => '',
                  'bedrooms' => '',
                  'howhear' => '',
                  'howcontact' => array(),
                  'notes' => '',
                  'phone' => $request->getParameter('phonenumber'),
                  'fax' => '',
            ));

          try
          {
            /*// Create the mailer and message objects
            $mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
            $message = new Swift_Message($this->property->getName().' schedule a visit request', $mailBody, 'text/plain');

            // Send

            $recipients = new Swift_RecipientList();
            //if($this->propmanger){
            //  $recipients->addTo($this->propmanger->getEmail());
            //} else {
            $recipients->addTo(trim($this->property->getEmail()));
            //}
            //$recipients->addTo('webguyblake@gmail.com');

            //$recipients->addBcc('webguyblake@gmail.com');
            $recipients->addBcc('m.bradley@amcllc.net');
            //$recipients->addBcc('k.ferran@amcllc.net');
            if(is_array($arrEmails)){
              foreach($arrEmails as $itemEmail){
                $recipients->addTo($itemEmail);
              }
            }

            $mailFrom = $request->getParameter('emailaddress');
            $mailer->send($message, $recipients, $mailFrom);
            $mailer->disconnect();

            //$this->getUser()->setFlash('mailsuccess','<strong>Thank you<br /> Your information has been sent.<br /> “You will now be redirected</strong>');
            //$this->redirect('contact/thankyou');
           */

          $mailFrom = $request->getParameter('emailaddress');

          $message = $this->getMailer()->compose(
          $mailFrom,
          $arrEmails,
          $this->property->getName().' schedule a visit request',
          $mailBody);
          $message->addBcc('matt@marketapts.com');
          $this->getMailer()->send($message);

          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }



// Auto Reply Email -------------------------------------------------------------------
          //if($this->propmanger){
          //  $mailFrom = $this->propmanger->getName() ? new Swift_Address($this->propmanger->getEmail(), $this->propmanger->getName()): $this->propmanger->getEmail();
            //$propmanager = $this->propmanger->getName() ? $this->propmanger->getName()." (Manager)\n".$this->propmanger->getEmail() : $this->propmanger->getEmail();
          //} else {
          $mailFrom = trim($this->property->getEmail());
          //$mailFrom = 'k.ferran@amcllc.net';
            //$propmanager = $mailFrom;
          //}
          $propmanager = $this->property->getName()."\n".$mailFrom;

          $mailBody = $this->getPartial('contactReplyEmail',
              array('emailtext' => $this->propertyTemplate->getContactEmailText(),
                    'propertyname' => $this->property->getName(),
                    'name' => $request->getParameter('firstname') ." ".$request->getParameter('lastname'),
                    'special' => $this->property->getSpecial(),
                    'propmanager' => $propmanager,
                    'petpolicy' => $this->property->getPetPolicy()));
          try
          {
          /*
            // Create the mailer and message objects
            $mailer = new Swift(new Swift_Connection_SMTP('68.178.13.35'));
            $message = new Swift_Message($this->property->getName().' Contact request', $mailBody, 'text/plain');

            $recipients = new Swift_RecipientList();
            $recipients->addTo($request->getParameter('emailaddress'));
            //$recipients->addBcc('webguyblake@gmail.com');

            $mailer->send($message, $recipients, $mailFrom);
            $mailer->disconnect();

            //$this->getUser()->setFlash('message','Welcome Email Sent');
            //$this->redirect('thankyou/index');
           */

          $message = $this->getMailer()->compose(
          $mailFrom,
          $request->getParameter('emailaddress'),
          $this->property->getName().' schedule a visit request',
          $mailBody);
          $this->getMailer()->send($message);

          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }

          $contact = new Contact();
          $contact->setFirstName($request->getParameter('firstname'));
          $contact->setLastName($request->getParameter('lastname'));
          $contact->setEmail($request->getParameter('emailaddress'));
          $contact->setPhone($request->getParameter('phonenumber'));
          $contact->setPropertyId($this->property->getId());
          $contact->save();

          $dataTraffic['propcode'] = $this->property->getCode();
          $dataTraffic['fname'] = $request->getParameter('firstname');
          $dataTraffic['mname'] = '';
          $dataTraffic['lname'] = $request->getParameter('lastname');
          $dataTraffic['address'] = '';
          $dataTraffic['city'] = '';
          $dataTraffic['state'] = '';
          $dataTraffic['zip'] = '';
          $dataTraffic['hphone'] = $request->getParameter('phonenumber');
          $dataTraffic['wphone'] = '';
          $dataTraffic['cphone'] = '';
          $dataTraffic['email'] = $request->getParameter('emailaddress');
          $dataTraffic['notes'] = '';
          $dataTraffic['unitnum'] = '';
          $dataTraffic['unittype'] = '';
          $dataTraffic['pricerange'] = '';
          $dataTraffic['pettype'] = '';
          $dataTraffic['petbreed'] = '';
          $dataTraffic['petweight'] = '';
          $dataTraffic['leaseterm'] = '';
          $dataTraffic['numocc'] = '';

          $this->sendTraffic($dataTraffic);

          //print_r($values);
          $this->redirect('contact/thankyou');

      //}
    }
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acacia');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jsp');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout('amc_layout');
      $this->setTemplate('amc');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('community_cornerstone_layout');
      $this->setTemplate('cornerstone');
    }

  }

  public function executeShortm(sfWebRequest $request)
  {
  //$this->form = new ContactForm();


    if ($request->isMethod('post')){
      //$this->form->bind($request->getParameter('contact'));
      //$this->form->bind(array(
       //'captcha'   => $request->getParameter('captcha'),
      // 'contact' => $request->getParameter('contact')
//));

      //if ($this->form->isValid()){

        //$values = $this->form->getValues();

        if($this->propertyTemplate->getEmail()){
          $arrEmails = array();
          $arrEmails = explode('~',$this->propertyTemplate->getEmail());
        } else {
          $arrEmails = array($this->property->getEmail());
        }

// Property Email -------------------------------------------------------------------
          $mailBody = $this->getPartial('contactEmail',
            array('name' => $request->getParameter('firstname') ." ". $request->getParameter('lastname'),
                  'email' => $request->getParameter('email'),
                  'employer' => '',
                  'occupants' => '',
                  'pets' => '',
                  'when' => '',
                  'bedrooms' => '',
                  'howhear' => '',
                  'howcontact' => array(),
                  'notes' => $request->getParameter('notes'),
                  'phone' => $request->getParameter('phone'),
                  'fax' => '',
            ));

          try
          {


          $mailFrom = $request->getParameter('email');

          $message = $this->getMailer()->compose(
          $mailFrom,
          $arrEmails,
          $this->property->getName().' mobile contact request',
          $mailBody);
          $message->addBcc('matt@marketapts.com');
          $this->getMailer()->send($message);

          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }



// Auto Reply Email -------------------------------------------------------------------
          //if($this->propmanger){
          //  $mailFrom = $this->propmanger->getName() ? new Swift_Address($this->propmanger->getEmail(), $this->propmanger->getName()): $this->propmanger->getEmail();
            //$propmanager = $this->propmanger->getName() ? $this->propmanger->getName()." (Manager)\n".$this->propmanger->getEmail() : $this->propmanger->getEmail();
          //} else {
          $mailFrom = trim($this->property->getEmail());
          //$mailFrom = 'k.ferran@amcllc.net';
            //$propmanager = $mailFrom;
          //}
          $propmanager = $this->property->getName()."\n".$mailFrom;

          $mailBody = $this->getPartial('contactReplyEmail',
              array('emailtext' => $this->propertyTemplate->getContactEmailText(),
                    'propertyname' => $this->property->getName(),
                    'name' => $request->getParameter('firstname') ." ".$request->getParameter('lastname'),
                    'special' => $this->property->getSpecial(),
                    'propmanager' => $propmanager,
                    'petpolicy' => $this->property->getPetPolicy()));
          try
          {

          $message = $this->getMailer()->compose(
          $mailFrom,
          $request->getParameter('email'),
          $this->property->getName().' mobile contact request',
          $mailBody);
          $this->getMailer()->send($message);

          } catch (Swift_ConnectionException $e) {
            $this->logMessage("There was a problem communicating with SMTP: " . $e->getMessage(),'err');
          } catch (Swift_Message_MimeException $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage(),'err');
          } catch (Exception $e) {
            $this->logMessage("There was an unexpected problem building the email:" . $e->getMessage()." ".$mailFrom,'err');
          }

          $contact = new Contact();
          $contact->setFirstName($request->getParameter('firstname'));
          $contact->setLastName($request->getParameter('lastname'));
          $contact->setEmail($request->getParameter('email'));
          $contact->setPhone($request->getParameter('phone'));
          $contact->setPropertyId($this->property->getId());
          $contact->save();

          $dataTraffic['propcode'] = $this->property->getCode();
          $dataTraffic['fname'] = $request->getParameter('firstname');
          $dataTraffic['mname'] = '';
          $dataTraffic['lname'] = $request->getParameter('lastname');
          $dataTraffic['address'] = '';
          $dataTraffic['city'] = '';
          $dataTraffic['state'] = '';
          $dataTraffic['zip'] = '';
          $dataTraffic['hphone'] = $request->getParameter('phonenumber');
          $dataTraffic['wphone'] = '';
          $dataTraffic['cphone'] = '';
          $dataTraffic['email'] = $request->getParameter('emailaddress');
          $dataTraffic['notes'] = '';
          $dataTraffic['unitnum'] = '';
          $dataTraffic['unittype'] = '';
          $dataTraffic['pricerange'] = '';
          $dataTraffic['pettype'] = '';
          $dataTraffic['petbreed'] = '';
          $dataTraffic['petweight'] = '';
          $dataTraffic['leaseterm'] = '';
          $dataTraffic['numocc'] = '';

          $this->sendTraffic($dataTraffic);

          //print_r($values);

          $this->redirect('default/index/#page_thankyou');
          //return sfView::NONE;

      //}
    }
  }

  public function executeThankyou(sfWebRequest $request)
  {
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acaciathankyou');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jspthankyou');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      $this->setLayout('amc_layout');
      $this->setTemplate('amcthankyou');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('cornerstone_layout');
      $this->setTemplate('cornerstone');
    }

  }
  public function executeMinthankyou(sfWebRequest $request)
  {
  //	$objAcacia = new myAcacia();
    //if($objAcacia->isAcatia($this->property->getCode())){
    if($this->objCustomTemplate->isAcatia($this->property->getCode())){
      //$this->forward('default', 'acacia');
      $this->setLayout('acacia_layout');
      $this->setTemplate('acaciathankyou');
    } elseif($this->objCustomTemplate->isJSP($this->property->getCode())){
      $this->setLayout('jsp_layout');
      $this->setTemplate('jspthankyou');
    } elseif($this->objCustomTemplate->isAMC($this->property->getCode())){
      //$this->setLayout('amc_layout');
      //$this->setTemplate('amcminthankyou');
      $this->setLayout(false);
      $this->setTemplate('amcminthankyou');
    } elseif($this->objCustomTemplate->isCornerstone($this->property->getCode())){
      $this->setLayout('cornerstone_layout');
      $this->setTemplate('cornerstonethankyou');
    }
  }
}
