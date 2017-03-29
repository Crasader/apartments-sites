    <!-- sec main banner -->
      <div class="sec_banner_container">
        <div style="background:url('/images/cornerstone/banner_contact.jpg') center top no-repeat; background-size: cover;" class="sec_banner_bg" >

        </div>
      </div>
    <!-- sec main banner:end -->

    <!-- home/sec content -->
    <div class="mh_container">

        <div class="mh_subtitle">
            powered by matterport
        </div>

        <div class="mh_desc">
            <div class="mh_desc_params">
                <h1 style="line-height:34px;">3D Tour at <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?></h1>
              <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> offers <?php echo $property->getUnitType()?> apartments. Our floor plans are designed with your comfort and enjoyment in mind. Choose <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> as your new home and enjoy the convenient location and superior service.

            </div>
        </div>

        <div class="mh_buttons">
            <div class="mh_btn_view_inside">
                <div class="mh_btn_inner">
                    <div class="mh_btn_inner_cell">
                    <a href="<?php echo $propertyTemplate->getSrc3dtour();?>" target="_blank">
                        <img src="/images/mh_icon_view_inside.png">
                        <span>&nbsp; VIEW INSIDE</span></a>
                    </div>
                </div>
            </div>

            <div class="mh_btn_dollhouse">
                <div class="mh_btn_inner">
                    <div class="mh_btn_inner_cell">
                    <a href="<?php echo $propertyTemplate->getSrc3dtour();?>" target="_blank">
                        <img src="/images/mh_icon_dollhouse.png">
                        <span>&nbsp; DOLLHOUSE</span></a>
                    </div>
                </div>
            </div>

            <div class="mh_btn_floorplans">
                <div class="mh_btn_inner">
                    <div class="mh_btn_inner_cell">
                    <a href="<?php echo url_for('floorplans/index');?>">
                        <img src="/images/mh_icon_floorplan.png">
                        <span>&nbsp; FLOORPLANS</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mh_iframe_container">
            <iframe frameborder="0" height="480" src="<?php echo $propertyTemplate->getSrc3dtour();?>" width="100%"></iframe>
        </div>

        <div class="mh_thumbnails">
        <?php $photocnt = 0;?>

        <?php foreach($tour3dphotos as $photo):?>
            <?php $photocnt++?>
            <?php $strMargin = '';?>
            <?php if($photocnt < 4) $strMargin = 'mh_right_margin';?>
            <div class="mh_thumb <?php echo $strMargin;?>"><img src="/uploads/photos/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" title="<?php echo $photo->getName()?>" /></div>
        <?php endforeach;?>
        <?php /*    <div class="mh_thumb mh_right_margin"><img src="/uploads/photos/2abd2949f76cc9669df5bc65ceb66f5e.jpg" /></div>
            <div class="mh_thumb mh_right_margin"><img src="/uploads/photos/68343ee446bd8dab3cd67bc1c027da99.jpg" /></div>
            <div class="mh_thumb mh_right_margin"><img src="/uploads/photos/7ae7f9698ee86f8ace1d8dc21d58127a.jpg" /></div>
            <div class="mh_thumb"><img src="/uploads/photos/7ae7f9698ee86f8ace1d8dc21d58127a.jpg" /></div>*/?>
        </div>




<?php slot('3dtour-nav') ?>
  var nav3dtour = false;
<?php end_slot() ?>

<?php slot('map') ?>
<iframe src="<?php echo $propertyTemplate->getMapFrameSrc();?>" width="100%" height="230" frameborder="0" style="border:0" allowfullscreen></iframe>
<?php end_slot() ?>

<?php slot('map-contact') ?>
<div><?php echo $property->getPhone()?></div>
<div style="padding-top:10px;"><a href="<?php echo url_for('contact/form')?>">SCHEDULE A TOUR</a></div>
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