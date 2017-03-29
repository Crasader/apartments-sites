  <th id="sf_admin_list_th_property">
        <?php echo __('Property') ?>
          </th>
  <th id="sf_admin_list_th_welcome">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_template/sort') == 'welcome'): ?>
      <?php echo link_to(__('Welcome'), 'property_templates/list?sort=welcome&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_template/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_template/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Welcome'), 'property_templates/list?sort=welcome&type=asc') ?>
      <?php endif; ?>
          </th>
