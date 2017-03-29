<div id="residentwrapper" class="clearfix">

<div class="clearfix"><h1>Resident Center</h1></div>

          <!-- resident item: Features -->
        <div class="resident_item">
          <div class="resident_top">
            <div class="resident_top_inner">

             <div class="resident_top_icon">
                <img src="/images/resp/amc_icon_pay.png" />
              </div>

              <div class="resident_top_item">
                MAKE A PAYMENT
              </div>

            </div>

          </div>

          <div class="resident_bottom">
            <div class="resident_bottom_text">
              Want to pay your bill quickly and securely? Go to our Online Payment form.
            </div>
            <div class="resident_bottom_link">
              <br />
              <a href="https://www.amcrentpay.com/Account/Login.aspx" target="_blank" class="resident_btn">make a payment online</a>
            </div>
          </div>

        </div>


          <!-- resident item: Features -->
        <div class="resident_item">
          <div class="resident_top">
            <div class="resident_top_inner">

             <div class="resident_top_icon">
                <img src="/images/resp/amc_icon_maintenance.png" />
              </div>

              <div class="resident_top_item">
                MAINTENANCE REQUEST
              </div>

            </div>

          </div>

          <div class="resident_bottom">
            <div class="resident_bottom_text">
              Having a problem? Fill out our Maintenance Request form and we will get your concern taken care of as quickly as possible.
            </div>
            <div class="resident_bottom_link">
              <a href="<?php echo url_for('residents/maintenance')?>" class="resident_btn">send maintenance request</a>
            </div>
          </div>

        </div>

          <!-- resident item: Features -->
        <div class="resident_item_last">
          <div class="resident_top">
            <div class="resident_top_inner">

             <div class="resident_top_icon">
                <img src="/images/resp/amc_icon_truck.png" />
              </div>

              <div class="resident_top_item">
                WE'VE MOVED
              </div>

            </div>

          </div>

          <div class="resident_bottom">
            <div class="resident_bottom_text">
              Let everyone know that you've moved into a great new apartment!
            </div>
            <div class="resident_bottom_link">
            <br />
              <a href="<?php echo url_for('residents/wevemoved')?>" class="resident_btn">send personalized notice</a>
            </div>
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
    <?php /*<a href="<?php echo url_for('default/index')?>"><img id="logo" src="/images/resp/logo.png" class="image" /></a>*/?>
    <a href="<?php echo url_for('default/index')?>"><img id="logo" class="image" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" title="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" alt="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" border="0" /></a>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('rentalapp') ?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
&nbsp;&nbsp;&nbsp;<a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
&nbsp;&nbsp;&nbsp;<a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('rentalappm') ?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('ourpage') ?>
<?php if(trim($propertyTemplate->getCustomPageName()) != ''):?>
    &nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a>&nbsp;&nbsp;&nbsp;|
  <?php endif;?>
<?php end_slot() ?>
<?php slot('ourpagem') ?>
<?php if(trim($propertyTemplate->getCustomPageName()) != ''):?>
    <a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a><br />
  <?php endif;?>
<?php end_slot() ?>

<?php slot('nav') ?>
<div id="nav">
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Apartments - Home" href="<?php echo url_for('default/index')?>">Home</a></div>
  <div class="nav-item"><a title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans" href="<?php echo url_for('floorplans/index')?>">Floor Plans</a></div>
  <div class="nav-item" title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos">Photos</div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartment Complex - Features" href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item"><a title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community" href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Rentals - Contact Us" href="<?php echo url_for('contact/index')?>">Contact Us</a></div>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a></div>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <?php endif;?>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<?php end_slot() ?>
<?php slot('bot-nav') ?>
<div style="text-align: center; padding: 0px 0px 15px 0px; color: white; font-size:10px;">
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?>&nbsp;&nbsp;<img style="vertical-align:middle;" src="/images/icon_equal_housing.png"/>
</div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
      <?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
<?php if(in_array($property->getCode(),array('607SET','673CLR','06COV','11GGR','677GST'))):?>
<?php $shortcode =  $property->getCode();
$shortcode = substr($shortcode,-3,3);?>
<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="https://amc.myresman.com/Portal/Access/SignIn/<?php print $shortcode;?>" target="_blank">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="https://amc.myresman.com/Portal/Access/SignIn/<?php print $shortcode;?>" target="_blank">Resident Center</a><br />
<?php end_slot() ?>

<?php elseif(in_array($property->getCode(),array('28LOT','659LTP','657BWA','615MDR','658CIL','632BLK','605PNA'))):?>
<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('residents/login')?>">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="<?php echo url_for('residents/login')?>">Resident Center</a><br />
<?php end_slot() ?>

<?php else:?>
<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('residents/login')?>">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="<?php echo url_for('residents/login')?>">Resident Center</a><br />
<?php end_slot() ?>
<?php endif;?>
