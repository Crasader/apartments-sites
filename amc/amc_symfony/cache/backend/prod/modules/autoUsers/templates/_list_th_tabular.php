  <th id="sf_admin_list_th_username">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/user/sort') == 'username'): ?>
      <?php echo link_to(__('Username'), 'users/list?sort=username&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Username'), 'users/list?sort=username&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_name">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/user/sort') == 'name'): ?>
      <?php echo link_to(__('Name'), 'users/list?sort=name&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Name'), 'users/list?sort=name&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_user_roles_list">
        <?php echo __('User roles list') ?>
          </th>
  <th id="sf_admin_list_th_email">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/user/sort') == 'email'): ?>
      <?php echo link_to(__('Email'), 'users/list?sort=email&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Email'), 'users/list?sort=email&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_created_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/user/sort') == 'created_at'): ?>
      <?php echo link_to(__('Created at'), 'users/list?sort=created_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/user/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Created at'), 'users/list?sort=created_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_user_propertys_list">
        <?php echo __('User propertys list') ?>
          </th>
