<?php echo form_tag('properties/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

<?php echo object_input_hidden_tag($property, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('property[code]', __($labels['property{code}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{code}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{code}')): ?>
    <?php echo form_error('property{code}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getCode', array (
  'size' => 50,
  'control_name' => 'property[code]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[name]', __($labels['property{name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{name}')): ?>
    <?php echo form_error('property{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getName', array (
  'size' => 50,
  'control_name' => 'property[name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[featured]', __($labels['property{featured}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{featured}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{featured}')): ?>
    <?php echo form_error('property{featured}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($property, 'getFeatured', array (
  'control_name' => 'property[featured]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[status_id]', __($labels['property{status_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{status_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{status_id}')): ?>
    <?php echo form_error('property{status_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($property, 'getStatusId', array (
  'related_class' => 'Status',
  'control_name' => 'property[status_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[description]', __($labels['property{description}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{description}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{description}')): ?>
    <?php echo form_error('property{description}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property, 'getDescription', array (
  'size' => '80x10',
  'control_name' => 'property[description]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[address]', __($labels['property{address}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{address}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{address}')): ?>
    <?php echo form_error('property{address}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getAddress', array (
  'size' => 80,
  'control_name' => 'property[address]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[city]', __($labels['property{city}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{city}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{city}')): ?>
    <?php echo form_error('property{city}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getCity', array (
  'size' => 50,
  'control_name' => 'property[city]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[state_id]', __($labels['property{state_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{state_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{state_id}')): ?>
    <?php echo form_error('property{state_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($property, 'getStateId', array (
  'related_class' => 'State',
  'control_name' => 'property[state_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[zip]', __($labels['property{zip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{zip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{zip}')): ?>
    <?php echo form_error('property{zip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getZip', array (
  'size' => 20,
  'control_name' => 'property[zip]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[phone]', __($labels['property{phone}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{phone}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{phone}')): ?>
    <?php echo form_error('property{phone}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getPhone', array (
  'size' => 20,
  'control_name' => 'property[phone]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[fax]', __($labels['property{fax}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{fax}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{fax}')): ?>
    <?php echo form_error('property{fax}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getFax', array (
  'size' => 20,
  'control_name' => 'property[fax]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[email]', __($labels['property{email}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{email}')): ?>
    <?php echo form_error('property{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getEmail', array (
  'size' => 80,
  'control_name' => 'property[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[image]', __($labels['property{image}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{image}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{image}')): ?>
    <?php echo form_error('property{image}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($property, 'getImage', array (
  'control_name' => 'property[image]',
  'include_link' => 'properties',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[url]', __($labels['property{url}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{url}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{url}')): ?>
    <?php echo form_error('property{url}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getUrl', array (
  'size' => 80,
  'control_name' => 'property[url]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[price_range]', __($labels['property{price_range}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{price_range}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{price_range}')): ?>
    <?php echo form_error('property{price_range}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getPriceRange', array (
  'size' => 50,
  'control_name' => 'property[price_range]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[unit_type]', __($labels['property{unit_type}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{unit_type}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{unit_type}')): ?>
    <?php echo form_error('property{unit_type}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getUnitType', array (
  'size' => 50,
  'control_name' => 'property[unit_type]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[special]', __($labels['property{special}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{special}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{special}')): ?>
    <?php echo form_error('property{special}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property, 'getSpecial', array (
  'size' => 80,
  'control_name' => 'property[special]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[hours]', __($labels['property{hours}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{hours}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{hours}')): ?>
    <?php echo form_error('property{hours}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property, 'getHours', array (
  'size' => '80x10',
  'control_name' => 'property[hours]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[pet_policy]', __($labels['property{pet_policy}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{pet_policy}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{pet_policy}')): ?>
    <?php echo form_error('property{pet_policy}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property, 'getPetPolicy', array (
  'size' => '80x10',
  'control_name' => 'property[pet_policy]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[directions]', __($labels['property{directions}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{directions}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{directions}')): ?>
    <?php echo form_error('property{directions}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($property, 'getDirections', array (
  'size' => '80x10',
  'control_name' => 'property[directions]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[apartment_features]', __($labels['property{apartment_features}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property{apartment_features}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{apartment_features}')): ?>
    <?php echo form_error('property{apartment_features}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list($property, 'getApartmentFeatures', array (
  'control_name' => 'property[apartment_features]',
  'through_class' => 'PropertyApartmentFeature',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[community_features]', __($labels['property{community_features}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property{community_features}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{community_features}')): ?>
    <?php echo form_error('property{community_features}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list($property, 'getCommunityFeatures', array (
  'control_name' => 'property[community_features]',
  'through_class' => 'PropertyCommunityFeature',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[other_features]', __($labels['property{other_features}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('property{other_features}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{other_features}')): ?>
    <?php echo form_error('property{other_features}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list($property, 'getOtherFeatures', array (
  'control_name' => 'property[other_features]',
  'through_class' => 'PropertyOtherFeature',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('property' => $property)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($property->getId()): ?>
<?php echo button_to(__('delete'), 'properties/delete?id='.$property->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
