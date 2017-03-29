
    <!-- sec main banner -->
      <div class="sec_banner_container">
        <div style="background:url('/images/cornerstone/banner_floorplans.jpg') center top no-repeat; background-size: cover;" class="sec_banner_bg" >

        </div>
      </div>
    <!-- sec main banner:end -->

    <!-- home/sec content -->
    <div class="content_container">
      <div class="content_container_bg" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_sub_bg.jpg') #ffffff center 110% no-repeat; background-size: 100% 35%;">
        <div class="content_inner ">

              <div class="content_description">
              <h1>Floor Plans at <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?></h1>
              <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> offers <?php echo $property->getUnitType()?> apartments. Our floor plans are designed with your comfort and enjoyment in mind. Choose <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> as your new home and enjoy the convenient location and superior service.
              <?php /*	<h1>floorplans</h1>
                <?php echo nl2br($propertyTemplate->getAcaciaFloorplanDesc())*/?>
              </div>


        <div id="floorplan" class="clearall">
          <div id="floorplanhdr">
            <h2><?php echo $arrFloorPlans['floorplan']['name'];?></h2>
            </div>
          <div class="floorplancell cell1">
            <h2>RENT</h2>
            <p><?php if(!empty($arrFloorPlans['floorplan']['price'])):?>
              <?php echo $arrFloorPlans['floorplan']['price'];?>
              <?php else:?>
              Call for pricing
              <?php endif; ?>
            </p>
          </div>
          <div class="floorplancell cell2">
            <h2>DEPOSIT</h2>
            <p>
            <?php if(!empty($arrFloorPlans['floorplan']['deposit'])):?>
            <?php echo $arrFloorPlans['floorplan']['deposit'];?>
            <?php else:?>
              OAC
              <?php endif; ?>
            </p>
          </div>
          <div class="floorplancell cell3">
            <h2>SQ FEET</h2>
            <p><?php echo $arrFloorPlans['floorplan']['squarefeet'];?></p>
          </div>
          <div class="floorplancell cell4">
            <h2>BED/BATH</h2>
            <p><?php echo $arrFloorPlans['floorplan']['bedrooms'];?> bed/<?php echo $arrFloorPlans['floorplan']['bathrooms'];?> ba</p>
          </div>
          <div class="floorplancell cell5">
            <h2>FLOOR PLAN</h2>
            <p><a href="/uploads/floorplans/<?php echo $arrFloorPlans['floorplan']['image'];?>" class="fancybox"><img src="/uploads/floorplans/169/<?php echo $arrFloorPlans['floorplan']['image'];?>" /></a></p>
          
        </div>

        <div class="clearall">&nbsp;</div>

      <?php
          $fpcount = 0;
          foreach($arrFloorPlans['units'] as $arrUnit):
          $fpcount++;
          $rowColor = 'odd-row';
          $fpcount % 2 == 0 ? $rowColor = 'even-row' : '' ;
          ?>
      <div id="floorplan" class="clearall">
        <div class="floorplandetailhdr hdrcell1">&nbsp; </div>
        <div class="floorplandetailhdr hdrcell2">
        <p>RENT</p>
        </div>
        <div class="floorplandetailhdr hdrcell3">
        <p>UNIT</p>
        </div>
        <div class="floorplandetailhdr hdrcell4">
        <p>ADDITIONAL INFO</p>
        </div>
        <div class="floorplandetailhdr hdrcell5">
        <p>AVAILABLE</p>
        </div>
      </div>
      <div id="floorplandata">
        <div id="floorplan remove-margin clearfix">
          <div class="floorplandetailcell detailcell1 <?php echo $rowColor;?>">
            <div class="radiodetailcell">
            <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
              <input type="radio" name="unit-select" value="<?php echo $arrUnit["UnitNumber"];?>">
            <?php endif;?>
            </div>
          </div>
          <div class="floorplandetailcell detailcell2 <?php echo $rowColor;?>">
            <p>$<?php echo $arrUnit["UnitAskingPrice"];?> per month</p>
          </div>
          <div class="floorplandetailcell detailcell3 <?php echo $rowColor;?>">
            <p><?php echo $arrUnit["UnitNumber"];?></p>
          </div>
          <div class="floorplandetailcell detailcell4 <?php echo $rowColor;?>">
            <p><?php echo $arrUnit["UnitTypeDescription"];?></p>
          </div>
          <div class="floorplandetailcell detailcell5 <?php echo $rowColor;?>">
            <p><?php echo $arrUnit["DateVacated"];?></p>
          </div>
        </div>
      </div>
        <?php endforeach;?>
      

    </div>

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