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

  <?php $value = $property->getCode(); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[name]', __($labels['property{name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{name}')): ?>
    <?php echo form_error('property{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = $property->getName(); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property[description]', __($labels['property{description}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property{description}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property{description}')): ?>
    <?php echo form_error('property{description}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = $property->getDescription(); echo $value ? $value : '&nbsp;' ?>
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
  </ul>
