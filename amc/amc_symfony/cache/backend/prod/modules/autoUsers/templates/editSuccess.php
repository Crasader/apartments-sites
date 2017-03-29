<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Users', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('users/edit_header', array('user' => $user)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('users/edit_messages', array('user' => $user, 'labels' => $labels)) ?>
<?php include_partial('users/edit_form', array('user' => $user, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('users/edit_footer', array('user' => $user)) ?>
</div>

</div>
