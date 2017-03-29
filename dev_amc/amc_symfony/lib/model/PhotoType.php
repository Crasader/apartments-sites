<?php

class PhotoType extends BasePhotoType
{
  Public function __toString(){
    return $this->getName();
  }
}
