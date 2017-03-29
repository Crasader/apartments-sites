<?php

class LoginForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInputPassword()
      ));
    $this->widgetSchema->setLabels(array(
      'username' => 'Username',
      'password' => 'Password'
    ));
    $this->widgetSchema->setNameFormat('login[%s]');

    $this->setValidators(array(
      'password' => new sfValidatorString(array('trim'=>true), array('required' => 'The password field is required')),
      'username' => new sfValidatorString(array('trim'=>true), array('required' => 'The username field is required'))
    ));

  }
}


class defaultActions extends sfActions
{
  public function executeSecure($request)
  {
    //var_dump($this->getUser()->hasCredential('manager'));
  }
  public function executeIndex($request)
  {

  }
  
  public function executeLogin($request)
  { 	
    $this->form = new LoginForm();
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid())
      {
      	$IntPropertyId = $this->getUser()->getAttribute('poperty');
      	
        $c = new Criteria();
        $c->addJoin(UserPeer::ID,UserPropertyPeer::USER_ID);
        $c->add(UserPeer::USERNAME, $request->getParameter('login[username]', ''));
        $c->add(UserPropertyPeer::PROPERTY_ID, $IntPropertyId,Criteria::IN);
        $user = UserPeer::doSelectOne($c);
        if ($user === NULL)
        {
          $this->error = 'Invalid username/password or access to property limited';
        }
        else
        {
          if ($request->getParameter('login[password]') == $user->getPassword())
          {
            $user->doLogin($this->getUser());

            $this->getUser()->setFlash('message', 'Login Successful');
            //$this->getUser()->setAuthenticated(true);
            //$this->getUser()->addCredential('manager');
            //$this->getUser()->setAttribute('user_id', $user->getId());
            //echo $this->getUser()->hasCredential('manager');
            //var_dump($this->getUser());
            $this->redirect('default/index');
          }
          else
          {

            $this->error = 'Invalid username/password';
          }
        }
      }
    }
  }
  
  
  public function executeLogout($request)
  {
    $user = $this->getUser();
    $user->setAuthenticated(false);
    $user->clearCredentials();
    
    $this->getUser()->setFlash('message', 'Logout Successful');
    
    
    //$this->redirect('default/login');
  }
}