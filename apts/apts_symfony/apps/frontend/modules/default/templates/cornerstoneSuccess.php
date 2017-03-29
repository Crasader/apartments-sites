<!-- home main banner -->
    <div class="home_banner_container">
      <div class="home_banner_bg" >


              <!-- scroll nav -->
              <!--div style="position:absolute; top:60px; left:30px"><img src="images/navarrow_left.png" /></div>
              <div style="position:absolute; top:60px; right:30px"><img src="images/navarrow_right.png" /></div-->
              <!-- scroll nav:end -->
        <div class="banner_home_wide_outter">
          <div class="banner_home_wide_inner cycle-slideshow" data-cycle-slides="div" data-cycle-fx="scrollHorz">
            <div class="banner_home_wide_slide" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_main_photo1.jpg') no-repeat top center !important; background-size:cover !important;"></div>
            <div class="banner_home_wide_slide" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_main_photo2.jpg') no-repeat top center !important; background-size:cover !important;"></div>
            <div class="banner_home_wide_slide" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_main_photo3.jpg') no-repeat top center !important; background-size:cover !important;"></div>
          </div>
        </div>

              <?php /*
              <div class="home_banner_entry">
                  <div class="home_banner_entry_params">
                    <?php echo nl2br($propertyTemplate->getWelcome()); ?>
                  </div>
              </div>
              */?>


      </div>
    </div>
    <!-- home main banner:end -->

    <!-- home content -->
    <div class="content_container">
      <div class="content_container_bg_home" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_sub_bg.jpg') #ffffff center 110% no-repeat; background-size: 100% 35%;">
        <div class="content_redbar "></div>
        <div class="content_inner ">

              <div class="content_description">
              <h1><?php echo nl2br($propertyTemplate->getWelcome()); ?></h1>
                <?php echo nl2br($propertyTemplate->getDescription()); ?>
              </div>

          <div class="home_feature_container">
            <div class="home_feature_container_params">

            <a class="home_feature" href="<?php echo url_for("floorplans/index");?>">
              <div class="home_feature_params">
                  <div class="home_feature_icon"><img src="/images/cornerstone/largeicon_floorplans.png" /></div>
                  <div class="home_feature_title">Floorplans</div>
                  <div class="home_feature_text"><?php echo nl2br($propertyTemplate->getAcaciaHome1Desc()); ?></div>
                  <div class="home_feature_learnmore"><img src="/images/cornerstone/circle_learn_more.png" /></div>
              </div>
            </a>

            <a class="home_feature" href="<?php echo url_for("features/index")?>">
              <div class="home_feature_params">
                  <div class="home_feature_icon"><img src="/images/cornerstone/largeicons_amenities.png" /></div>
                  <div class="home_feature_title">amenities</div>
                  <div class="home_feature_text"><?php echo nl2br($propertyTemplate->getAcaciaHome2Desc()); ?></div>
                  <div class="home_feature_learnmore"><img src="/images/cornerstone/circle_learn_more.png" /></div>
              </div>
            </a>

            <a class="home_feature" href="<?php echo url_for("community/index");?>">
              <div class="home_feature_params">
                  <div class="home_feature_icon"><img src="/images/cornerstone/largeicon_community.png" /></div>
                  <div class="home_feature_title">Community</div>
                  <div class="home_feature_text"><?php echo nl2br($propertyTemplate->getAcaciaHome3Desc()); ?></div>
                  <div class="home_feature_learnmore"><img src="/images/cornerstone/circle_learn_more.png" /></div>
              </div>
            </a>

            </div>
          </div>


<?php slot('3dtour-nav') ?>
<?php if($propertyTemplate->getSrc3dtour()):?>
  var nav3dtour = true;
<?php else:?>
  var nav3dtour = false;
<?php endif;?>
<?php end_slot() ?>

<?php slot('map') ?>
<iframe src="<?php echo $propertyTemplate->getMapFrameSrc();?>" width="100%" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>
<?php end_slot() ?>

<?php slot('map-contact') ?>
<div><?php echo $property->getPhone()?></div>
<div style="padding-top:10px;"><a href="<?php echo url_for('contact/form')?>">Schedule a Tour</a></div>
<?php end_slot() ?>

