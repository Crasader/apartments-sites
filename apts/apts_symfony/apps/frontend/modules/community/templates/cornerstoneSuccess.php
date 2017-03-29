    <!-- sec main banner -->
      <div class="sec_banner_container">
        <div style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/banner_rental.jpg') center top no-repeat; background-size: cover;" class="sec_banner_bg" >

        </div>
      </div>
    <!-- sec main banner:end -->

    <!-- home/sec content -->
    <div class="content_container">
      <div class="content_container_bg" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_sub_bg.jpg') #ffffff center 110% no-repeat; background-size: 100% 35%;">
        <div class="content_inner ">

              <div class="content_description">
                <h1>Community</h1>
              </div>

              <div class="generic_container">
                <div class="generic_container_params">

            <div class="map_wrap">
            <div id="legend">
              <div class="iconlabelholder">
                <div class="iconholder"><img src="/images/entertainment.svg"></div>
                <div class="labelholder">Entertainment</div>
                <div class="iconholder"><img src="/images/outdoor-activities.svg"></div>
                <div class="labelholder">Outdoor Activities</div>
                <div class="iconholder"><img src="/images/restaurants.svg"></div>
                <div class="labelholder">Restaurants</div>
                <div class="iconholder"><img src="/images/schools.svg"></div>
                <div class="labelholder">Schools</div>
                <div class="iconholder"><img src="/images/shopping.svg"></div>
                <div class="labelholder">Shopping</div>
              </div>
            </div>

            <div id="map-canvas"></div>
                <?php if($propertyTemplate->getGMapKey() != ''):?>
                <?php echo $propertyTemplate->getGMapKey()?>
                <?php else:?>
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
                <?php endif;?>
                <script>newMap = new placesMap(<?php echo $propertyTemplate->getLatitude()?>,<?php echo $propertyTemplate->getLongitude()?>,"/images/cornerstone/<?php echo $property->getCode()?>/favicon.png","map-canvas");</script>

            </div>

                </div>
              </div>


<?php /*<!-- Content -->
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
*/?>

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
<div style="padding-top:10px;"><a href="<?php echo url_for('contact/form')?>"><img src="/images/cornerstone/btn_schedule_tour.png"></a></div>
<?php end_slot() ?>

<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <?php /*<a href="<?php echo url_for('default/index')?>"><img id="logo" src="/images/resp/logo.png" class="image" /></a>*/?>
    <a href="<?php echo url_for('default/index')?>"><img id="logo" class="image" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" title="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" alt="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" border="0" /></a>
  <?php else:?>
    <a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a>
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

<?php slot('ourpage') ?>
<?php if(trim($propertyTemplate->getCustomPageName()) != ''):?>
<li><a title="<?php echo $propertyTemplate->getCustomPageName()?>" href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></li>
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

<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
      <?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
