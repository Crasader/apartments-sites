<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('properties/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_code"><?php echo __('Code:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[code]', isset($filters['code']) ? $filters['code'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_name"><?php echo __('Name:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[name]', isset($filters['name']) ? $filters['name'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_city"><?php echo __('City:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[city]', isset($filters['city']) ? $filters['city'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_state_id"><?php echo __('State:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['state_id']) ? $filters['state_id'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'State',
  'text_method' => '__toString',
  'control_name' => 'filters[state_id]',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_featured"><?php echo __('Featured:') ?></label>
    <div class="content">
    <?php echo select_tag('filters[featured]', options_for_select(array(1 => __('yes'), 0 => __('no')), isset($filters['featured']) ? $filters['featured'] : null, array (
  'include_custom' => __("yes or no"),
)), array (
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_status_id"><?php echo __('Status:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['status_id']) ? $filters['status_id'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'Status',
  'text_method' => '__toString',
  'control_name' => 'filters[status_id]',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'properties/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
