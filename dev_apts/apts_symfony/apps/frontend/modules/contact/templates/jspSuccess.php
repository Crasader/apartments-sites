<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_contact.jpg" />
</div>
<!-- banner:end -->
<!-- Content -->
<div class="content_container">
			<div class="content_container_params">
				<div class="content_container_margins">

			<div class="content_secondary">
				<div id="contact-us">
				<div id="contact-title">
					SEND US A MESSAGE
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
					<p style="padding: 10px 0;"><input type="image" name="Submit" src="/images/jsp/contact-submit.png" width="99" height="37" value="SEND" /></p>
				</form>
				<?php endif; ?>
				</div>
				</div>

				<div id="contact-info">
				<span class="contact-title-directions">VISIT US</span><br /><br />
				<a href="<?php echo $propertyTemplate->getMapHtml();?>">
				<span class="contact-subtitle">Click here for custom directions.</span></a>

				<div id="contact-map">
					<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0"
					marginwidth="0" src="<?php echo $propertyTemplate->getMapFrameSrc();?>">
					</iframe>
				</div><?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br />
				<br />
				<br />
				<span class="contact-info-sec">T&nbsp;&nbsp;</span> <?php echo $property->getPhone()?><br />
				<span class="contact-info-sec">T&nbsp;&nbsp;</span>	<?php echo $property->getEmail()?><br />
				<br />
				<?php echo nl2br($property->getHours())?>
				
				</div>
			</div>

		</div>
	</div>
</div>

<?php slot('addresstop') ?>
<div class="header_bluebanner">
	<div class="header_bluebanner_params">
	<?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> | <strong><?php echo $property->getPhone()?></strong>
	</div>
</div>
<?php end_slot() ?>
<?php slot('addressfoot') ?>
<div class="footer_left_info">
	<?php echo $property->getAddress()?><br />
	<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
	<span class="footer_left_info_blue"><?php echo $property->getPhone()?></span>
</div>
<?php end_slot() ?>
<?php slot('logo') ?>
<div class="logos_container">
	<div class="logos_logo"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/jsp_logo_top.png" /></a></div>
	<div class="logos_location"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/jsp_logo_top_sandy.png" /></a></div>
</div>
<?php end_slot() ?>
