<th id="sf_admin_list_th_property">
  <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_template/sort') == 'property'): ?>
    <?php echo link_to(__('Property'), 'property_templates/list?sort=property&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_template/sort') == 'asc' ? 'desc' : 'asc')) ?>
    (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_template/sort')) ?>)
  <?php else: ?>
    <?php echo link_to(__('Property'), 'property_templates/list?sort=property&type=asc') ?>
  <?php endif; ?>
</th>
<th id="sf_admin_list_th_property_url">
  <?php echo __('Property url') ?>
</th>
