<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Blog Articles', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('property_blogarticles/edit_header', array('property_blogarticle' => $property_blogarticle)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('property_blogarticles/edit_messages', array('property_blogarticle' => $property_blogarticle, 'labels' => $labels)) ?>
<?php include_partial('property_blogarticles/edit_form', array('property_blogarticle' => $property_blogarticle, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('property_blogarticles/edit_footer', array('property_blogarticle' => $property_blogarticle)) ?>
</div>

</div>
