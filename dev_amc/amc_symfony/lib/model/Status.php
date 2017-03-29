<?php

class Status extends BaseStatus
{
  Public function __toString(){
    return $this->getName();
  }
}
