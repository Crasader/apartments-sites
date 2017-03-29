<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_residents.jpg" />
</div>
<!-- banner:end -->

<!-- Content -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">

			<div class="page_title_shell">
			<div style="width:100%;" class="page_title_params_secondary">
				MAINTENANCE REQUEST
			</div>
			</div>
      <?php if ($sf_user->hasFlash('mailsuccess')): ?>
      <div class="res-left1020">
        <div id="bold14f"> <span class="color14b"><?php echo $sf_user->getFlash('mailsuccess') ?></span> </div>
      </div>
      <?php else: ?>

			<!-- form start -->
			<div class="workorder_ct">
        <div class="workorder">
        <?php if($form->hasErrors()): ?>
        <div class="res-left1020" style="color: red;">
        <strong>Form Error:</strong>
          <ul>
            <?php foreach($form as $formField): ?>
            <?php if($formField->hasError()): ?>
            <?php echo $formField->renderError();?>
            <?php endif; ?>
            <?php endforeach;?>
          </ul>
        </div>
        <?php endif; ?>
        <form action="<?php echo url_for('residents/maintenance'); ?>" method="post">
        <table class="workorder_table">
          <tbody>
            <tr>
              <td><label for="aptnum">Unit Number:</label></td>

              <td><?php echo $form['unit']->render(array('size' => '5')); ?></td>
            </tr>

            <tr>
              <td><label for="phone">Contact Phone:</label></td>
              <td><?php echo $form['phone']->render(array('size' => '20')); ?></td>
            </tr>

            <tr>
              <td><label for="name">Permission To Enter Given By:</label></td>
              <td><?php echo $form['name']->render(array('size' => '40')); ?></td>
            </tr>

            <tr>
              <td><label for="PermissionToEnterDate">Permission To Enter Date (mm/dd/yy):</label></td>
              <td><?php echo $form['date']->render(array('size' => '40')); ?></td>
            </tr>

            <tr>
              <td><label for="mtype">Work Order Category:</label></td>
              <td><?php echo $form['mtype']->render(array('size' => '5')); ?></td>
            </tr>


            <tr>
              <td><label for="mrequest">Describe the Problem:</label></td>
              <td><?php echo $form['mrequest']->render(array('cols' => '40','rows' => '10')); ?></td>
            </tr>


            <tr>
              <td>
                  <input name="Submit" value="Submit" type="submit" class="form-button"  />
              </td>
              <td>
              </td>
            </tr>

          </tbody>
        </table>
        </form>
      </div>
      </div>
		<!-- form end -->
    <?php endif;?>

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
