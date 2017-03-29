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

        <div class="content_map_container">

            <div class="content_map_top" style="background:url('/images/cornerstone/bg-grunge.png') left top no-repeat #852109;">

              <div class="content_map_top_left">
                <div class="content_map_top_left_params">
                  <div class="content_map_top_left_text">
                    CONTACT US
                  </div>
                </div>
              </div>

              <div class="content_map_top_right">
                <div class="content_map_top_right_params">
                  <div class="content_map_top_right_text">
                    <?php /*1.800.555.5555<br />
                    info@the coveatoverlake.com*/?>
                    <?php if (has_slot('map-contact')): ?>
                      <?php include_slot('map-contact') ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

            </div>

            <div class="content_map_gmap">
              <?php /*<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3030.980865493608!2d-112.30305399999996!3d40.5640998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8752bc3b4dab6e87%3A0x24ad4e08ba6472a1!2s1837+Berra+Blvd%2C+Tooele%2C+UT+84074!5e0!3m2!1sen!2sus!4v1440556379188" width="100%" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>*/?>
              <?php if (has_slot('map')): ?>
                <?php include_slot('map') ?>
              <?php endif; ?>
            </div>

        </div>

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
