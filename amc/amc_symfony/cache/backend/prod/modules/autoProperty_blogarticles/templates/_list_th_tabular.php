<th id="sf_admin_list_th_property">
  <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_blogarticle/sort') == 'property'): ?>
    <?php echo link_to(__('Property'), 'property_blogarticles/list?sort=property&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_blogarticle/sort') == 'asc' ? 'desc' : 'asc')) ?>
    (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_blogarticle/sort')) ?>)
  <?php else: ?>
    <?php echo link_to(__('Property'), 'property_blogarticles/list?sort=property&type=asc') ?>
  <?php endif; ?>
</th>
<th id="sf_admin_list_th_title">
  <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_blogarticle/sort') == 'title'): ?>
    <?php echo link_to(__('Title'), 'property_blogarticles/list?sort=title&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_blogarticle/sort') == 'asc' ? 'desc' : 'asc')) ?>
    (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_blogarticle/sort')) ?>)
  <?php else: ?>
    <?php echo link_to(__('Title'), 'property_blogarticles/list?sort=title&type=asc') ?>
  <?php endif; ?>
</th>
<th id="sf_admin_list_th_perma_link">
  <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/property_blogarticle/sort') == 'perma_link'): ?>
    <?php echo link_to(__('Perma link'), 'property_blogarticles/list?sort=perma_link&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/property_blogarticle/sort') == 'asc' ? 'desc' : 'asc')) ?>
    (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/property_blogarticle/sort')) ?>)
  <?php else: ?>
    <?php echo link_to(__('Perma link'), 'property_blogarticles/list?sort=perma_link&type=asc') ?>
  <?php endif; ?>
</th>
