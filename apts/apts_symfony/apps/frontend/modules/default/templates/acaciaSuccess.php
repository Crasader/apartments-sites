<!-- Content -->
<div id="dialog" title="Pet Guidelines">
<?php echo $property->getPetPolicy();?>
</div>
<div class="content_outter">
  <div class="content_inner">
    <div class="content_params">

      <div class="page_title_shell">
        <div style="width:260px;" class="page_title_params">
          <?php echo nl2br($propertyTemplate->getWelcome()); ?>
        </div>
      </div>

      <div class="content_description">
        <?php echo nl2br($propertyTemplate->getDescription()); ?>
      </div>

      <div class="divider_item"></div>

      <div class="homephotos">
        <div class="homephotos_left">
          <div class="homephotos_left_content">
          <span class="homephotos_left_title">PHOTO GALLERY</span><br /><br />
          <?php if($propertyTemplate->getHomePhotoDesc()):?>
            <?php echo nl2br($propertyTemplate->getHomePhotoDesc());?>
          <?php else:?>
            Designed with modern interiors and lush surroundings.
          <?php endif;?>
          </div>

          <div class="homephotos_description_link">
            <a href="<?php echo url_for("photos/index")?>" class="link_learnmore">
            <span class="homephotos_description_plus">+&nbsp;&nbsp;</span>VIEW MORE
            </a>
          </div>
        </div>
        <?php $photocnt = 0;
        foreach($acaciahomePhotos as $photo):
        //print_r($photo);
        $photocnt++;?>
        <?php if($photocnt == 1):?>
        <div class="homephotos_thumb_left">
          <div class="homephotos_thumb_photo">
            <a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" border="0" /></a>
          </div>
          <div class="homephotos_description"><?php echo $photo->getName()?></div>
        </div>
        <?php endif;?>
        <?php if($photocnt == 2):?>
        <div class="homephotos_thumb_middle">
          <div class="homephotos_thumb_photo">
            <a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" border="0" /></a>
          </div>
          <div class="homephotos_description"><?php echo $photo->getName()?></div>
        </div>
        <?php endif;?>
        <?php if($photocnt == 3):?>
        <div class="homephotos_thumb_right">
          <div class="homephotos_thumb_photo">
            <a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" border="0" /></a>
          </div>
          <div class="homephotos_description"><?php echo $photo->getName()?></div>
        </div>
        <?php endif;?>
        <?php endforeach;?>
      </div>

      <div class="divider_item"></div>

      <!-- homegroup -->
      <div class="homegroup">

        <!-- homegroup item: Features -->
        <div class="homegroup_item">
          <div class="homegroup_top">
            <div class="homegroup_top_inner">

              <div class="homegroup_top_icon">
                <img src="/images/acacia/icon_features.png" />
              </div>
              <div class="homegroup_top_item">
                FEATURES
              </div>

            </div>

          </div>

          <div class="homegroup_bottom">
            <div class="homegroup_bottom_text">
              <?php echo nl2br($propertyTemplate->getAcaciaHome1Desc()); ?>
            </div>
            <div class="homegroup_bottom_link">
              <a href="<?php echo url_for("features/index")?>" class="link_learnmore"><span class="homegroup_bottom_plus">+&nbsp;&nbsp;</span>LEARN MORE</a>
            </div>
          </div>

        </div>

        <!-- homegroup item: Floor Plans -->
        <div class="homegroup_item">
          <div class="homegroup_top">
            <div class="homegroup_top_inner">

              <div class="homegroup_top_icon">
                <img src="/images/acacia/icon_floorplans.png" />
              </div>
              <div class="homegroup_top_item">
                FLOOR PLANS
              </div>

            </div>

          </div>

          <div class="homegroup_bottom">
            <div class="homegroup_bottom_text">
              <?php echo nl2br($propertyTemplate->getAcaciaHome2Desc()); ?>
            </div>
            <div class="homegroup_bottom_link">
              <a href="<?php echo url_for("floorplans/index")?>" class="link_learnmore"><span class="homegroup_bottom_plus">+&nbsp;&nbsp;</span>LEARN MORE</a>
            </div>
          </div>

        </div>

        <!-- homegroup item: Community -->
        <div class="homegroup_item no_r_margin">
          <div class="homegroup_top">
            <div class="homegroup_top_inner">

              <div class="homegroup_top_icon">
                <img src="/images/acacia/icon_community.png" />
              </div>
              <div class="homegroup_top_item">
                COMMUNITY
              </div>

            </div>

          </div>

          <div class="homegroup_bottom">
            <div class="homegroup_bottom_text">
              <?php echo nl2br($propertyTemplate->getAcaciaHome3Desc()); ?>
            </div>
            <div class="homegroup_bottom_link">
              <a href="<?php echo url_for("community/index")?>" class="link_learnmore"><span class="homegroup_bottom_plus">+&nbsp;&nbsp;</span>LEARN MORE</a>
            </div>
          </div>

        </div>

      </div>
      <!-- end: homegroup -->


    </div>
  </div>
