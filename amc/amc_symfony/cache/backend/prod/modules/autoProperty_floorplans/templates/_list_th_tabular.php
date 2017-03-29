  <th id="sf_admin_list_th_name">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_floorplan/sort') == 'name'): ?>
      <?php echo link_to(__('Name'), 'property_floorplans/list?sort=name&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Name'), 'property_floorplans/list?sort=name&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_property">
        <?php echo __('Property') ?>
          </th>
  <th id="sf_admin_list_th_bedrooms">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_floorplan/sort') == 'bedrooms'): ?>
      <?php echo link_to(__('Bedrooms'), 'property_floorplans/list?sort=bedrooms&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Bedrooms'), 'property_floorplans/list?sort=bedrooms&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_price">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_floorplan/sort') == 'price'): ?>
      <?php echo link_to(__('Price'), 'property_floorplans/list?sort=price&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Price'), 'property_floorplans/list?sort=price&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_lease_term">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_floorplan/sort') == 'lease_term'): ?>
      <?php echo link_to(__('Lease term'), 'property_floorplans/list?sort=lease_term&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Lease term'), 'property_floorplans/list?sort=lease_term&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_display_order">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_floorplan/sort') == 'display_order'): ?>
      <?php echo link_to(__('Display order'), 'property_floorplans/list?sort=display_order&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_floorplan/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Display order'), 'property_floorplans/list?sort=display_order&type=asc') ?>
      <?php endif; ?>
          </th>
