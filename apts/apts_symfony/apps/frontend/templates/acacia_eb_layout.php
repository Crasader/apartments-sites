<?php /*<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <!--[if IE 6]>
      <script type="text/javascript" src="/js/unitpngfix.js"></script>
      <link rel="stylesheet" type="text/css" href="/css/ie6-styles.css" />
    <![endif]-->
    <?php if (has_slot('tracking-code')): ?>
      <?php include_slot('tracking-code') ?>
    <?php endif; ?>
  </head>
  <body>
    <?php if (has_slot('customstyles')): ?>
      <?php include_slot('customstyles') ?>
    <?php endif; ?>
    <div id="container">
    <?php if (has_slot('chat')): ?>
      <?php include_slot('chat') ?>
    <?php endif; ?>
      <div id="main-top">&nbsp;</div>
      <div id="main-repeat">
        <div id="content">
          <div id="header">
            <?php include_partial('global/login') ?>
            <?php if (has_slot('logo')): ?>
              <?php include_slot('logo') ?>
            <?php endif; ?>
          </div>
          <div class="stripe1"></div>
          <div class="stripe2"></div>
          <div class="stripe3"></div>
          <?php if (has_slot('home-img')): ?>
            <?php include_slot('home-img') ?>
          <?php endif; ?>
          <div class="stripe3"></div>
          <div class="stripe2"></div>
          <div class="stripe1"></div>
          <?php if (has_slot('nav')): ?>
            <?php include_slot('nav') ?>
          <?php endif; ?>
          <?php echo $sf_content ?>
        </div>
      </div>
      <div id="main-bot"></div>
    </div>
    <?php if (has_slot('bot-nav')): ?>
      <?php include_slot('bot-nav') ?>
    <?php endif; ?>
  </body>
</html>
-------------------------------------------

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_title() ?>
<?php include_http_metas() ?>
<?php include_metas() ?>
<style type="text/css">
<!--
a:link {
	color: #999999;
	text-decoration: none;
}
a:visited {
	color: #666;
	text-decoration: none;
}
a:hover {
	color: #999933;
	text-decoration: none;
}
a:active {
	color: #F00;
	text-decoration: none;
}
a {
	font-size: 12px;
}
-->
</style></head>

<body>

<div id="main-cont">

<div id="b-features">
<div id="header-case">
<div id="acheader">
		<?php if (has_slot('logo')): ?>
			<?php include_slot('logo') ?>
		<?php endif; ?>

    <div id="resident-login">Already a resident? </div>
    <div id="login-white"><a href="<?php echo url_for('residents/login')?>"><img src="//images/acacia/acacia/login-white.png" width="78" height="31" border=0/></a></div>
    <div id="links-header"><a href="<?php echo url_for('floorplans/index')?>">FLOOR PLAN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('photos/index')?>">PHOTOS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('features/index')?>">FEATURES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('community/index')?>">COMMUNITY</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('contact/index')?>">CONTACT</a></div>
  </div>  <!-- end of header -->
   </div> <!-- end of header-case -->

  <?php echo $sf_content ?>


  </div><!-- end of b-features -->
</div> <!-- end of a -->


<div id="footer">

  <div id="grey-top">
  <div id="grey-link">
  <div id="s-1"><img src="//images/acacia/acacia/s-facebook.png" width="31" height="31" /></div>
    <div id="s-2"><img src="//images/acacia/acacia/s-twitter.png" width="32" height="31" /></div>
    <div id="s-3"><img src="//images/acacia/acacia/s-vimeo.png" width="32" height="31" /></div>
    <div id="s-4"><img src="//images/acacia/acacia/s-flickr.png" width="31" height="31" /></div>
    <div id="s-5"><img src="//images/acacia/acacia/s-in.png" width="31" height="31" /></div>
    <div id="s-6"><img src="//images/acacia/acacia/youtube.png" width="32" height="31" /></div>
     <div id="s-7"><img src="//images/acacia/acacia/g.png" width="32" height="32" /></div>
     </div> <!-- end of grey-lin -->

  </div>
  <!-- end of grey-top -->
<div id="footer_ps">
<div id="footer_fl">
  <div id="footer-body">

    <?php if (has_slot('address')): ?>
			<?php include_slot('address') ?>
		<?php endif; ?>
    <?php if (has_slot('logo-grey')): ?>
			<?php include_slot('logo-grey') ?>
		<?php endif; ?>

  </div><!-- end of footer-body -->
</div>
</div>
</div><!-- end of footer -->

</body>
</html>
*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_title() ?>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php if (has_slot('tracking-code')): ?>
	<?php include_slot('tracking-code') ?>
<?php endif; ?>
</head>
<body>
<!-- Shell -->
	<div class="eb_main_cont">

    <div class="eb_main_shell">

		<?php if (has_slot('header')): ?>
			<?php include_slot('header') ?>
		<?php endif;?>

		<?php if (has_slot('banner')): ?>
			<?php include_slot('banner') ?>
		<?php endif;?>

		<?php echo $sf_content ?>

		</div>
	</div>
</body>
</html>
