<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Other Feature', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('other_features/edit_header', array('other_feature' => $other_feature)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('other_features/edit_messages', array('other_feature' => $other_feature, 'labels' => $labels)) ?>
<?php include_partial('other_features/edit_form', array('other_feature' => $other_feature, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('other_features/edit_footer', array('other_feature' => $other_feature)) ?>
</div>

</div>
