<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <link rel="shortcut icon" href="/favicon.ico" />


    <?php if (has_slot('tracking-code')): ?>
      <?php include_slot('tracking-code') ?>
    <?php endif; ?>

    <?php if (has_slot('3dtour-nav')): ?>
      <script>
      <?php include_slot('3dtour-nav') ?>
      </script>
    <?php endif; ?>
  <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
  </head>
<body>
<!-- main container -->
  <div class="master_container">

    <!-- topnav -->
    <div class="topnav_container">
      <div class="topnav_inner">
        <div class="topnav_params">
          <div class="topnav_logo">
            <!--a href="index.php"><img src="images/logo.png" /></a-->
            <?php if (has_slot('logo')): ?>
              <?php include_slot('logo') ?>
            <?php endif; ?>
          </div>

          <div class="topnav_right">
            <ul class="topnav">
            <?php if (has_slot('rentalapp')): ?>
              <?php include_slot('rentalapp') ?>
            <?php endif; ?>
            <?php if (has_slot('ourpage')): ?>
              <?php include_slot('ourpage') ?>
            <?php endif; ?>
            <?php if (has_slot('nav')): ?>
              <?php include_slot('nav') ?>
            <?php endif; ?>
            </ul>

            <button class="menu-btn" style="background:url('/images/cornerstone/hamburger.png') no-repeat;"></button>
      <div class="responsive-menu">
          <ul>
          <?php if (has_slot('rentalapp')): ?>
            <?php include_slot('rentalapp') ?>
          <?php endif; ?>
          <?php if (has_slot('ourpage')): ?>
            <?php include_slot('ourpage') ?>
          <?php endif; ?>
          <?php if (has_slot('nav')): ?>
            <?php include_slot('nav') ?>
          <?php endif; ?>
          </ul>
       </div>

          </div>

          <div class="clearall"></div>
        </div>
      </div>
    </div>
    <!-- topnav -->
  <?php echo $sf_content ?>
  <div class="clearall"></div>
         </div>
      </div>
    </div>
    <!-- home/sec content:end -->




    <!-- main footer -->
    <div class=" footer_container">
      <div class="footer_container_inner">
        <div class="footer_container_params">
          <div class="footer_container_pad">

            <div class="footer_nav">
              <div class="footer_nav_left">&copy; <?php echo date('Y');?> Cornerstone Residential. All Rights Reserved.</div>
              <div class="footer_nav_right">
              <?php if (has_slot('footer-nav')): ?>
                <?php include_slot('footer-nav') ?>
              <?php endif; ?>
              </div>
            </div>

            <div class="footer_bottom">
              <div class="footer_logo">
                <img src="/images/cornerstone/logo-footer-cornerstone.png" />
              </div>
              <div class="footer_address">
              <?php if (has_slot('footer-address')): ?>
                <?php include_slot('footer-address') ?>
              <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- main footer:end -->

  </div>
  <!-- main container:end -->
</body>
</html>
