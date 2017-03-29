<!-- Content:start -->
<div class="content_container">
  <div class="content_container_params">
    <div class="content_container_margins">
      <!-- text: start -->
      <div class="content_intro_text">
        <div class="content_intro_title"><?php echo nl2br($propertyTemplate->getWelcome()); ?></div>
      </div>
      <div class="content_intro_desc">
        <?php echo nl2br($propertyTemplate->getDescription()); ?>
      </div>
      <!-- text: end -->

      <!-- feature boxes: start -->
      <div class="home_feature_container">

        <!-- feature: start -->
        <div class="home_feature">
          <div class="home_feature_top"></div>
          <div class="home_feature_repy">
            <div class="home_feature_params">
              <div class="homefeature_photo_shell">
                <div class="homefeature_icon">
                  <img src="/images/jsp/jsp_homeicon_floorplan.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
                </div>
                <img src="/uploads/photos/258/<?php echo $arrhomePhotos[0];?>" class="homefeature_photo" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
              </div>
              <div class="homefeature_title">
                FLOORPLANS
              </div>
              <!--div class="homefeature_subtitle">
                 Lorem ipsum et nunca
              </div-->
              <div class="homefeature_desc">
                 <?php echo nl2br($propertyTemplate->getAcaciaHome1Desc()); ?>
              </div>
              <div class="homefeature_link">
                <a href="<?php echo url_for("floorplans/index")?>" class="homefeature_link_a">View More +</a>
              </div>
            </div>
          </div>
          <div class="home_feature_bottom"></div>
        </div>
        <!-- feature: end -->

        <!-- feature: start -->
        <div class="home_feature">
          <div class="home_feature_top"></div>
          <div class="home_feature_repy">
            <div class="home_feature_params">
              <div class="homefeature_photo_shell">
                <div class="homefeature_icon">
                  <img src="/images/jsp/jsp_homeicon_photos.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
                </div>
                <img src="/uploads/photos/258/<?php echo $arrhomePhotos[1];?>" class="homefeature_photo" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
              </div>
              <div class="homefeature_title">
                PHOTOS
              </div>
              <!--div class="homefeature_subtitle">
                 Lorem ipsum et nunca
              </div-->
              <div class="homefeature_desc">
                 <?php echo nl2br($propertyTemplate->getAcaciaHome2Desc()); ?>
              </div>
              <div class="homefeature_link">
                <a href="<?php echo url_for("photos/index")?>" class="homefeature_link_a">View More +</a>
              </div>
            </div>
          </div>
          <div class="home_feature_bottom"></div>
        </div>
        <!-- feature: end -->

        <!-- feature: start -->
        <div class="home_feature no_feature_margin">
          <div class="home_feature_top"></div>
          <div class="home_feature_repy">
            <div class="home_feature_params">
              <div class="homefeature_photo_shell">
                <div class="homefeature_icon">
                  <img src="/images/jsp/jsp_homeicon_amenities.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
                </div>
                <img src="/uploads/photos/258/<?php echo $arrhomePhotos[2];?>" class="homefeature_photo" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
              </div>
              <div class="homefeature_title">
                AMENITIES
              </div>
              <!--div class="homefeature_subtitle">
                 Lorem ipsum et nunca
              </div-->
              <div class="homefeature_desc">
                 <?php echo nl2br($propertyTemplate->getAcaciaHome3Desc()); ?>
              </div>
              <div class="homefeature_link">
                <a href="<?php echo url_for("features/index")?>" class="homefeature_link_a">View More +</a>
              </div>
            </div>
          </div>
          <div class="home_feature_bottom"></div>
        </div>
        <!-- feature: end -->

      </div>
      <!-- feature boxes: start -->
    </div>
  </div>
</div>

<div id="dialog" title="Pet Guidelines">
  <?php echo $property->getPetPolicy();?>
</div>
<!-- Content:end -->
<?php slot('ebrochure') ?>
<?php if($propertyTemplate->getEBrochure() != ''):?>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getEBrochure();?>" target="_blank" class="sidenav_special">
  <?php else:?>
    <a href="<?php echo url_for('ebrochure/index')?>" target="_blank" class="sidenav_special">
  <?php endif;?>
  <div class="special_container">
    <div class="special_t1">e-brochure</div>
    <hr class="special_hr">
    <div class="special_t2"></div>
    <div class="special_t3">Download our e-brochure</div>
  </div>
</a>
<?php end_slot() ?>
<?php slot('slider') ?>
<div id="slider" class="nivoSlider theme-default">
  <img src="/images/jsp/<?php echo $property->getCode()?>/slide1.jpg" alt="" title="Welcome Home." alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
  <img src="/images/jsp/<?php echo $property->getCode()?>/slide2.jpg" alt="" title="Comfort & Style." alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
  <img src="/images/jsp/<?php echo $property->getCode()?>/slide3.jpg" alt="" title="Stay Awhile." alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
  <?php /*
  <div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_1.jpg') no-repeat center !important;"></div>
  <div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_2.jpg') no-repeat center !important;"></div>
  <div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_3.jpg') no-repeat center !important;"></div>
  */?>
</div>
<?php end_slot() ?>

<?php slot('addresstop') ?>
<div class="header_bluebanner">
  <div class="header_bluebanner_params">
  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> | <strong><?php echo $property->getPhone()?></strong>
  </div>
