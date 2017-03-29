  <th id="sf_admin_list_th_code">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property/sort') == 'code'): ?>
      <?php echo link_to(__('Code'), 'properties/list?sort=code&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Code'), 'properties/list?sort=code&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_name">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property/sort') == 'name'): ?>
      <?php echo link_to(__('Name'), 'properties/list?sort=name&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Name'), 'properties/list?sort=name&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_city">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property/sort') == 'city'): ?>
      <?php echo link_to(__('City'), 'properties/list?sort=city&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('City'), 'properties/list?sort=city&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_state">
        <?php echo __('State') ?>
          </th>
  <th id="sf_admin_list_th_featured">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property/sort') == 'featured'): ?>
      <?php echo link_to(__('Featured'), 'properties/list?sort=featured&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Featured'), 'properties/list?sort=featured&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_status">
        <?php echo __('Status') ?>
          </th>
  <th id="sf_admin_list_th_url">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property/sort') == 'url'): ?>
      <?php echo link_to(__('Url'), 'properties/list?sort=url&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Url'), 'properties/list?sort=url&type=asc') ?>
      <?php endif; ?>
          </th>
