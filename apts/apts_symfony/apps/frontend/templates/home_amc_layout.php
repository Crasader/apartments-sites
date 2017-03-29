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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <?php /*<body>
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
<body>
<div id="primaryContainer" class="primaryContainer clearfix">
  <div id="contcontainer" class="clearfix">
    <div id="mainimg" class="clearfix">

 <!-- ------ Login Box ----------->


  <?php if (has_slot('loginbox')): ?>
    <?php include_slot('loginbox') ?>
  <?php endif; ?>

 <!-- ------ End of Login Box ----------->
  <?php echo $sf_content ?>


  <div id="headerwrap" class="clearfix">
    <!--?php include 'header.php'; ?-->
    <div id="header" class="clearfix">
    <div id="hdrcontain" class="clearfix">
        <div id="logocontain" class="clearfix">
        <?php if (has_slot('logo')): ?>
          <?php include_slot('logo') ?>
        <?php endif; ?>
        </div>
        <div id="topbar" class="clearfix">
        <a href="<?php echo url_for('floorplans/index')?>">Availability</a>
        &nbsp;&nbsp;&nbsp;<a class="popup" href="<?php echo url_for('/contact/min/index')?>">Schedule a Tour</a> <!--class="fancybox fancybox.iframe"-->
        &nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('floorplans/index')?>">Floor Plans</a>
        
        <?php if (has_slot('rescenterlink')): ?>
          <?php include_slot('rescenterlink') ?>
        <?php endif; ?>
        </div>

        <div id="nav" class="clearfix">|&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('photos/index')?>">Gallery</a>&nbsp;&nbsp;&nbsp;|
        &nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('features/index')?>">Amenities</a>&nbsp;&nbsp;&nbsp;|
        &nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('community/index')?>">Neighborhood</a>&nbsp;&nbsp;&nbsp;|
        &nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('contact/index')?>">Contact</a>&nbsp;&nbsp;&nbsp;|
        <?php if (has_slot('ourpage')): ?>
        <?php include_slot('ourpage') ?>
        <?php endif; ?>
        <?php if (has_slot('rentalapp')): ?>
        <?php include_slot('rentalapp') ?>
        <?php endif; ?>
        </div>
        <div id="homelink" class="clearfix"><a href="<?php echo url_for('default/index')?>" data-icon="f"></a>
        </div>
        <div id="hamburger" class="hamburger">
        <a href="javascript:void(0)" data-icon="i" id="burgerclicker"></a>
        </div>
    </div>
    </div>

    <div id="mobilenav">
    <a href="<?php echo url_for('default/index')?>">Home</a><br />
    <a href="<?php echo url_for('floorplans/index')?>">Availability</a><br />
    <a class="popup" href="<?php echo url_for('/contact/min/index')?>">Schedule a Tour</a><br /> <!--class="fancybox fancybox.iframe"-->
    <a href="<?php echo url_for('floorplans/index')?>">Floorplans</a><br />
    <a href="<?php echo url_for('photos/index')?>">Gallery</a><br />
    <a href="<?php echo url_for('features/index')?>">Amenities</a><br />
    <a href="<?php echo url_for('community/index')?>">Neighborhood</a><br />
    <a href="<?php echo url_for('contact/index')?>">Contact</a><br />
    <?php if (has_slot('ourpagem')): ?>
        <?php include_slot('ourpagem') ?>
        <?php endif; ?>
    <?php if (has_slot('rentalappm')): ?>
          <?php include_slot('rentalappm') ?>
        <?php endif; ?>
    <?php if (has_slot('rescenterlinkm')): ?>
          <?php include_slot('rescenterlinkm') ?>
        <?php endif; ?>
    </div>

    <!-- -->
    <div id="shadow1" class="clearfix"> </div>
    <div id="shadow2" class="clearfix"> </div>
  </div>
  <!--?php include 'footer.php'; ?-->
  <div id="footershad"> </div>
  <div id="footershad1"> </div>

  <!-- smaller version for mobile --->
  <div id="text4">
    <span id="textspan1">
      <a href="<?php echo url_for('privacypolicy/index')?>">Privacy Policy</a> &nbsp; |
      &nbsp; <a href="<?php echo url_for('termsofuse/index')?>">Terms of Use</a> &nbsp; |
      &nbsp; <a href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">Translate</a>
      <br />
      <br />
       <?php if (has_slot('bot-nav')): ?>
       <?php include_slot('bot-nav') ?>
       <?php endif; ?>
       <?php if (has_slot('bot-navCA')): ?>
       <?php include_slot('bot-navCA') ?>
       <?php endif; ?>
    </span>
    <br />
    <br />
    <div id="eoh"><img src="/images/resp/eho.svg" /></div>
  </div>

  <!-- bigger version for tablet and desktop -->

  <div id="footer">
    <a href="<?php echo url_for('privacypolicy/index')?>">Privacy Policy</a> &nbsp; | &nbsp; <a href="<?php echo url_for('termsofuse/index')?>">Terms of Use</a> &nbsp; | &nbsp; <a href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">Translate</a> &nbsp; | &nbsp;  <?php if (has_slot('bot-nav')): ?>
       <?php include_slot('bot-nav') ?>
       <?php endif; ?>
       <?php if (has_slot('bot-navCA')): ?>
       <?php include_slot('bot-navCA') ?>
       <?php endif; ?>
    <div id="eoh"><img src="/images/resp/eho.svg" /></div>
  </div>

</div>
<?php if (has_slot('bot-code')): ?>
  <?php include_slot('bot-code') ?>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("a.popup").fancybox({
            'fitToView'         : true,
            'transitionIn'      : 'none',
            'transitionOut'     : 'none',
            'type'              : 'iframe'
        });
    });
</script>
</body>
</html>
