<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Property Photos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('property_photos/edit_header', array('property_photo' => $property_photo)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('property_photos/edit_messages', array('property_photo' => $property_photo, 'labels' => $labels)) ?>
<?php include_partial('property_photos/edit_form', array('property_photo' => $property_photo, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('property_photos/edit_footer', array('property_photo' => $property_photo)) ?>
</div>

</div>