</div>
<?php slot('logo') ?>
<div class="logo_container">
  <div class="logo_params">
    <a href="<?php echo url_for("default/index")?>"><img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
  </div>
</div>
<?php end_slot() ?>

<?php slot('logo-grey') ?>
<div class="footer_logo">
  <img src="/images/acacia/<?php echo $property->getCode()?>/footerlogo.png" />
</div>
<?php end_slot() ?>

<?php slot('banner') ?>
<?php if(in_array($property->getCode(),array('423TVS'))):?>
<!-- Banner -->
<div class="banner_home_wide_outter">
  <div class="banner_home_wide_inner">
    <a href="http://eldercarealliance.org/library-details?ResourceID=3476" target="_blank"><div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_1.jpg') no-repeat center !important; background-size:cover !important;"></div></a>
  </div>
</div>
<?php else:?>
<!-- Banner -->
  <div class="banner_home_wide_outter">
  <div class="banner_home_wide_inner">
    <div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_1.jpg') no-repeat center !important; background-size:cover !important;"></div>
    <div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_2.jpg') no-repeat center !important; background-size:cover !important;"></div>
    <div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_3.jpg') no-repeat center !important; background-size:cover !important;"></div>
  </div>
</div>
<?php endif;?>
<?php /*
<div class="banner_home_outter">

  <div class="banner_rotator_inner">
    <div class="banner_rotator_container">
      <div class="banner_rotator_leftfade"></div>
      <div class="banner_rotator_cycle">
        <img src="/images/acacia/<?php echo $property->getCode()?>/home_banner_1.jpg" width="1024" height="257" />
        <img src="/images/acacia/<?php echo $property->getCode()?>/home_banner_2.jpg" width="1024" height="257" />
        <img src="/images/acacia/<?php echo $property->getCode()?>/home_banner_3.jpg" width="1024" height="257" />
      </div>
    </div>
  </div>
</div>*/?>
<?php end_slot() ?>

<?php slot('address') ?>
<div class="footer_info_left">
<strong>address</strong><br />
<?php echo $property->getAddress()?><br />
<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />

<strong>hours</strong><br />
<?php echo nl2br($property->getHours())?>
</div>
<div class="footer_info_right">
<strong>phone</strong><br />
<?php echo $property->getPhone()?><br /><br />
<strong>fax</strong><br />
<?php echo $property->getFax()?><br /><br />
<strong>email</strong><br />
<a href="<?php echo url_for('contact/min')?>"><?php echo $property->getEmail()?></a><br />
</div>
<?php if($property->getState()->getCode() == 'CA'): ?>
  <p>AMC-CA, Inc. dba Apartment Management Consultants- BRE #1525033</p>
<?php endif;?>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
  <?php if($propertyTemplate->getTrackingCode()):?>
    <?php echo $propertyTemplate->getTrackingCode()?>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('custom-page-nav') ?>
<div class="header_right_params" style="padding-top:3px;">
<a href="https://amcrentpay.com" target="_blank" class="nav_item">ONLINE RENT PAY</a>
<?php if($propertyTemplate->getCustomPageName() != ''):?>
  <a class="nav_item" href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a>
