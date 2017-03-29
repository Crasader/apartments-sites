<?php

class myCustomTemplate
{
	private $Acaciaproperties = array(
		'14FAR',
		'86PHR',
		);
	private $JSPproperties = array(
		'638ROF',
		);
	
	public function isAcatia($propCode){
		if(in_array($propCode,$this->Acaciaproperties)){
			return true;
		} else {
			return false;
		}
	}
	public function isJSP($propCode){
		if(in_array($propCode,$this->JSPproperties)){
			return true;
		} else {
			return false;
		}
	}
}
