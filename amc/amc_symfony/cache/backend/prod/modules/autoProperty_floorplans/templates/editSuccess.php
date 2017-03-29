<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Property Floorplan', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('property_floorplans/edit_header', array('property_floorplan' => $property_floorplan)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('property_floorplans/edit_messages', array('property_floorplan' => $property_floorplan, 'labels' => $labels)) ?>
<?php include_partial('property_floorplans/edit_form', array('property_floorplan' => $property_floorplan, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('property_floorplans/edit_footer', array('property_floorplan' => $property_floorplan)) ?>
</div>

</div>
