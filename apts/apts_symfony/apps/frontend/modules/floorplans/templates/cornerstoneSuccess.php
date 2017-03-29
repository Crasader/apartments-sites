
<script type="text/javascript">
  $( document ).ready(function() {
    $('.floorplan_group_modtrigger').on('click', function() {

        $("#"+$(this).attr('ref')).dialog(
        {
            modal: true,
            title: ' ',
            show: 'puff',
            width: '80%',
            hide: 'puff'
         });
    });
  });
</script>

    <!-- sec main banner -->
      <div class="sec_banner_container">
        <div style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/banner_floorplans.jpg') center top no-repeat; background-size: cover;" class="sec_banner_bg" >

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

        <div class="floorplan_group_container">
          <div class="floorplan_group_container_params">

            <?php $fpcount=0;
              foreach($arrFloorPlansAvailability as $floorPlanID => $row):
              $fpcount++;?>

              <div class="floorplan_group">
              <div class="floorplan_group_params">
                  <div class="floorplan_group_title"><?php echo $row['floorplan']['name'];?></div>
                  <a href="#" class="floorplan_group_modtrigger" ref="dialog-modal-<?php echo $fpcount;?>">
                    <div class="floorplan_group_img"><img src="/uploads/floorplans/<?php echo $row['floorplan']['image'];?>" /></div>
                  </a>
                  <a href="<?php echo url_for('floorplans/detail?id='.$floorPlanID)?>">
                  <div class="floorplan_group_check"><img src="/images/cornerstone/circle_check.png" /></div>
                  </a>
              </div>
            </div>
            <div id="dialog-modal-<?php echo $fpcount;?>" class="diag" >
              <div class="diag_left">
                <img src="/uploads/floorplans/<?php echo $row['floorplan']['image'];?>" />
              </div>
              <div class="diag_right">
                <h2>Description</h2>
                <div class="diag_strong"><?php echo $row['floorplan']['bedrooms'];?> bedroom</div>
                <div class="diag_strong"><?php echo $row['floorplan']['bathrooms'];?> bathroom</div>
                <div class="diag_strong"><?php echo $row['floorplan']['squarefeet'];?> SQ FT</div>
                <div class="diag_strong">Rent <?php echo $row['floorplan']['price'];?></div>
                <div class="diag_strong">Deposit <?php echo $row['floorplan']['deposit'];?></div>
                <div style="margin-top:80px;">Prices are subject to change*</div>
                <!--div>This Corner unit features 9ft ceilings, walk in closets, and a privet balcony. We include full size washer and Dryer in every Unit</div>
                <div class="diag_strong">Residence Features</div>
                <div >Vaulted Ceilings *In Select Units*<br /> * Available in select units</div-->
              </div>
            </div>
            <?php endforeach;?>


            <?php /*
            <a class="floorplan_group" href="#" ref="dialog-modal-2">
              <div class="floorplan_group_params">
                  <div class="floorplan_group_title">2 Bedrooms</div>
                  <div class="floorplan_group_img"><img src="/images/cornerstone/floorplan_2.png" /></div>
                  <div class="floorplan_group_check"><img src="/images/cornerstone/circle_check.png" /></div>
              </div>
            </a>
            <div id="dialog-modal-2" class="diag" >
              <div class="diag_left">
                <img src="/images/cornerstone/floorplan_2_large.jpg" />
              </div>
              <div class="diag_right">
                <h2>Description</h2>
                <div class="diag_strong">2 bedroom | 2 bathroom | 946 SQ FT</div>
                <div>Spacious 2 bedroom 2 bathroom apartment 9ft ceilings, private balcony and walk in closets! We include washer and dryer in every unit. </div>
                <div class="diag_strong">Residence Features</div>
                <div >Vaulted Ceilings *In Select Units*<br /> * Available in select units</div>
              </div>
            </div>

            <a class="floorplan_group" href="#" ref="dialog-modal-3">
              <div class="floorplan_group_params">
                  <div class="floorplan_group_title">3 Bedrooms</div>
                  <div class="floorplan_group_img"><img src="/images/cornerstone/floorplan_3.png" /></div>
                  <div class="floorplan_group_check"><img src="/images/cornerstone/circle_check.png" /></div>
              </div>
            </a>
            <div id="dialog-modal-3" class="diag" >
              <div class="diag_left">
                <img src="/images/cornerstone/floorplan_3_large.jpg" />
              </div>
              <div class="diag_right">
                <h2>Description</h2>
                <div class="diag_strong">3 bedroom | 2 bathroom | 1221 SQ FT</div>
                <div>This Corner unit features a large pantry, 9ft ceilings, walk in closets and more. We include washer and dryer in every unity. </div>
                <div class="diag_strong">Residence Features</div>
                <div >Vaulted Ceilings *In Select Units*<br /> * Available in select units</div>
              </div>
            </div>*/?>

          </div>
        </div>
        <div class="clearall"></div>
        <div style="margin:80px 0 0 80px;">Prices are subject to change*</div>

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