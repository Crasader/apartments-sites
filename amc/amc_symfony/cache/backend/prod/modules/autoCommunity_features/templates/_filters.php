<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('community_features/list', array('method' => 'get')) ?>

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

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'community_features/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
