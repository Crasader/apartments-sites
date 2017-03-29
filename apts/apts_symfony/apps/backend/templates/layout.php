<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

<h1>Property Website Administration</h1>




<?php if ($sf_user->isAuthenticated() && (($sf_user->hasCredential('admin') || $sf_user->hasCredential('manager')))): ?>

  <div class='admin_nav' style='float:right;'>
    <?php echo link_to('logout', 'default/logout') ?>
  </div>

  <div class='admin_nav'>
    <?php echo link_to('home', 'default/index') ?> |
    <?php //echo link_to('residents', 'residents/index') ?>
    <?php echo link_to('property', 'properties/index') ?> |
    <?php echo link_to('property floorplans', 'property_floorplans/index') ?> |
    <?php /*echo link_to('property photos', 'property_photos/index') */?>
    <?php echo link_to('property web template', 'property_templates/index') ?>
  </div>

<?php else: ?>

  <div class='admin_nav'>
    <?php echo link_to('login', 'default/login') ?>
  </div>

<?php endif ?>

<hr />

<?php if ($sf_user->hasFlash('message')): ?>
  <div id='flash_message'><?php echo $sf_user->getFlash('message') ?></div>
<?php endif ?>

<?php echo $sf_content ?>

</body>
</html>