</div>
<?php end_slot() ?>
<?php slot('addressfoot') ?>
<div class="footer_left_info">
  <?php echo $property->getAddress()?><br />
  <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
  <span class="footer_left_info_blue"><?php echo $property->getPhone()?></span>
  <a href="<?php echo url_for('contact/index')?>" class="footerlink"><?php echo $property->getEmail()?></a><br />
  Office Hours:<br /><?php echo nl2br($property->getHours())?>
</div>
<?php end_slot() ?>
<?php slot('logo') ?>
<div class="logos_container">
  <div class="logos_logo"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/<?php echo $property->getCode()?>/logo_top.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" /></a></div>
  <!--div class="logos_location"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/jsp_logo_top_sandy.png" /></a></div-->
</div>
<?php end_slot() ?>
<?php slot('logofoot') ?>
<?php echo $property->getName()?>
<?php end_slot() ?>
<?php slot('nav') ?>
<div class="topnav_container_params" style="margin-top:3px;">
<?php if($propertyTemplate->getCustomPageName() != ''):?>
  <?php if(in_array($property->getCode(),array('556PVF'))):?>
    <a href="https://domuso.com/payment/myPaymentMethod/3740" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php else:?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php endif;?>
  <a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>" class="nav_item"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="nav_item">RENTAL APPLICATION PDF</a>
  <?php endif;?>
<?php else:?>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
  <?php if(in_array($property->getCode(),array('556PVF'))):?>
    <a href="https://domuso.com/payment/myPaymentMethod/3740" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php else:?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php endif;?>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
  <?php if(in_array($property->getCode(),array('556PVF'))):?>
    <a href="https://domuso.com/payment/myPaymentMethod/3740" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php else:?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php endif;?>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="nav_item">RENTAL APPLICATION PDF</a>
  <?php endif;?>
<?php endif;?>
</div>
<?php end_slot() ?>

<?php slot('bot-nav') ?>
<?php if($propertyTemplate->getCustomPageName() != ''):?>
<a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>" class="footerlink"><?php echo $propertyTemplate->getCustomPageName()?></a><br />
<?php endif;?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
  <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="footerlink">Online Rental Application</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
  <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="footerlink">Rental Application PDF</a>
<?php endif;?>
<?php end_slot() ?>
<?php if($property->getState()->getCode() == 'CA'): ?>
  <p>AMC-CA, Inc. dba Apartment Management Consultants- BRE #1525033</p>
<?php endif;?>
<?php slot('social') ?>
<div class="footer_left_facebook">
<?php if($propertyTemplate->getFacebookUrl() != ''):?>
<?php foreach($arrSocialUrls as $keySocialURL=>$itemSocialURL):?>
  <?php if($keySocialURL == 'facebook'):?>
  <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>" target="_blank"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
  <?php endif;?>
  <?php if($keySocialURL == 'google'):?>
    <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>" target="_blank"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
  <?php endif;?> 
  <?php if($keySocialURL == 'twitter'):?>
    <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>" target="_blank"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
  <?php endif;?> 
  <?php if($keySocialURL == 'yelp'):?>
    <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>" target="_blank"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
  <?php endif;?> 
  <?php if($keySocialURL == 'instagram'):?>
    <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>" target="_blank"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
  <?php endif;?> 
  <?php if($keySocialURL == 'linkedin'):?>
    <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>" target="_blank"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
  <?php endif;?> 
  <?php if($keySocialURL == 'pinterest'):?>
    <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>" target="_blank"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
  <?php endif;?> 
<?php endforeach;?>
<?php endif;?>
</div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
      <?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
<?php slot('bot-code') ?>
<?php if(in_array($property->getCode(),array('368LOA'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('b5091124', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('77e58b83', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ });
</script>
<?php endif;?>

<?php if(in_array($property->getCode(),array('363PHG'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('85e5566f', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('6db5f4c9', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){  });
</script>
<?php endif;?>

<?php if(in_array($property->getCode(),array('357PAC'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('46d7fe36', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('2ae05b1f', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){  });
</script>
<?php endif;?>

<?php if(in_array($property->getCode(),array('133REE'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('c16d8213', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('5149e5d9', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){  });
</script>
<?php endif;?>

<?php end_slot() ?>
<?php /*

<!-- Content -->
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
          Designed with modern interiors and lush surroundings.
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
          <div style="homephotos_thumb_photo">
            <a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" width="225" border="0" /></a>
          </div>
          <div class="homephotos_description"><?php echo $photo->getName()?></div>
        </div>
        <?php endif;?>
        <?php if($photocnt == 2):?>
        <div class="homephotos_thumb_middle">
          <div style="homephotos_thumb_photo">
            <a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" width="225" border="0" /></a>
          </div>
          <div class="homephotos_description"><?php echo $photo->getName()?></div>
        </div>
        <?php endif;?>
        <?php if($photocnt == 3):?>
        <div class="homephotos_thumb_right">
          <div style="homephotos_thumb_photo">
            <a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" width="225" border="0" /></s>
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
<a href="<?php echo url_for('contact/index')?>"><?php echo $property->getEmail()?></a><br />
</div>
<?php end_slot() ?>

*/?>
