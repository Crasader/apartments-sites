<?php

class User extends BaseUser
{
  public function getUserRolesList() {
    $user_role_names = array();
    foreach ($this->getUserUserRoles() as $user_user_role) {
            $user_role_names[] = $user_user_role->getUserRole()->getRoleName();
    }
    return implode(',', $user_role_names);
  }
  
  public function getUserPropertysList() {
    $user_property_names = array();
    foreach ($this->getUserPropertys() as $user_property_name) {
            $user_property_names[] = $user_property_name->getProperty()->getName();
    }
    return implode(',<br />', $user_property_names);
  }
  
  public function doLogin($user_session) {
    //$this->setLastLogin(date('Y-m-d H:i:s'));
    $user_session->setAuthenticated(true);
    foreach ($this->getUserUserRoles() as $user_user_role) {
      $user_session->addCredential($user_user_role->getUserRole()->getRoleName());
    }
    //$this->save();
    $user_session->setAttribute('user_id', $this->getId());
  }
  
  public function hasUserRole($role) {
    $user_user_roles = $this->getUserUserRoles();
    foreach($user_user_roles as $user_user_role) {
      if ($user_user_role->getUserRole()->getRoleName() == $role) {
        return true;
      }
    }
    
    return false;
  }
}
