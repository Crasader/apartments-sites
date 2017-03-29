<?php echo form_tag('property_floorplans/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($property_floorplan, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('property_floorplan[name]', __($labels['property_floorplan{name}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{name}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{name}')): ?>
    <?php echo form_error('property_floorplan{name}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_floorplan, 'getName', array (
  'size' => 50,
  'control_name' => 'property_floorplan[name]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[property_id]', __($labels['property_floorplan{property_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{property_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{property_id}')): ?>
    <?php echo form_error('property_floorplan{property_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($property_floorplan, 'getPropertyId', array (
  'related_class' => 'Property',
  'control_name' => 'property_floorplan[property_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[bedrooms]', __($labels['property_floorplan{bedrooms}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{bedrooms}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{bedrooms}')): ?>
    <?php echo form_error('property_floorplan{bedrooms}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_floorplan, 'getBedrooms', array (
  'size' => 7,
  'control_name' => 'property_floorplan[bedrooms]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[bathrooms]', __($labels['property_floorplan{bathrooms}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{bathrooms}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{bathrooms}')): ?>
    <?php echo form_error('property_floorplan{bathrooms}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_floorplan, 'getBathrooms', array (
  'size' => 20,
  'control_name' => 'property_floorplan[bathrooms]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[square_feet]', __($labels['property_floorplan{square_feet}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{square_feet}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{square_feet}')): ?>
    <?php echo form_error('property_floorplan{square_feet}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_floorplan, 'getSquareFeet', array (
  'size' => 50,
  'control_name' => 'property_floorplan[square_feet]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[price]', __($labels['property_floorplan{price}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{price}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{price}')): ?>
    <?php echo form_error('property_floorplan{price}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_floorplan, 'getPrice', array (
  'size' => 50,
  'control_name' => 'property_floorplan[price]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[lease_term]', __($labels['property_floorplan{lease_term}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{lease_term}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{lease_term}')): ?>
    <?php echo form_error('property_floorplan{lease_term}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_floorplan, 'getLeaseTerm', array (
  'size' => 50,
  'control_name' => 'property_floorplan[lease_term]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[deposit]', __($labels['property_floorplan{deposit}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{deposit}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{deposit}')): ?>
    <?php echo form_error('property_floorplan{deposit}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($property_floorplan, 'getDeposit', array (
  'size' => 50,
  'control_name' => 'property_floorplan[deposit]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('property_floorplan[image]', __($labels['property_floorplan{image}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('property_floorplan{image}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('property_floorplan{image}')): ?>
    <?php echo form_error('property_floorplan{image}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($property_floorplan, 'getImage', array (
  'control_name' => 'property_floorplan[image]',
  'include_link' => 'floorplans',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('property_floorplan' => $property_floorplan)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($property_floorplan->getId()): ?>
<?php echo button_to(__('delete'), 'property_floorplans/delete?id='.$property_floorplan->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
