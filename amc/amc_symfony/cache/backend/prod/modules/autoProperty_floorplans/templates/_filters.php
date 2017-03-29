<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('property_floorplans/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_name"><?php echo __('Name:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[name]', isset($filters['name']) ? $filters['name'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_property_id"><?php echo __('Property:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['property_id']) ? $filters['property_id'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'Property',
  'text_method' => '__toString',
  'control_name' => 'filters[property_id]',
  'peer_method' => 'getAll',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'property_floorplans/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
