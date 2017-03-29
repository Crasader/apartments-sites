<?php echo form_tag('property_photos/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($property_photo, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('property_photo[name]', __($labels['property_photo{name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_photo{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_photo{name}')): ?>
    <?php echo form_error('property_photo{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_photo, 'getName', array (
  'size' => 50,
  'control_name' => 'property_photo[name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_photo[property_id]', __($labels['property_photo{property_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_photo{property_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_photo{property_id}')): ?>
    <?php echo form_error('property_photo{property_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($property_photo, 'getPropertyId', array (
  'related_class' => 'Property',
  'control_name' => 'property_photo[property_id]',
  'text_method' => 'getNomCode',
  'peer_method' => 'getSortedObject',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_photo[image]', __($labels['property_photo{image}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_photo{image}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_photo{image}')): ?>
    <?php echo form_error('property_photo{image}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($property_photo, 'getImage', array (
  'control_name' => 'property_photo[image]',
  'include_link' => 'photos',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_photo[photo_type_id]', __($labels['property_photo{photo_type_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_photo{photo_type_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_photo{photo_type_id}')): ?>
    <?php echo form_error('property_photo{photo_type_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($property_photo, 'getPhotoTypeId', array (
  'related_class' => 'PhotoType',
  'control_name' => 'property_photo[photo_type_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_photo[display_order]', __($labels['property_photo{display_order}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_photo{display_order}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_photo{display_order}')): ?>
    <?php echo form_error('property_photo{display_order}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_photo, 'getDisplayOrder', array (
  'size' => 7,
  'control_name' => 'property_photo[display_order]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('property_photo' => $property_photo)) ?>

</form>

<ul class="sf_admin_actions">
      <!--li class="float-left"><?php if ($property_photo->getId()): ?>
<?php echo button_to(__('delete'), 'property_photos/delete?id='.$property_photo->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li-->
<li class="float-left"><form method="post" class="button_to" action="/backend.php/property_photos/delete/id/<?php echo $property_photo->getId()?>"><div><input class="sf_admin_action_delete" value="delete" type="submit" onclick="return confirm('Are you sure?');"></div></form></li>
  </ul>
