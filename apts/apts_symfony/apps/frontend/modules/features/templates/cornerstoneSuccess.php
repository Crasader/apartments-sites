    <!-- sec main banner -->
      <div class="sec_banner_container">
        <div style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/banner_amenities.jpg') center top no-repeat; background-size: cover;" class="sec_banner_bg" >

        </div>
      </div>
    <!-- sec main banner:end -->

    <!-- home/sec content -->
    <div class="content_container">
      <div class="content_container_bg" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_sub_bg.jpg') #ffffff center 110% no-repeat; background-size: 100% 35%;">
        <div class="content_inner ">

              <div class="content_description">
                <h1>Amenities</h1>
                <?php echo nl2br($propertyTemplate->getAcaciaFeaturesDesc())?>
              </div>

              <div class="generic_container">
                <div class="generic_container_params">

                  <!-- amenity item -->
                  <div class="amenities_group">

                    <div class="amenities_img">
                      <img src="/images/cornerstone/amenities_petpolicy.png" />
                    </div>

                    <div class="amenities_title">
                      <h2>pet policy</h2>
                    </div>

                    <div class="amenities_list">
                      <?php echo $property->getPetPolicy();?>
                    </div>

                  </div>
                  <!-- amenity item:end -->

                  <!-- amenity item -->
                  <div class="amenities_group">

                    <div class="amenities_img ">


                      <?php if(!empty($arrFeaturePhoto[0])):?>
                        <img src="<?php echo $arrFeaturePhoto[0]['path']?>" alt="<?php echo $arrFeaturePhoto[0]['name']?>" title="<?php echo $arrFeaturePhoto[0]['name']?>"  class="circleMask"/>
                      <?php else:?>
                        <img src="/images/cornerstone/amenities_amenities.png" />
                      <?php endif;?>
                    </div>

                    <div class="amenities_title">
                      <h2>apartment amenities</h2>
                    </div>

                    <div class="amenities_list">
                      <ul>
                      <?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
                        <li><?php echo $feature->getApartmentFeature()->getName()?></li>
                      <?php endforeach;?>

                      <?php foreach($property->getPropertyOtherFeatures() as $feature):?>
                        <li><?php echo $feature->getOtherFeature()->getName()?></li>
                      <?php endforeach;?>
                      </ul>



                    </div>

                  </div>
                  <!-- amenity item:end -->

                  <!-- amenity item -->
                  <div class="amenities_group">

                    <div class="amenities_img">


                      <?php if(!empty($arrFeaturePhoto[1])):?>
                        <img src="<?php echo $arrFeaturePhoto[1]['path']?>" alt="<?php echo $arrFeaturePhoto[1]['name']?>" title="<?php echo $arrFeaturePhoto[1]['name']?>" class="circleMask" />
                      <?php else:?>
                        <img src="/images/cornerstone/amenities_parkingpolicy.png" />
                      <?php endif;?>

                    </div>

                    <div class="amenities_title">
                      <h2>COMMUNITY FEATURES</h2>
                    </div>

                    <div class="amenities_list">
                      <ul>
                      <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
                        <li><?php echo $feature->getCommunityFeature()->getName()?></li>
                      <?php endforeach;?>
                      </ul>

                    </div>

                  </div>
                  <!-- amenity item:end -->

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