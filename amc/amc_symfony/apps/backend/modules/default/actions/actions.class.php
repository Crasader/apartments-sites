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
    
  }
  public function executeIndex($request)
  {
    $connection = Propel::getConnection();
		$query = "SELECT p.*
							FROM property p 
								left join property_photo pph on p.id = pph.property_id
							WHERE p.status_id = 2 AND pph.id is null
							ORDER BY name";
		$this->stPhotos = $connection->query($query);
		$this->stPhotos->setFetchMode(PDO::FETCH_ASSOC);  
		

		$query = "SELECT p.*
							FROM property p 
								left join property_floorplan pfp on p.id = pfp.property_id
							WHERE p.status_id = 2 AND pfp.id is null
							ORDER BY name";
		$this->stFloorplans = $connection->query($query);
		$this->stFloorplans->setFetchMode(PDO::FETCH_ASSOC); 

		$query = "SELECT p.*
							FROM property p 
								left join property_apartment_feature paf on p.id = paf.property_id
							WHERE p.status_id = 2 AND paf.id is null
							ORDER BY name";
		$this->stAptFeatures = $connection->query($query);
		$this->stAptFeatures->setFetchMode(PDO::FETCH_ASSOC); 
		
		$query = "SELECT p.*
							FROM property p 
								left join property_community_feature pcf on p.id = pcf.property_id
							WHERE p.status_id = 2 AND pcf.id is null
							ORDER BY name";
		$this->stComFeatures = $connection->query($query);
		$this->stComFeatures->setFetchMode(PDO::FETCH_ASSOC); 
		
		$query = "SELECT p.name,
								if(p.email = '','Yes','No') as email,
								if(p.description = '','Yes','No') as description,
								if(p.directions = '','Yes','No') as directions,
								if(pt.logo_image = '','Yes','No') as logo_image,
								if(pt.rentalapp_file = '','Yes','No') as application,
								if(p.special = '','Yes','No') as special,
								if(p.address = '','Yes','No') as address,
								if(p.city = '','Yes','No') as city,
								if(p.state_id = '','Yes','No') as state_id,
								if(p.zip = '','Yes','No') as zip,
								if(p.phone = '','Yes','No') as phone,
								if(p.fax = '','Yes','No') as fax 
								FROM property p 
								left join property_template pt on p.id = pt.property_id
								WHERE p.status_id = 2
								AND (
								  p.email = ''
								OR p.description = ''
								OR p.directions = ''
								OR pt.logo_image = ''
								OR pt.rentalapp_file = ''
								OR p.special = ''
								OR p.address= ''
								OR p.city= ''
								OR p.state_id = ''
								OR p.zip = ''
								OR p.phone = ''
								OR p.fax = ''
								)
								ORDER BY p.name";
		$this->stTemplate = $connection->query($query);
		$this->stTemplate->setFetchMode(PDO::FETCH_ASSOC);
  }
  
  public function executeLogin($request)
  {
    $this->form = new LoginForm();
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('login'));
      if ($this->form->isValid())
      {
        $c = new Criteria();
        $c->add(UserPeer::USERNAME, $request->getParameter('login[username]', ''));
        $user = UserPeer::doSelectOne($c);
        if ($user === NULL)
        {
          $this->error = 'Invalid username/password';
        }
        else
        {
          if ($request->getParameter('login[password]') == $user->getPassword())
          {
            $user->doLogin($this->getUser());

            $this->getUser()->setFlash('message', 'Login Successful');
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
    
    
    $this->redirect('default/login');
  }
}