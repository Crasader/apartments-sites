<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_contact.jpg" />
</div>
<!-- banner:end -->


<!-- Content:start -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">
			<div class="page_title_shell">
				<div style="width:300px;" class="page_title_params_secondary">
					THE NEIGHBORHOOD
				</div>
			</div>
			
			<div class="content_intro_sub">
				All the convenience of apartment home living in one of the most beautiful locations in all of Salt Lake City. Royal Farms apartments are situated on a hill with a commanding view of the 
				Wasatch Mountains. 
			</div>

			<div class="content_secondary">
			<div style="margin:0 0 0 150px;">
			<div id="contact-map">
				<iframe width="600" height="400" frameborder="0" scrolling="no" marginheight="0"
				marginwidth="0" src="<?php echo $propertyTemplate->getMapFrameSrc();?>">
				</iframe>
			</div>
			</div>
			</div>
			
	
		</div>
	</div>
</div>
<!-- Content:end -->
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