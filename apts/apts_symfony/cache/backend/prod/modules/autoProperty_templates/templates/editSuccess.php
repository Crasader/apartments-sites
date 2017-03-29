<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Property Web Template', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('property_templates/edit_header', array('property_template' => $property_template)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('property_templates/edit_messages', array('property_template' => $property_template, 'labels' => $labels)) ?>
<?php include_partial('property_templates/edit_form', array('property_template' => $property_template, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('property_templates/edit_footer', array('property_template' => $property_template)) ?>
</div>

</div>
