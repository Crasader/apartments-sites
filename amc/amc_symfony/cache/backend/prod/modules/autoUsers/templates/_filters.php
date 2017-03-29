<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('users/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_username"><?php echo __('Username:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[username]', isset($filters['username']) ? $filters['username'] : null, array (
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
    <label for="filters_email"><?php echo __('Email:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[email]', isset($filters['email']) ? $filters['email'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_created_at"><?php echo __('Created at:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[created_at]', isset($filters['created_at']) ? $filters['created_at'] : null, array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_updated_at"><?php echo __('Updated at:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[updated_at]', isset($filters['updated_at']) ? $filters['updated_at'] : null, array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'users/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
