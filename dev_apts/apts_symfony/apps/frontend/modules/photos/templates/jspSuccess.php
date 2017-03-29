<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_gallery.jpg" />
</div>
<!-- banner:end -->


<!-- Content:start -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">
			<!--div class="page_title_shell">
			<div style="width:180px;" class="page_title_params_secondary">
				PHOTO GALLERY
			</div>
			</div-->
		<div id="gallery-gallery">
			<div id="galleria">
				<?php foreach($mainPhotos as $photo):?>
					<img src="/uploads/photos/<?php echo $photo->getImage()?>">
				<?php endforeach;?>
			</div>
			<script>
				Galleria.loadTheme('/js/galleria/themes/classic/galleria.classic.min.js');
				Galleria.run('#galleria');
			</script>
		</div>
	<?php /*<div class="content_secondary">
	<div style="margin-left:77px;">
	<?php foreach($mainPhotos as $photo):?>
		<div class="photo_item"><a href="/uploads/photos/<?php echo $photo->getImage()?>" rel="lightbox" title="<?php echo $photo->getName()?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" /></a></div>
	<?php endforeach;?>
	</div>
	</div>*/?>
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