<?php endif;?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a class="nav_item" title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">RENTAL APPLICATION</a>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a class="nav_item" title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">RENTAL APPLICATION</a>
  <?php endif;?>
</div>
<?php end_slot() ?>
<?php slot('resp-custom-page-nav') ?>

<li><a href="https://amcrentpay.com" target="_blank">ONLINE RENT PAY</a></li>
<?php if($propertyTemplate->getCustomPageName() != ''):?>
  <li><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a></li>
<?php endif;?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">RENTAL APPLICATION</a></li>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">RENTAL APPLICATION</a></li>
  <?php endif;?>

<?php end_slot() ?>

<?php slot('social-bar') ?>
<!-- Social Bar -->
<div class="social_bar_outter">
  <div class="social_bar_inner">

    <div class="social_bar_params">
      <div class="social_bar_content">
      <?php if($propertyTemplate->getFacebookUrl() != ''):?>
      <?php foreach($arrSocialUrls as $keySocialURL=>$itemSocialURL):?>
        <a href="<?php echo $itemSocialURL?>" class="social_item" title="<?php echo $keySocialURL?>"><img src="/images/acacia/icon_<?php echo $keySocialURL?>.png" alt="<?php echo $keySocialURL?>"/></a>
      <?php endforeach;?>
      <?php endif;?>
      <?php /*
        <a href="#" class="social_item"><img src="/images/acacia/icon_twitter.png" alt=""/></a>
        <a href="#" class="social_item"><img src="/images/acacia/icon_vimeo.png" alt=""/></a>
        <a href="#" class="social_item"><img src="/images/acacia/icon_flickr.png" alt=""/></a>
        <a href="#" class="social_item"><img src="/images/acacia/icon_linkedin.png" alt=""/></a>
        <a href="#" class="social_item"><img src="/images/acacia/icon_youtube.png" alt=""/></a>
        <a href="#" class="social_item"><img src="/images/acacia/icon_google.png" alt=""/></a>
      <?php */?>
      </div>
    </div>

  </div>
