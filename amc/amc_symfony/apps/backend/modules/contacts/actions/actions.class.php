<?php

/**
 * contacs actions.
 *
 * @package    amc_symfony
 * @subpackage contacts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class contactsActions extends autocontactsActions
{
/*	public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Contact', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/contact')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/contact');
    }
  }*/
}
