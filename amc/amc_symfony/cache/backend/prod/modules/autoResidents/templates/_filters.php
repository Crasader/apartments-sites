<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('residents/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_email"><?php echo __('Email:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[email]', isset($filters['email']) ? $filters['email'] : null, array (
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
    <li><?php echo button_to(__('reset'), 'residents/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
