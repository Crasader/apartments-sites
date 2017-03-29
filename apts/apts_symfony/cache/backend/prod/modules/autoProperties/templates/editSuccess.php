<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Property', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('properties/edit_header', array('property' => $property)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('properties/edit_messages', array('property' => $property, 'labels' => $labels)) ?>
<?php include_partial('properties/edit_form', array('property' => $property, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('properties/edit_footer', array('property' => $property)) ?>
</div>

</div>
