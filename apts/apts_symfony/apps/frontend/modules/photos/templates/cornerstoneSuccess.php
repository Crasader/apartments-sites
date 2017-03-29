    <!-- sec main banner -->
      <div class="sec_banner_container">
        <div style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/banner_gallery.jpg') center top no-repeat; background-size: cover;" class="sec_banner_bg" >

        </div>
      </div>
    <!-- sec main banner:end -->

    <!-- home/sec content -->
    <div class="content_container">
      <div class="content_container_bg" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_sub_bg.jpg') #ffffff center 110% no-repeat; background-size: 100% 35%;">
        <div class="content_inner ">

              <div class="content_description">
                <h1>Gallery</h1>

              </div>

              <div class="generic_container">
              <div class="generic_container_params">
              <?php foreach($mainPhotos as $photo):?>
              <div class="photo_item circleMask"><a href="/uploads/photos/<?php echo $photo->getImage()?>" class="fancybox" rel="group" title="<?php echo $photo->getName()?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" /></a></div>
              <?php endforeach;?>
              <?php /*<div class="photo_item circleMask"><a href="http://www.wasatchclubapts.com/uploads/photos/701fa0c2dba33462ee1375f7233f6cc2.jpg" class="fancybox" title="Wasatch Club Apartments Midvale, UT"><img src="http://www.wasatchclubapts.com/uploads/photos/258/701fa0c2dba33462ee1375f7233f6cc2.jpg" alt="Wasatch Club Apartments Midvale, UT" /></a></div>
              <div class="photo_item circleMask"><a href="http://www.wasatchclubapts.com/uploads/photos/b53ec69259ca1681b4aff7cb8d1f89cd.jpg" class="fancybox" title="Wasatch Club Apartments in Midvale"><img src="http://www.wasatchclubapts.com/uploads/photos/258/b53ec69259ca1681b4aff7cb8d1f89cd.jpg" alt="Wasatch Club Apartments in Midvale" /></a></div>
              <div class="photo_item circleMask"><a href="http://www.wasatchclubapts.com/uploads/photos/b785cc43521ce46a423a065543d9b987.jpg" class="fancybox" title="Wasatch Club Apartments in Midvale, UT"><img src="http://www.wasatchclubapts.com/uploads/photos/258/b785cc43521ce46a423a065543d9b987.jpg" alt="Wasatch Club Apartments in Midvale, UT" /></a></div>
              <div class="photo_item circleMask"><a href="http://www.wasatchclubapts.com/uploads/photos/32641eca6956f92ad3bef369d3580cef.jpg" class="fancybox" title="Wasatch Club Apartments in UT"><img src="http://www.wasatchclubapts.com/uploads/photos/258/32641eca6956f92ad3bef369d3580cef.jpg" alt="Wasatch Club Apartments in UT" /></a></div>
              <div class="photo_item circleMask"><a href="http://www.wasatchclubapts.com/uploads/photos/6df33fd1c93c305c250c8b2fcdb40993.jpg" class="fancybox" title="Wasatch Club Apartments"><img src="http://www.wasatchclubapts.com/uploads/photos/258/6df33fd1c93c305c250c8b2fcdb40993.jpg" alt="Wasatch Club Apartments" /></a></div>
              */?>
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