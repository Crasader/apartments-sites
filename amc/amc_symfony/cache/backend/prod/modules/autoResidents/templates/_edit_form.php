<?php echo form_tag('residents/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($resident, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('resident[first_name]', __($labels['resident{first_name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('resident{first_name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('resident{first_name}')): ?>
    <?php echo form_error('resident{first_name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($resident, 'getFirstName', array (
  'size' => 80,
  'control_name' => 'resident[first_name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('resident[last_name]', __($labels['resident{last_name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('resident{last_name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('resident{last_name}')): ?>
    <?php echo form_error('resident{last_name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($resident, 'getLastName', array (
  'size' => 80,
  'control_name' => 'resident[last_name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('resident[email]', __($labels['resident{email}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('resident{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('resident{email}')): ?>
    <?php echo form_error('resident{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($resident, 'getEmail', array (
  'size' => 80,
  'control_name' => 'resident[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('resident[password]', __($labels['resident{password}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('resident{password}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('resident{password}')): ?>
    <?php echo form_error('resident{password}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($resident, 'getPassword', array (
  'size' => 80,
  'control_name' => 'resident[password]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('resident[tenantid]', __($labels['resident{tenantid}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('resident{tenantid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('resident{tenantid}')): ?>
    <?php echo form_error('resident{tenantid}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($resident, 'getTenantid', array (
  'size' => 24,
  'control_name' => 'resident[tenantid]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('resident[property_id]', __($labels['resident{property_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('resident{property_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('resident{property_id}')): ?>
    <?php echo form_error('resident{property_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($resident, 'getPropertyId', array (
  'related_class' => 'Property',
  'control_name' => 'resident[property_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('resident[status_id]', __($labels['resident{status_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('resident{status_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('resident{status_id}')): ?>
    <?php echo form_error('resident{status_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($resident, 'getStatusId', array (
  'related_class' => 'Status',
  'control_name' => 'resident[status_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('resident' => $resident)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($resident->getId()): ?>
<?php echo button_to(__('delete'), 'residents/delete?id='.$resident->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