<?php slot('chat') ?>
  <?php if($propertyTemplate->getChat()):?>
    <div id="bold-chat-holder"><div id="bold-chat"><?php echo $propertyTemplate->getChat();?></div></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <?php /*<a href="<?php echo url_for('default/index')?>"><img id="logo" src="/images/resp/logo.png" class="image" /></a>*/?>
    <a href="<?php echo url_for('default/index')?>"><img id="logo" class="image" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" title="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" alt="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" border="0" /></a>
  <?php else:?>
    <a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('home-img') ?>
  <?php if($propertyTemplate->getHomeFlash()):?>
  <script type="text/javascript" src="/js/swfobject.js"></script>
  <script type="text/javascript">
    var flashvars = {};
    var params = {};
    params.quality = "high";
    params.scale = "noscale";
    params.wmode = "transparent";
    params.allowscriptaccess = "sameDomain";
    var attributes = {};
    swfobject.embedSWF("/uploads/properties/<?php echo $propertyTemplate->getHomeFlash()?>", "home-img", "950", "544", "9.0.0", false, flashvars, params, attributes);
  </script>
   <div id="home-img">
        <span><strong>Adobe Flash Player</strong> is required on this homepage. Please use the link below to download the latest version.<br /></span>
    <a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" border="0" /></a><br />
  </div>
  <?php elseif($propertyTemplate->getHomeImage()):?>
    <div id="home-img"><img src="/uploads/properties/<?php echo $propertyTemplate->getHomeImage()?>" alt="Apartments <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>" /></div>
  <?php else:?>
    <div id="home-img"><img src="/images/home-img.jpg" alt="Apartments <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>" /></div>
  <?php endif;?>
<?php end_slot() ?>


<?php slot('nav') ?>
<li><a title="<?php echo $property->getCity()?> Apartments For Rent - Contact" href="<?php echo url_for('contact/index')?>">CONTACT</a></li>
<li><a title="<?php echo $property->getCity()?> Apartments For Rent - Community" href="<?php echo url_for('community/index')?>">COMMUNITY</a></li>
<li><a title="<?php echo $property->getCity()?> Apartments For Rent - Gallery" href="<?php echo url_for('photos/index')?>">GALLERY</a></li>
<li><a title="<?php echo $property->getCity()?> Apartments For Rent - Floorplans" href="<?php echo url_for('floorplans/index')?>">FLOORPLANS</a></li>
<li><a title="<?php echo $property->getCity()?> Apartments For Rent - Amenities" href="<?php echo url_for('features/index')?>">AMENITIES</a></li>

<?php end_slot() ?>

<?php slot('rentalapp') ?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
<li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">ONLINE APPLICATION</a></li>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
<li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">RENTAL APPLICATION</a></li>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('rentalappm') ?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">ONLINE APPLICATION</a>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">RENTAL APPLICATION</a>
<?php endif;?>
<?php end_slot() ?>

<?php slot('ourpage') ?>
<?php if(trim($propertyTemplate->getCustomPageName()) != ''):?>
<li><a title="<?php echo $propertyTemplate->getCustomPageName()?>" href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></li>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('ourpagem') ?>
<?php if(trim($propertyTemplate->getCustomPageName()) != ''):?>
    <a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a><br />
  <?php endif;?>
<?php end_slot() ?>

<?php slot('footer-nav') ?>
<a href="<?php echo url_for('floorplans/index')?>">floorplans</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="<?php echo url_for('photos/index')?>">gallery</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="<?php echo url_for('features/index')?>">amenities</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="<?php echo url_for('community/index')?>">community</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="<?php echo url_for('contact/index')?>">contact</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="<?php echo url_for('privacypolicy/index')?>">privacy policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href="<?php echo url_for('termsofuse/index')?>">terms of use</a>
<?php end_slot() ?>

<?php slot('footer-address') ?>
  <?php echo $property->getAddress()?><br />
  <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?><br />
  <?php echo $property->getPhone()?>
<?php end_slot() ?>

<?php slot('bot-navCA') ?>
<?php if($property->getState()->getCode() == 'CA'): ?>
       <br />
       <br />
  <p>AMC-CA, Inc. dba Apartment Management Consultants- BRE #1525033</p>
<?php endif;?>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
      <?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>