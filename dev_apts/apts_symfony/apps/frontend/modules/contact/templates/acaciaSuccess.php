<!-- Content -->
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
					<?php echo $form['phone']->render(array('size' => '55','class' => 'contact-form','title' => 'PHONE*')) ?>
					<?php echo $form['email']->render(array('size' => '55','class' => 'contact-form','title' => 'EMAIL*')) ?>
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
					<a href="<?php echo url_for("ebrochure/index");?>" target="_blank"><img src="/images/acacia/contact-download.png" /></a>
				</div>
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
					<a href="<?php echo url_for("photos/index")?>" class="nav_item">PHOTOS</a>
					<a href="<?php echo url_for("features/index")?>" class="nav_item">FEATURES</a>
					<a href="<?php echo url_for("community/index")?>" class="nav_item">COMMUNITY</a>
					<a href="<?php echo url_for("contact/min")?>" class="nav_item active">CONTACT</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php end_slot() ?>

<?php slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
	<div class="banner_secondary_inner" style="background:url('/images/acacia/<?php echo $property->getCode()?>/banner_contact.png') "></div>
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
<a href="<?php echo url_for('contact/index')?>"><?php echo $property->getEmail()?></a><br />
</div>
<?php end_slot() ?>

<?php /*
<div id="banner-gray">
<div id="banner2"><img src="/images/acacia/banner-photo.png" width="1024" height="257" /></div>
</div><!-- end of banner-gray -->

<div id="white-fill">
<div id="wrap-top">
<div id="middle">
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
</div><!-- end of middle -->
</div>
</div>


<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo-head"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('logo-grey') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo-grey"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('address') ?>
<div id="addres-hours"><span class="footer-title1">address</span><br />
<?php echo $property->getAddress()?><br /><br />
<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />
<span class="footer-title1">hours</span><br />
<?php echo nl2br($property->getHours())?>
</div>
<div id="phone-fax-email">
<span class="footer-title1">phone </span><br />
<?php echo $property->getPhone()?><br /><br />
<span class="footer-title1">fax</span><br />
<?php echo $property->getFax()?><br /><br />
<span class="footer-title1">email</span><br />
<?php echo $property->getEmail()?><br />
</div>
<?php end_slot() ?>
<?php /*
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
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<?php end_slot() ?>
<?php slot('bot-nav') ?>
<div style="text-align: center; padding: 0px 0px 15px 0px; color: white; font-size:10px;">
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?></div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
*/?>