</div>
<?php end_slot() ?>
<?php slot('petpolicy') ?>
<div style="float:right; margin:0 20px 0 0;"><img id="opener" src="/images/acacia/btn_pet_policy_acacia.png"  style="border:none !important; cursor:pointer; "/></div>
<?php end_slot() ?>
<?php /*
<div id="white-fill">
<div id="wrap-top">
  <div id="middle">


<div id="welcome">
  <div id="line-half1"></div>
  <div id="welcome-title"><?php echo nl2br($propertyTemplate->getWelcome()); ?></div>
  <div id="line-half2"></div>
  <div id="text-mid"><?php echo nl2br($propertyTemplate->getDescription()); ?></div>
  <div id="line-full"></div>
</div><!-- end of welcome -->
<div id="photos">
  <div id="photos-text"><br /><span class="photo-title">PHOTO GALLERY</span><br /><br />
  Designed with modern interiors and lush surroundings.<br /><br /><br />
  <img src="/images/acacia/green-plus.png" width="10" height="10" />&nbsp;&nbsp;&nbsp;<span class="font10">VIEW ALL  </span></div>
  <div id="photo2"><img src="/images/acacia/gallery-1.jpg" width="226" height="132" />
    <div id="photo-caption2">Fair Lake Front Lobby</div>
  </div>
  <div id="photo3"><img src="/images/acacia/gallery-2.jpg" width="226" height="132" />
  <div id="photo-caption3">Complex Athletic Center</div>
  </div>

  <div id="photo4"><img src="/images/acacia/gallery-3.jpg" width="226" height="132" />
  <div id="photo-caption4">Floor plan Kitchen</div>
  </div>

</div><!-- end of photos -->

<div id="additional">
  <div id="additional1">
  <div id="home-icon1"><img src="/images/acacia/features.png" width="29" height="30" /></div>
  <div id="photo-title1"><span class="photo-title">FEATURES</span></div>
  <div id="photo-dot-1"></div>
  <div id="photo-text1">
Dozens of features including a large pool and indoor gym for all of our residents.<br /><br />
<a href="<?php echo url_for('features/index')?>"><span class="green">+</span> &nbsp;&nbsp;<span class="font10">LEARN MORE</span></a></div></div>

  <div id="additional2"><div id="home-icon2"><img src="/images/acacia/floor-plan.png" width="38" height="25" /></div>
  <div id="photo-title2"><span class="photo-title">FLOOR PLANS</span></div>
  <div id="photo-dot-2"></div>
  <div id="photo-text2">
Check out our floorplans and the stunning designs that make <?php echo $property->getName()?> amazing. <br /><br />
<a href="<?php echo url_for('floorplan/index')?>"><span class="green">+</span> &nbsp;&nbsp;&nbsp;<span class="font10">LEARN MORE</span></a></div></div>

  <div id="additional3">
  <div id="home-icon3"><img src="/images/acacia/community.png" width="26" height="23" /></div>
  <div id="photo-title3"><span class="photo-title">COMMUNITY</span></div>
  <div id="photo-dot-3"></div>
  <div id="photo-text3">
The community of <?php echo $property->getName()?> is committed to building an environment that is strong.<br /><br />
<a href="<?php echo url_for('community/index')?>"><span class="green">+ </span>&nbsp;&nbsp;&nbsp;<span class="font10">LEARN MORE</span></a></div>

  </div><!-- end of additional3 -->
</div>
<!-- end of additional -->
  </div><!-- end of middele -->
  </div>
  </div>

<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo-head"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('logo-grey') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo-grey"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('address') ?>
<div id="addres-hours"><span class="footer-title1">address</span><br />
<?php echo $property->getAddress()?><br /><br />
<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />
<span class="footer-title1">hours</span><br />
<?php echo nl2br($property->getHours())?>
</div>
<div id="phone-fax-email">
<span class="footer-title1">phone </span><br />
<?php echo $property->getPhone()?><br /><br />
<span class="footer-title1">fax</span><br />
<?php echo $property->getFax()?><br /><br />
<span class="footer-title1">email</span><br />
<?php echo $property->getEmail()?><br />
</div>
<?php end_slot() ?>





<?php /*
<div id="home-content">
  <div id="home-left">
    <h1 class="title"><?php echo nl2br($propertyTemplate->getWelcome()); ?></h1>
      <?php echo nl2br($propertyTemplate->getDescription()); ?><br />
      <br />
      <div style="padding:5px; float:left;">
      <strong><?php echo $property->getName()?></strong><br />
      <?php echo $property->getAddress()?><br />
      <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
      <?php if($property->getPhone()):?>
      <strong>Phone: </strong><?php echo $property->getPhone()?><br />
      <?php endif;?>
      <?php if($property->getFax()):?>
      <strong>Fax: </strong> <?php echo $property->getFax()?><br />
      <?php endif;?>
      <?php if($property->getEmail()):?>
      <a href="<?php echo url_for('contact/index')?>" alt="<?php echo $property->getEmail()?>"><img style="padding-top: 10px; border: none;" src="/images/acacia/btn_email.png" border="0"></a>
      <?php endif;?>
    </div>
    <?php if($propertyTemplate->getFacebookUrl() != ''):?>
    <div style="padding:5px; float:right">
    <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $propertyTemplate->getFacebookUrl()?>&amp;width=232&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=true&amp;height=200" scrolling="auto" frameborder="0" style="border:none; overflow:hidden; width:232px; height:200px;" allowTransparency="true"></iframe>
    </div>
    <?php endif;?>
  </div>
  <div id="right">
    <div class="right-title">
      <div class="right-title-txt">Announcements</div>
    </div>
    <div class="right-txt">
      <!-- AddThis Button BEGIN --><div class="addthis_toolbox addthis_default_style "><a class="addthis_button_preferred_1"></a><a class="addthis_button_preferred_2"></a><a class="addthis_button_preferred_3"></a><a class="addthis_button_preferred_4"></a><a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a></div><script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dc4326b35cba14f"></script><!-- AddThis Button END -->
      <br />
      <?php echo nl2br($propertyTemplate->getAnnouncements()); ?>
      <br />
      <br />
      <strong><?php echo $property->getName()?> Apartments</strong><br />
      <?php echo $property->getAddress()?><br />
      <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
      <?php if($property->getPhone()):?>
      <strong>Phone: </strong><?php echo $property->getPhone()?><br />
      <?php endif;?>
      <?php if($property->getFax()):?>
      <strong>Fax: </strong> <?php echo $property->getFax()?><br />
      <?php endif;?>
      <?php if($property->getEmail()):?>
      <a href="<?php echo url_for('contact/index')?>" alt="<?php echo $property->getEmail()?>"><img style="padding-top: 10px; border: none;" src="/images/acacia/btn_email.png" border="0"></a>
      <?php endif;?>
      <br />
      <strong>Office Hours</strong><br />
      <?php echo nl2br($property->getHours())?>
      <br />
      <br />
      <strong>Apartment Features</strong><br />
      <?php
          $fcount = 0;
          foreach($property->getPropertyApartmentFeatures() as $feature):
          $fcount++;
      ?>
          &nbsp;-<?php echo $feature->getApartmentFeature()->getName()?><br />
      <?php
          if($fcount >= 2) break;
          endforeach;?>
      <br />
      <strong>Community Features</strong><br />
      <?php
          $ccount = 0;
          foreach($property->getPropertyCommunityFeatures() as $feature):
          $ccount++;
      ?>
          &nbsp;-<?php echo $feature->getCommunityFeature()->getName()?><br />
      <?php
          if($ccount >= 2) break;
          endforeach;?>
      <br />
      <strong>Other Services And Features</strong><br />
      <?php
          $ocount = 0;
          foreach($property->getPropertyOtherFeatures() as $feature):
          $ocount++;
      ?>
          &nbsp;-<?php echo $feature->getOtherFeature()->getName()?><br />
      <?php
          if($ocount >= 2) break;
          endforeach;?>
      <br />
      <?php foreach($communityPhotos as $photo):?>
        <img src="/uploads/photos/177/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" border="0" alt="Apartments <?php echo $property->getCity()?>" title="Apartments <?php echo $property->getCity()?>" />
      <?php break;
            endforeach;?>
      <br />
      <strong><u><?php echo $property->getCity()?> Apartment Community</u></strong>
    </div>
    <?php /*if($propertyTemplate->getFacebookUrl() != ''):?>
    <div style="padding:5px">
    <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $propertyTemplate->getFacebookUrl()?>&amp;width=232&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=true&amp;height=200" scrolling="auto" frameborder="0" style="border:none; overflow:hidden; width:232px; height:200px;" allowTransparency="true"></iframe>
    </div>
    <?php endif;?>
  </div>
</div>

<?php slot('customstyles') ?>
<?php include_partial('global/customstyles', array('propertyTemplate' => $propertyTemplate)) ?>
<?php end_slot() ?>

<?php slot('chat') ?>
  <?php if($propertyTemplate->getChat()):?>
    <div id="bold-chat-holder"><div id="bold-chat"><?php echo $propertyTemplate->getChat();?></div></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" title="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" alt="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
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
    <a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/acacia/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" border="0" /></a><br />
  </div>
  <?php elseif($propertyTemplate->getHomeImage()):?>
    <div id="home-img"><img src="/uploads/properties/<?php echo $propertyTemplate->getHomeImage()?>" alt="Apartments <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>" /></div>
  <?php else:?>
    <div id="home-img"><img src="/images/acacia/home-img.jpg" alt="Apartments <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>" /></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('nav') ?>
<div id="nav">
  <div class="nav-item">Home</div>
  <div class="nav-item"><a title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans" href="<?php echo url_for('floorplans/index')?>">Floor Plans</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos"href="<?php echo url_for('photos/index')?>">Photos</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartment Complex - Features" href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item"><a title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community" href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Rentals - Contact Us" href="<?php echo url_for('contact/index')?>">Contact Us</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<?php end_slot() ?>
<?php slot('bot-nav') ?>
<div style="text-align: center; padding: 0px 0px 15px 0px; color: white; font-size:10px;">
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?></div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
      <?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
*/?>
