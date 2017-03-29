<?php

class MyProperty extends BaseProperty
{
  Public function __toString(){
    return $this->getCode()." - ".$this->getName();
  }
}
