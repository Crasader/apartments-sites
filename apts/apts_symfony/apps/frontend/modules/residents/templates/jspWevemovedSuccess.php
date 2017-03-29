<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_contact.jpg" />
</div>
<!-- banner:end -->

<!-- Content -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">

			<div class="page_title_shell">
				<div style="width:100%;" class="page_title_params_secondary">Resident's Center
				</div>
			</div>

			<div class="content_secondary">
			  <div id="res-maintenance">
      <div class="bold14f">Send a "We've Moved" Notice</div>
    <div class="res-left10">
      Let everyone know that you've moved into a great new apartment!<br />
Select a picture, write your message and add up to 10 Recipients. We take care of the rest.<br />
      <br />
      <?php if ($sf_user->hasFlash('movedmailsuccess')): ?>
      <span class="title"><?php echo $sf_user->getFlash('movedmailsuccess') ?></span>
      <?php if ($sf_user->hasFlash('movedmailsuccesslist')): ?>
      <?php echo $sf_user->getFlash('movedmailsuccesslist') ?>
      <?php endif ?>
   <?php else: ?>
   
   
     <form action="<?php echo url_for('residents/wevemoved'); ?>" method="post" enctype="multipart/form-data">
     <?php if($form->hasErrors()): ?>
     <div class="contact-form-row">
     <ul>
     <?php foreach($form as $formField): ?>
     <?php if($formField->hasError()): ?>
     <li><?php echo $formField->renderError();?></li>
     <?php endif; ?>
     <?php endforeach;?>
     </ul>
     </div>
     <?php endif; ?>
      <div class="res-form-row">
        <div class="res-form-txt"><span class="red">*</span>Image:</div>
        <div class="res-form-field"><?php echo $form['file']->render(array('size' => '20')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt"><span class="red">*</span>Message:</div>
        <div class="res-form-field"><?php echo $form['notes'] ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">Recipients:</div>
        <div class="res-form-field"><?php echo $form['email1']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email2']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email3']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email4']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email5']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email6']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email7']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email8']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-row">
        <div class="res-form-txt">&nbsp;</div>
        <div class="res-form-field"><?php echo $form['email9']->render(array('size' => '24')) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['email10']->render(array('size' => '24')) ?></div>
      </div>
      <div class="res-form-txt">&nbsp;</div>
      <div class="res-form-field"><input name="submit" type="submit" value="Submit" /></div>
    </form>
    <?php endif;?>
    </div>
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
	<a href="<?php echo url_for('contact/index')?>" class="footerlink"><?php echo $property->getEmail()?></a><br />
	Office Hours:<br /><?php echo nl2br($property->getHours())?>
</div>
<?php end_slot() ?>
<?php slot('logo') ?>
<div class="logos_container">
	<div class="logos_logo"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/<?php echo $property->getCode()?>/logo_top.png" /></a></div>
	<!--div class="logos_location"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/jsp_logo_top_sandy.png" /></a></div-->
</div>
<?php end_slot() ?>
<?php slot('logofoot') ?>
<?php echo $property->getName()?>
<?php end_slot() ?>
<?php slot('nav') ?>
<div class="topnav_container_params" style="margin-top:3px;">
<?php if($propertyTemplate->getCustomPageName() != ''):?>
  <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>" class="nav_item"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="nav_item">RENTAL APPLICATION PDF</a>
  <?php endif;?>
<?php else:?>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="nav_item">RENTAL APPLICATION PDF</a>
  <?php endif;?>
<?php endif;?>
</div>
<?php end_slot() ?>
<?php slot('bot-nav') ?>
<?php if($propertyTemplate->getCustomPageName() != ''):?>
<a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>" class="footerlink"><?php echo $propertyTemplate->getCustomPageName()?></a><br />
<?php endif;?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
  <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="footerlink">Online Rental Application</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
  <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="footerlink">Rental Application PDF</a>
<?php endif;?>
<?php end_slot() ?>
<?php slot('social') ?>
<div class="footer_left_facebook">
<?php foreach($arrSocialUrls as $keySocialURL=>$itemSocialURL):?>
  <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
<?php endforeach;?>
</div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>