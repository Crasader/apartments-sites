<?php

class UserRole extends BaseUserRole
{
  Public function __toString(){
    return $this->getRoleName();
  }
}
