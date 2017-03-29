<?php

require_once '/home/amcllc/amcapartments_com/dev_apts/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
    //$this->dispatcher->connect('request.filter_parameters', array($this, 'filterRequestParameters'));
  }
	public function filterRequestParameters(sfEvent $event, $parameters)
  {
    $request = $event->getSubject();
		//print_r($request->getHttpHeader('User-Agent'));
		//Mozilla/5.0 (Linux; U; Android 2.1-update1; de-de; HTC Desire 1.19.161.5 Build/ERE27) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17
		
    if (preg_match('/Mobile/', $request->getHttpHeader('User-Agent')))
    {
      $request->setRequestFormat('mobile');
      //print_r($request->getHttpHeader('User-Agent'));
      //exit;
    }

    return $parameters;
  }
}
