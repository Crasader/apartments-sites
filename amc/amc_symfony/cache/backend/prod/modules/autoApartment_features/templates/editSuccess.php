<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Apartment Feature', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('apartment_features/edit_header', array('apartment_feature' => $apartment_feature)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('apartment_features/edit_messages', array('apartment_feature' => $apartment_feature, 'labels' => $labels)) ?>
<?php include_partial('apartment_features/edit_form', array('apartment_feature' => $apartment_feature, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('apartment_features/edit_footer', array('apartment_feature' => $apartment_feature)) ?>
</div>

</div>
