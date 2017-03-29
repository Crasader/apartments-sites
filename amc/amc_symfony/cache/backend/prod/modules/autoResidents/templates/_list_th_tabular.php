  <th id="sf_admin_list_th_first_name">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/resident/sort') == 'first_name'): ?>
      <?php echo link_to(__('First name'), 'residents/list?sort=first_name&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/resident/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/resident/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('First name'), 'residents/list?sort=first_name&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_last_name">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/resident/sort') == 'last_name'): ?>
      <?php echo link_to(__('Last name'), 'residents/list?sort=last_name&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/resident/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/resident/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Last name'), 'residents/list?sort=last_name&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_email">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/resident/sort') == 'email'): ?>
      <?php echo link_to(__('Email'), 'residents/list?sort=email&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/resident/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/resident/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Email'), 'residents/list?sort=email&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_property">
        <?php echo __('Property') ?>
          </th>
  <th id="sf_admin_list_th_status">
        <?php echo __('Status') ?>
          </th>
