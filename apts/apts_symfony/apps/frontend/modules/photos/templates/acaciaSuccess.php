<!-- Content -->
<div class="content_outter">
  <div class="content_inner">
    <div class="content_params">

      <div class="page_title_shell">
        <div style="width:180px;" class="page_title_params_secondary">
          PHOTO GALLERY
        </div>
      </div>

      <div class="content_secondary">
      <div class="photo_marg">
       <div class=center>
        <span id=prev class="prev">&lt;&lt;Prev </span>
        <span id=next class="next"> Next&gt;&gt;</span>
        </div>

      <div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=6000 data-cycle-loader=true data-cycle-prev="#prev" data-cycle-next="#next">


          <!--img src="http://malsup.github.io/images/p1.jpg"-->

          <?php foreach($mainPhotos as $photo):?>
            <img class="cycle-img" src="/uploads/photos/<?php echo $photo->getImage()?>">

          <?php endforeach;?>
      </div>
      <?php /*?><div class="photo_marg">
      <?php foreach($mainPhotos as $photo):?>
        <div class="photo_item"><a href="/uploads/photos/<?php echo $photo->getImage()?>" class="fancybox" title="<?php echo $photo->getName()?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" /></a></div>

      <?php endforeach;?>
      <?php */?>
      </div>
      </div>

    </div>
  </div>
</div>

<?php slot('header') ?>
<!-- Header -->
<div class="header_outter">
  <div class="header_inner">
    <div class="logo_container">
      <div class="logo_params">
        <a href="<?php echo url_for("default/index")?>"><img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
      </div>
    </div>
    <!-- responsive nav -->
          <div class="header_right_resp">
            <div class="header_right_resp_inner">

              <div class="respnav">

              <a href="#" id="respmenu-icon"><img src="/images/hamburger.png" /></a>

              <ul>
                  <li><a href="/" >HOME</a></li>
                  <li><a href="<?php echo url_for("floorplans/index")?>" >FLOOR PLANS</a></li>
                  <li><a href="<?php echo url_for("photos/index")?>" >PHOTOS</a></li>
                  <li><a href="<?php echo url_for("features/index")?>" >FEATURES</a></li>
                  <li><a href="<?php echo url_for("community/index")?>" >COMMUNITY</a></li>
                  <li><a href="<?php echo url_for("contact/min")?>" >CONTACT</a></li>
                  <li><a href="<?php echo url_for("residents/login")?>" >LOGIN</a></li>
                  <li><a href="https://amcrentpay.com" target="_blank">ONLINE RENT PAY</a></li>
                  <?php if($propertyTemplate->getCustomPageName() != ''):?>
                    <li><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a></li>
                  <?php endif;?>
                  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
                      <li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">RENTAL APPLICATION</a></li>
                      <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
                      <li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">RENTAL APPLICATION</a></li>
                    <?php endif;?>
              </ul>

              </div>

            </div>
          </div>
          <!-- end responsive nav -->
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
          <a href="<?php echo url_for("photos/index")?>" class="nav_item active">PHOTOS</a>
          <a href="<?php echo url_for("features/index")?>" class="nav_item">FEATURES</a>
          <a href="<?php echo url_for("community/index")?>" class="nav_item">COMMUNITY</a>
          <a href="<?php echo url_for("contact/min")?>" class="nav_item">CONTACT</a>
        </div>
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
      </div>
    </div>
  </div>
</div>
<?php end_slot() ?>

<?php slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
  <div class="banner_secondary_inner" style="background:url('/images/acacia/<?php echo $property->getCode()?>/banner_photo.png') "></div>
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
<a href="<?php echo url_for('contact/min')?>"><?php echo $property->getEmail()?></a><br />
</div>
<?php end_slot() ?>

<?php slot('tracking-code') ?>
  <?php if($propertyTemplate->getTrackingCode()):?>
    <?php echo $propertyTemplate->getTrackingCode()?>
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