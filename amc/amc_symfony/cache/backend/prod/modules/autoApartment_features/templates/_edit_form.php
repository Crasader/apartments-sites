<?php echo form_tag('apartment_features/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($apartment_feature, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('apartment_feature[name]', __($labels['apartment_feature{name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('apartment_feature{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('apartment_feature{name}')): ?>
    <?php echo form_error('apartment_feature{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($apartment_feature, 'getName', array (
  'size' => 80,
  'control_name' => 'apartment_feature[name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('apartment_feature' => $apartment_feature)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($apartment_feature->getId()): ?>
<?php echo button_to(__('delete'), 'apartment_features/delete?id='.$apartment_feature->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
