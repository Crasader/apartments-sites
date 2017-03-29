  <th id="sf_admin_list_th_name">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_photo/sort') == 'name'): ?>
      <?php echo link_to(__('Name'), 'property_photos/list?sort=name&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_photo/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_photo/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Name'), 'property_photos/list?sort=name&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_property">
        <?php echo __('Property') ?>
          </th>
  <th id="sf_admin_list_th_photo_type">
        <?php echo __('Photo type') ?>
          </th>
  <th id="sf_admin_list_th_display_order">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_photo/sort') == 'display_order'): ?>
      <?php echo link_to(__('Display order'), 'property_photos/list?sort=display_order&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_photo/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_photo/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Display order'), 'property_photos/list?sort=display_order&type=asc') ?>
      <?php endif; ?>
          </th>
