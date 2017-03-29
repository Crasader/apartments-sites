  <th id="sf_admin_list_th_name">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/apartment_feature/sort') == 'name'): ?>
      <?php echo link_to(__('Name'), 'apartment_features/list?sort=name&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/apartment_feature/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/apartment_feature/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Name'), 'apartment_features/list?sort=name&type=asc') ?>
      <?php endif; ?>
          </th>
