<?php echo form_tag('other_features/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($other_feature, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('other_feature[name]', __($labels['other_feature{name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('other_feature{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('other_feature{name}')): ?>
    <?php echo form_error('other_feature{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($other_feature, 'getName', array (
  'size' => 50,
  'control_name' => 'other_feature[name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('other_feature' => $other_feature)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($other_feature->getId()): ?>
<?php echo button_to(__('delete'), 'other_features/delete?id='.$other_feature->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
