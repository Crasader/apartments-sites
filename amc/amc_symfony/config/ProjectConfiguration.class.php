<?php

require_once '/home/amcllc/amcapartments_com/amc/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
    $this->enablePlugins(array('DbFinderPlugin', 'sfPropelPlugin', 'sfCompat10Plugin'));
  	
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin'));
  }
}
