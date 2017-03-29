<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Residents', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('residents/edit_header', array('resident' => $resident)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('residents/edit_messages', array('resident' => $resident, 'labels' => $labels)) ?>
<?php include_partial('residents/edit_form', array('resident' => $resident, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('residents/edit_footer', array('resident' => $resident)) ?>
</div>

</div>
