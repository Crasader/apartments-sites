<?php /*<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
</html>*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  <div class="main_container">

    <!-- Header:start -->
    <div class="header_container">
      <div class="header_container_params">

        <!-- logo(s) -->
        <?php if (has_slot('logo')): ?>
          <?php include_slot('logo') ?>
        <?php endif; ?>

        <!-- blue top banner -->
        <?php if (has_slot('addresstop')): ?>
          <?php include_slot('addresstop') ?>
        <?php endif; ?>

        <div class="logonav_container">

          <!-- topnav -->
          <div class="topnav_container">
            <div class="topnav_container_params" style="margin-top:8px;">
              <!-- order reversed by float right -->
              <a href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" class="nav_item_end">ESPA&Ntilde;OL</a>
              <a href="<?php echo url_for("contact/index")?>" class="nav_item">CONTACT</a>
              <a href="<?php echo url_for("features/index")?>" class="nav_item">AMENITIES</a>
              <a href="<?php echo url_for("photos/index")?>" class="nav_item">GALLERY</a>
              <a href="<?php echo url_for("floorplans/index")?>" class="nav_item">FLOORPLANS</a>
            </div>
            <?php if (has_slot('nav')): ?>
              <?php include_slot('nav') ?>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
    <!-- Header:end -->


    <!-- Rotator:start -->
    <div class="rotator_container">
      <div class="rotator_params">
        <!-- rotator -->
        <div class="rotator_left">

            <!-- nivoSlider:start -->
            <div class="slider-wrapper">
            <?php if (has_slot('slider')): ?>
              <?php include_slot('slider') ?>
            <?php endif; ?>
            </div>

            <div id="htmlcaption" class="nivo-html-caption">
            <strong>This</strong> is an example of a <em>HTML</em> caption with <a href=
            "google.com">a link</a>.
            </div>
            <!-- nivoSlider:end -->

        </div>

        <!-- side nav -->
        <div class="sidenav_container">
          <?php if (has_slot('ebrochure')): ?>
            <?php include_slot('ebrochure') ?>
          <?php endif; ?>
          <a href="<?php echo url_for('contact/index')?>" class="sidenav_item_visit"></a>
          <a href="<?php echo url_for('community/index')?>" class="sidenav_item_neighborhood"></a>
          <a href="#" id="opener" class="sidenav_item_pet"></a>
        </div>
      </div>
    </div>
    <!-- Rotator:end -->

    <?php echo $sf_content ?>



    <!-- Footer:start -->
    <div class="footer_container ">
      <div class="footer_container_params">

        <!-- floor left:start -->
        <div class="footer_left">
          <div class="footer_left_logo">
            <?php if (has_slot('logofoot')): ?>
              <?php include_slot('logofoot') ?>
            <?php endif; ?>
          </div>
          <?php if (has_slot('addressfoot')): ?>
            <?php include_slot('addressfoot') ?>
          <?php endif; ?>



          <!--div class="footer_left_privacy">
            <a href="<?php echo url_for('terms-of-use/index')?>" class="footerlink">Terms of Use</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="<?php echo url_for('privacy-policy/index')?>" class="footerlink">Privacy Policy</a>
          </div-->
        </div>
        <!-- floor left:end -->

        <!-- floor Middle:start -->
        <div class="footer_middle">
          <div class="footer_middle_title">
            Menu
          </div>
          <div class="footer_middle_links">
            <a href="<?php echo url_for("floorplans/index")?>" class="footerlink">Floorplans</a><br />
            <a href="<?php echo url_for("photos/index")?>" class="footerlink">Gallery</a><br />
            <a href="<?php echo url_for("features/index")?>" class="footerlink">Amenities</a><br />
            <a href="<?php echo url_for("community/index")?>" class="footerlink">The Neighborhood</a><br />
            <?php if (has_slot('bot-nav')): ?>
              <?php include_slot('bot-nav') ?>
            <?php endif; ?>

            </div>
            <?php if (has_slot('social')): ?>
            <?php include_slot('social') ?>
          <?php endif; ?>

          <?php if (has_slot('bot-code')): ?>
            <?php include_slot('bot-code') ?>
          <?php endif; ?>
          </div>


        </div>
        <!-- floor Middle:end -->

        <!-- floor Right:start -->
        <div class="footer_right">
        <div class="footer_right_title">
            Resident Center
          </div>
          <form name="tmplogin" action="<?php echo url_for('residents/login')?>" method="post">
          <div class="footer_right_login">
            <input name="login[email]" type="text" class="footer_username" value="Username" size="25" maxlength="30" onclick="this.value='';" />
            <input name="login[password]" type="text" class="footer_password" value="Password" size="25" maxlength="30" onclick="this.value=''; this.type='password';" />
          </div>

          <div class="footer_right_signin">
            <div class="footer_right_signin_params"><a href="#" onclick="document.tmplogin.submit();"><img src="/images/jsp/btn_sign_in.gif" /></a></div>
          </div>
          </form>



          <!--div class="footer_right_title">
            Resident Portal
          </div>

          <div class="footer_right_login">
            <input name="username" type="text" class="footer_username" value="Username" size="25" maxlength="30" />
            <input name="password" type="text" class="footer_password" value="Password" size="25" maxlength="30" />
          </div>

          <div class="footer_right_signin">
            <div class="footer_right_signin_params"><a href="#"><img src="/images/jsp/btn_sign_in.gif" /></a></div>
          </div-->

        <div style="clear:both;padding-top:10px;"><a href="<?php echo url_for('residents/forgotpassword')?>">Username/Password Help</a></div>
        </div>

        <!-- floor Right:end -->

      </div>
      <div class="footer_container ">
        <div class="footer_left_privacy">
          <a href="<?php echo url_for('terms-of-use/index')?>" class="footerlink">Terms of Use</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="<?php echo url_for('privacy-policy/index')?>" class="footerlink">Privacy Policy</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" class="footerlink">Español</a>

        </div>
        <div style="float:right; margin:0 100px 0 0 !important;"><img src="/images/jsp/equal.png" /></div>
      </div>
    </div>

    <!-- Footer:end -->

  </div>

</body>
</html>
