<!-- sec main banner -->
      <div class="sec_banner_container">
        <div style="background:url('/images/cornerstone/banner_contact.jpg') center top no-repeat; background-size: cover;" class="sec_banner_bg" >

        </div>
      </div>
    <!-- sec main banner:end -->

    <!-- home/sec content -->
    <div class="content_container">
      <div class="content_container_bg" style="background:url('/images/cornerstone/<?php echo $property->getCode()?>/home_sub_bg.jpg') #ffffff center 110% no-repeat; background-size: 100% 35%;">
        <div class="content_inner ">

              <div class="content_description">
                <h1>Thank you <br />Your information has been sent.</h1>

              </div>


    </div>
              </div>

<?php /*<!-- Content -->
<div class="content_outter">
  <div class="content_inner">
    <div class="content_params">

      <div class="page_title_shell">
        <div style="width:130px;" class="page_title_params_secondary">
          CONTACT US
        </div>
      </div>

      <div class="content_secondary">
        <div id="contact-us">
        <div id="contact-title">
          We'd love to hear from you. Send us a message.
        </div>
      <?php if ($sf_user->hasFlash('mailsuccess')): ?>
      <div id="contact-form-title"> <span class="color14b"><?php echo $sf_user->getFlash('mailsuccess') ?></span></div>
      <?php else: ?>
      <form action="<?php echo url_for('contact/min'); ?>" method="post">
        <?php if($form->hasErrors()): ?>
        <div class="contact-form-row">
          <ul style="color:red">
            <?php foreach($form as $formField): ?>
            <?php if($formField->hasError()): ?>
            <?php echo $formField->renderError();?>
            <?php endif; ?>
            <?php endforeach;?>
          </ul>
        </div>
        <?php endif; ?>
        <div id="contact-form">



          <?php echo $form['fname']->render(array('size' => '55','class' => 'contact-form','title' => 'FIRST NAME*')) ?>
          <?php echo $form['lname']->render(array('size' => '55','class' => 'contact-form','title' => 'LAST NAME*')) ?>
          <?php echo $form['phone']->render(array('size' => '55','class' => 'contact-form','title' => 'PHONE')) ?>
          <?php echo $form['email']->render(array('size' => '55','class' => 'contact-form','title' => 'EMAIL*')) ?>
          <?php echo $form['fax']->render(array('size' => '55','class' => 'contact-form','title' => 'FAX')) ?>
          <?php echo $form['notes']->render(array('cols' => '82','rows' => '6','style' => 'font-size: 12px; text-align:left;')); ?>
          <div class="contact-form-txt">SECURITY CODE<span class="red">*</span></div>
          <div class="contact-form-field1"><?php echo $form['captcha']->render() ?></div>
          <p style="padding: 10px 0;"><input type="image" name="Submit" src="/images/acacia/contact-submit.png" width="160" height="44" value="SEND" /></p>
        </form>
        <?php endif; ?>
        </div>
        </div>

        <div id="contact-info">
        <span class="contact-title-directions">GET DIRECTIONS</span><br /><br />
        <a href="<?php echo $propertyTemplate->getMapHtml();?>">
        <span class="contact-subtitle">Click here for custom directions.</span></a>

        <div id="contact-map">
          <iframe width="450" height="400" frameborder="0" scrolling="no" marginheight="0"
          marginwidth="0" src="<?php echo $propertyTemplate->getMapFrameSrc();?>">
          </iframe>
        </div><?php echo $property->getAddress()?><br />
        <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br />
        <br />
        <span class="contact-phone"><?php echo $property->getPhone()?></span><br />
        <br />
        <span class="contact-info-sec">EMAIL:</span>
        <?php echo $property->getEmail()?><br />

        <span class="contact-info-sec">FAX:</span>
        <?php echo $property->getFax()?><br />

        <br />
        <span class="contact-info-sec">HOURS OF OPERATION</span><br />
        <?php echo nl2br($property->getHours())?>

        <div id="contact-download">
          <?php //if (in_array($property->getCode(),array('459KIN','460MET','452ONE'))) : ?>
          <?php if($propertyTemplate->getEBrochure() != ''):?>
            <a href="/uploads/properties/<?php echo $propertyTemplate->getEBrochure();?>" target="_blank"><img src="/images/acacia/contact-download.png" /></a>
          <?php else:?>
            <a href="<?php echo url_for("ebrochure/index")?>" target="_blank"><img src="/images/acacia/contact-download.png" /></a>
          <?php endif;?>
        </div>
        </div>
      </div>

    </div>
  </div>
</div>*/?>
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
<div style="padding-top:10px;"><a href="<?php echo url_for('contact/min')?>"><img src="/images/cornerstone/btn_schedule_tour.png"></a></div>
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
