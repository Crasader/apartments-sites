<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_title() ?>
<?php include_http_metas() ?>
<?php include_metas() ?>
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>

<h1>Property Website Administration</h1>




<?php if ($sf_user->isAuthenticated() && ($sf_user->hasCredential('admin'))): ?>

  <div class='admin_nav' style='float:right;'>
    <?php echo link_to('logout', 'default/logout') ?>
  </div>

  <div class='admin_nav'>
    <?php echo link_to('home', 'default/index') ?> |

    <?php echo link_to('residents', 'residents/index') ?> |
    <?php echo link_to('properties', 'properties/index') ?> |
    <?php echo link_to('apartment features', 'apartment_features/index') ?> |
    <?php echo link_to('community features', 'community_features/index') ?> |
    <?php echo link_to('other features', 'other_features/index') ?> <br />
    <?php echo link_to('property floorplans', 'property_floorplans/index') ?> |
    <?php echo link_to('property photos', 'property_photos/index') ?> |
    <?php echo link_to('property web templates', 'property_templates/index') ?> 
    <?php if($sf_user->hasCredential('admin')): ?>
      | <?php echo link_to('property_blog_articles', 'property_blogarticles/index') ?> 
      | <?php echo link_to('users', 'users/index') ?> 
      | <?php echo link_to('contacts', 'contacts/index') ?> 
    <?php endif; ?>
    
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
