<?php echo form_tag('community_features/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($community_feature, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('community_feature[name]', __($labels['community_feature{name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('community_feature{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('community_feature{name}')): ?>
    <?php echo form_error('community_feature{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($community_feature, 'getName', array (
  'size' => 80,
  'control_name' => 'community_feature[name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('community_feature' => $community_feature)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($community_feature->getId()): ?>
<?php echo button_to(__('delete'), 'community_features/delete?id='.$community_feature->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
