<div id="sec-content">
  <div id="sec-left"> <span class="title">Contact Us</span><br />
    <br />
    <div id="contact-map">
      <iframe width="350" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $propertyTemplate->getMapFrameSrc();?>"></iframe>
      <br />
      <a href="<?php echo $propertyTemplate->getMapHtml();?>">View Larger Map</a> </div>
    <div id="contact-txt"> <span class="color14b">Driving Directions:</span><br />
      <?php echo $property->getDirections();?> </div>
    <div id="contact-form-title"> <span class="color14b">Contact Form</span><br /></div>
		<?php if ($sf_user->hasFlash('mailsuccess')): ?>
    <div id="contact-form-title"> <span class="color14b"><?php echo $sf_user->getFlash('mailsuccess') ?></span></div>
    <?php else: ?>
    <form action="<?php echo url_for('contact/index'); ?>" method="post">
      <?php if($form->hasErrors()): ?>
      <div class="contact-form-row">
        <ul style="color:red">
          <?php foreach($form as $formField): ?>
          <?php if($formField->hasError()): ?>
          <li><?php echo $formField->renderError();?></li>
          <?php endif; ?>
          <?php endforeach;?>
        </ul>
      </div>
      <?php endif; ?>
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>First Name:</div>
        <div class="contact-form-field1"><?php echo $form['fname']->render(array('size' => '20')) ?></div>
        <div class="contact-form-txt"><span class="red">*</span>Last Name:</div>
        <div class="contact-form-field2"><?php echo $form['lname']->render(array('size' => '20')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">Phone Number:</div>
        <div class="contact-form-field1"><?php echo $form['phone']->render(array('size' => '20')) ?></div>
        <div class="contact-form-txt">Fax Number:</div>
        <div class="contact-form-field2"><?php echo $form['fax']->render(array('size' => '20')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>Email Address:</div>
        <div class="contact-form-field1"><?php echo $form['email']->render(array('size' => '20')) ?></div>
        <div class="contact-form-txt">Employer:</div>
        <div class="contact-form-field2"><?php echo $form['employer']->render(array('size' => '20')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">Number of Occupants:</div>
        <div class="contact-form-field1"><?php echo $form['occupants']->render(array('size' => '20')) ?></div>
        <div class="contact-form-txt">Pets:(What kind and size?)</div>
        <div class="contact-form-field2"><?php echo $form['pets']->render(array('size' => '20')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">When are you needing an apartment?</div>
        <div class="contact-form-field1"><?php echo $form['when']->render(array('size' => '20')) ?></div>
        <div class="contact-form-txt">Number of Bedrooms:</div>
        <div class="contact-form-field2"><?php echo $form['bedrooms']->render(array('size' => '20')) ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>How did you hear about us?</div>
        <div class="contact-form-field1"> <?php echo $form['howhear']; ?> </div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>How would you prefer us to contact you?</div>
        <div class="contact-form-field1"> <?php echo $form['howcontact']; ?> </div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">Notes:</div>
        <div class="contact-form-field1"><?php echo $form['notes']; ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt"><span class="red">*</span>Enter security code:</div>
        <div class="contact-form-field1"><?php echo $form['captcha']->render() ?></div>
      </div>
      <div class="contact-form-row">
        <div class="contact-form-txt">
          <input name="submit" type="submit" value="Submit" />
        </div>
      </div>
    </form>
    <?php endif;?>
  </div>
  <div id="right">
    <div class="right-title">
      <div class="right-title-txt">Our Info</div>
    </div>
    <div class="sec-right-txt"> <span class="color14"><?php echo $property->getName()?></span><br />
      <?php echo $property->getAddress()?><br />
      <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
      <?php if($property->getPhone()):?>
      <br />
      <strong>Phone:</strong><?php echo $property->getPhone()?><br />
      <?php endif;?>
      <?php if($property->getFax()):?>
      <strong>Fax:</strong> <?php echo $property->getFax()?><br />
      <?php endif;?>
      <?php if($property->getEmail()):?>
      <a href="<?php echo url_for('contact/index')?>" alt="<?php echo $property->getEmail()?>"><img style="padding-top: 10px; border: none;" src="/images/btn_email.png" border="0"></a>
      <?php endif;?>
      <br />
      <strong>Office Hours</strong><br />
      <?php echo nl2br($property->getHours())?>
    </div>
  </div>
</div>
<?php slot('customstyles') ?>
<?php include_partial('global/customstyles', array('propertyTemplate' => $propertyTemplate)) ?>
<?php end_slot() ?>
<?php slot('chat') ?>
<?php if($propertyTemplate->getChat()):?>
<div id="bold-chat-holder">
  <div id="bold-chat"><?php echo $propertyTemplate->getChat();?></div>
</div>
<?php endif;?>
<?php end_slot() ?>
<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('nav') ?>
<div id="nav">
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Apartments - Home" href="<?php echo url_for('default/index')?>">Home</a></div>
  <div class="nav-item"><a title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans" href="<?php echo url_for('floorplans/index')?>">Floor Plans</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos"href="<?php echo url_for('photos/index')?>">Photos</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartment Complex - Features" href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item"><a title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community" href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?>
  <div class="nav-item" title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Rentals - Contact Us">Contact Us</div>
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
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?>&nbsp;&nbsp;<img style="vertical-align:middle;" src="/images/icon_equal_housing.png"/></div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
