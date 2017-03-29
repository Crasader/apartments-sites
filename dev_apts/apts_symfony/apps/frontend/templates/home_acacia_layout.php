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
</html>*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_title() ?>
<?php include_http_metas() ?>
<?php include_metas() ?>
</head>

<body>
<!-- Shell -->
	<div class="main_shell">	
	
		<!-- Header -->
		<div class="header_outter">
			<div class="header_inner">
				<?php if (has_slot('logo')): ?>
					<?php include_slot('logo') ?>
				<?php endif; ?>
				<div class="header_right_container">
					<div class="header_right_inner">
						<div class="header_right_login">
							<a href="<?php echo url_for("residents/login")?>"><img src="/images/acacia/btn_login.png" border="0" /></a>
						</div>
						<div class="header_right_resident">
							Already a resident?
						</div>
					</div>
					<div class="header_right_nav">
						<div class="header_right_params">
							<a href="<?php echo url_for("floorplans/index")?>" class="nav_item">FLOOR PLANS</a>
							<a href="<?php echo url_for("photos/index")?>" class="nav_item">PHOTOS</a>
							<a href="<?php echo url_for("features/index")?>" class="nav_item">FEATURES</a>
							<a href="<?php echo url_for("community/index")?>" class="nav_item">COMMUNITY</a>
							<a href="<?php echo url_for("contact/min")?>" class="nav_item">CONTACT</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php if (has_slot('banner')): ?>
			<?php include_slot('banner') ?>
		<?php endif; ?>

  <?php echo $sf_content ?>


<!-- Social Bar -->
		<div class="social_bar_outter">
			<div class="social_bar_inner">
				
				<div class="social_bar_params">
					<div class="social_bar_content">
						<a href="#" class="social_item"><img src="/images/acacia/icon_facebook.png" alt=""/></a>
						<a href="#" class="social_item"><img src="/images/acacia/icon_twitter.png" alt=""/></a>
						<a href="#" class="social_item"><img src="/images/acacia/icon_vimeo.png" alt=""/></a>
						<a href="#" class="social_item"><img src="/images/acacia/icon_flickr.png" alt=""/></a>
						<a href="#" class="social_item"><img src="/images/acacia/icon_linkedin.png" alt=""/></a>
						<a href="#" class="social_item"><img src="/images/acacia/icon_youtube.png" alt=""/></a>
						<a href="#" class="social_item"><img src="/images/acacia/icon_google.png" alt=""/></a>
					</div>
				</div>				
				
			</div>
		</div>
		
		<!-- Footer -->
		<div class="footer_outter">
			<div class="footer_inner">
			
				<div class="footer_params">
					<div class="footer_content">
						
						<?php if (has_slot('address')): ?>
							<?php include_slot('address') ?>
						<?php endif; ?>
							
						<?php if (has_slot('logo-grey')): ?>
							<?php include_slot('logo-grey') ?>
						<?php endif; ?>
					</div>
					<div class="footer_content"><a href="<?php echo url_for('privacy-policy/index')?>"><small>Privacy Policy</small></a> | <a href="<?php echo url_for('terms-of-use/index')?>"><small>Terms of Use</small></a> | <small>Copyright &copy;<?php echo date('Y')?></small></div>
				</div>	
				
			</div>
		</div>

<!-- endShell -->
</div>
</body>
</html>
