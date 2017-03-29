<?php echo form_tag('users/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($user, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('user[username]', __($labels['user{username}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('user{username}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('user{username}')): ?>
    <?php echo form_error('user{username}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($user, 'getUsername', array (
  'size' => 30,
  'control_name' => 'user[username]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('user[name]', __($labels['user{name}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('user{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('user{name}')): ?>
    <?php echo form_error('user{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($user, 'getName', array (
  'size' => 80,
  'control_name' => 'user[name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('user[user_roles]', __($labels['user{user_roles}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('user{user_roles}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('user{user_roles}')): ?>
    <?php echo form_error('user{user_roles}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_check_list($user, 'getUserRoles', array (
  'control_name' => 'user[user_roles]',
  'through_class' => 'UserUserRole',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('user[password]', __($labels['user{password}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('user{password}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('user{password}')): ?>
    <?php echo form_error('user{password}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($user, 'getPassword', array (
  'size' => 80,
  'control_name' => 'user[password]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('user[email]', __($labels['user{email}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('user{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('user{email}')): ?>
    <?php echo form_error('user{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($user, 'getEmail', array (
  'size' => 80,
  'control_name' => 'user[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('user[user_prperties]', __($labels['user{user_prperties}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('user{user_prperties}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('user{user_prperties}')): ?>
    <?php echo form_error('user{user_prperties}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_check_list($user, 'getUserPrperties', array (
  'control_name' => 'user[user_prperties]',
  'through_class' => 'UserProperty',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('user' => $user)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($user->getId()): ?>
<?php echo button_to(__('delete'), 'users/delete?id='.$user->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
