<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Community Feature', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('community_features/edit_header', array('community_feature' => $community_feature)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('community_features/edit_messages', array('community_feature' => $community_feature, 'labels' => $labels)) ?>
<?php include_partial('community_features/edit_form', array('community_feature' => $community_feature, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('community_features/edit_footer', array('community_feature' => $community_feature)) ?>
</div>

</div>
