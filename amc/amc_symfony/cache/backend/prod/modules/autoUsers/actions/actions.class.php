<?php

/**
 * autoUsers actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoUsers
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoUsersActions extends sfActions
{
  public function executeIndex($request)
  {
    return $this->forward('users', 'list');
  }

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/user/filters');

    // pager
    $this->pager = new sfPropelPager('User', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/user')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/user');
    }
  }

  public function executeCreate($request)
  {
    return $this->forward('users', 'edit');
  }

  public function executeSave($request)
  {
    return $this->forward('users', 'edit');
  }


  public function executeDeleteSelected($request)
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (UserPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected Users. Make sure they do not have any associated items.');
      return $this->forward('users', 'list');
    }

    return $this->redirect('users/list');
  }

  public function executeEdit($request)
  {
    $this->user = $this->getUserOrCreate();

    if ($request->isMethod(sfRequest::POST))
    {
      $this->updateUserFromRequest();

      try
      {
        $this->saveUser($this->user);
      }
      catch (PropelException $e)
      {
        $request->setError('edit', 'Could not save the edited Users.');
        return $this->forward('users', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('users/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('users/list');
      }
      else
      {
        return $this->redirect('users/edit?id='.$this->user->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete($request)
  {
    $this->user = UserPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->user);

    try
    {
      $this->deleteUser($this->user);
    }
    catch (PropelException $e)
    {
      $request->setError('delete', 'Could not delete the selected User. Make sure it does not have any associated items.');
      return $this->forward('users', 'list');
    }

    return $this->redirect('users/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->user = $this->getUserOrCreate();
    $this->updateUserFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveUser($user)
  {
    $user->save();

      // Update many-to-many for "user_roles"
      $c = new Criteria();
      $c->add(UserUserRolePeer::USER_ID, $user->getPrimaryKey());
      UserUserRolePeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_user_roles');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $UserUserRole = new UserUserRole();
          $UserUserRole->setUserId($user->getPrimaryKey());
          $UserUserRole->setUserRoleId($id);
          $UserUserRole->save();
        }
      }

      // Update many-to-many for "user_prperties"
      $c = new Criteria();
      $c->add(UserPropertyPeer::USER_ID, $user->getPrimaryKey());
      UserPropertyPeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_user_prperties');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $UserProperty = new UserProperty();
          $UserProperty->setUserId($user->getPrimaryKey());
          $UserProperty->setPropertyId($id);
          $UserProperty->save();
        }
      }

  }

  protected function deleteUser($user)
  {
    $user->delete();
  }

  protected function updateUserFromRequest()
  {
    $user = $this->getRequestParameter('user');

    if (isset($user['username']))
    {
      $this->user->setUsername($user['username']);
    }
    if (isset($user['name']))
    {
      $this->user->setName($user['name']);
    }
    if (isset($user['user_roles']))
    {
      $this->user->setUserRoles($user['user_roles']);
    }
    if (isset($user['password']))
    {
      $this->user->setPassword($user['password']);
    }
    if (isset($user['email']))
    {
      $this->user->setEmail($user['email']);
    }
    if (isset($user['user_prperties']))
    {
      $this->user->setUserPrperties($user['user_prperties']);
    }
  }

  protected function getUserOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $user = new User();
    }
    else
    {
      $user = UserPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($user);
    }

    return $user;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/user/filters');

      $filters = $this->getRequestParameter('filters');
      if(is_array($filters))
      {
        if (isset($filters['created_at']['from']) && $filters['created_at']['from'] !== '')
        {
          $filters['created_at']['from'] = $this->getContext()->getI18N()->getTimestampForCulture($filters['created_at']['from'], $this->getUser()->getCulture());
        }
        if (isset($filters['created_at']['to']) && $filters['created_at']['to'] !== '')
        {
          $filters['created_at']['to'] = $this->getContext()->getI18N()->getTimestampForCulture($filters['created_at']['to'], $this->getUser()->getCulture());
        }
        if (isset($filters['updated_at']['from']) && $filters['updated_at']['from'] !== '')
        {
          $filters['updated_at']['from'] = $this->getContext()->getI18N()->getTimestampForCulture($filters['updated_at']['from'], $this->getUser()->getCulture());
        }
        if (isset($filters['updated_at']['to']) && $filters['updated_at']['to'] !== '')
        {
          $filters['updated_at']['to'] = $this->getContext()->getI18N()->getTimestampForCulture($filters['updated_at']['to'], $this->getUser()->getCulture());
        }
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/user');
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/user/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/user/filters');
      }
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/user/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/user/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/user/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['username_is_empty']))
    {
      $criterion = $c->getNewCriterion(UserPeer::USERNAME, '');
      $criterion->addOr($c->getNewCriterion(UserPeer::USERNAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['username']) && $this->filters['username'] !== '')
    {
      $c->add(UserPeer::USERNAME, strtr($this->filters['username'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(UserPeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(UserPeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(UserPeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['email_is_empty']))
    {
      $criterion = $c->getNewCriterion(UserPeer::EMAIL, '');
      $criterion->addOr($c->getNewCriterion(UserPeer::EMAIL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['email']) && $this->filters['email'] !== '')
    {
      $c->add(UserPeer::EMAIL, strtr($this->filters['email'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['created_at_is_empty']))
    {
      $criterion = $c->getNewCriterion(UserPeer::CREATED_AT, '');
      $criterion->addOr($c->getNewCriterion(UserPeer::CREATED_AT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['created_at']))
    {
      if (isset($this->filters['created_at']['from']) && $this->filters['created_at']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(UserPeer::CREATED_AT, $this->filters['created_at']['from'], Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['created_at']['to']) && $this->filters['created_at']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(UserPeer::CREATED_AT, $this->filters['created_at']['to'], Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(UserPeer::CREATED_AT, $this->filters['created_at']['to'], Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['updated_at_is_empty']))
    {
      $criterion = $c->getNewCriterion(UserPeer::UPDATED_AT, '');
      $criterion->addOr($c->getNewCriterion(UserPeer::UPDATED_AT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['updated_at']))
    {
      if (isset($this->filters['updated_at']['from']) && $this->filters['updated_at']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(UserPeer::UPDATED_AT, $this->filters['updated_at']['from'], Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['updated_at']['to']) && $this->filters['updated_at']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(UserPeer::UPDATED_AT, $this->filters['updated_at']['to'], Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(UserPeer::UPDATED_AT, $this->filters['updated_at']['to'], Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/user/sort'))
    {
      // camelize lower case to be able to compare with BasePeer::TYPE_PHPNAME translate field name
      $sort_column = UserPeer::translateFieldName(sfInflector::camelize(strtolower($sort_column)), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/user/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'user{username}' => 'Username:',
      'user{name}' => 'Name:',
      'user{user_roles}' => 'User roles:',
      'user{password}' => 'Password:',
      'user{email}' => 'Email:',
      'user{user_prperties}' => 'User prperties:',
    );
  }
}
