<?php /*<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">


			<div class="content_secondary">

				<div class="floorplan_topinfo">
					<div class="floorplan_topinfo_left">
						<div class="floorplan_topinfo_left_params">
							<?php echo nl2br($propertyTemplate->getAcaciaFloorplanDesc())?>
						</div>
					</div>
					<div style="float:left; width:393px;">
						<a href="<?php echo url_for("ebrochure/index")?>" target="_blank"><img src="//images/jsp/acacia/contact-download.png" /></a>
					</div>
				</div>

				<div class="page_title_shell">
					<div style="width:165px;" class="page_title_params_secondary">
						FLOOR PLANS
					</div>

				</div>
				<div style="font-size: small;padding:10px 0">Click a floorplan to enlarge</div>
				<div class="floorplan_grid">
				<?php foreach($property->getPropertyFloorPlans() as $floorplan):?>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox"><img src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<div class="floorplan_item_title_sm"><?php echo $floorplan->getName();?></div>
							<div class="floorplan_item_price"><?php echo $floorplan->getPrice();?></div>
							<?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br />
							<?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
							<small><em>*Prices are subject to change</em></small>
							</div>

						</div>
					</div>
				<?php endforeach;?>
				<?php /*
					<!-- floorplan:A2 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="//images/jsp/acacia/floorplan_a2.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_a2.png" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">A2</span><br /><br />
							1 Bed, 1 Bath<br />
							701 Square Feet<br />
							</div>
							<div class="floorplan_item_price">
								<div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
								<div class="floorplan_rinfo_bottom">
									<a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:B1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="//images/jsp/acacia/floorplan_b1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_b1.png" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">B1</span><br /><br />
							1 Bed, 1 Bath<br />
							701 Square Feet<br />
							</div>
							<div class="floorplan_item_price">
								<div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
								<div class="floorplan_rinfo_bottom">
									<a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:C1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="//images/jsp/acacia/floorplan_c1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_c1.png" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">C1</span><br /><br />
							1 Bed, 1 Bath<br />
							701 Square Feet<br />
							</div>
							<div class="floorplan_item_price">
								<div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
								<div class="floorplan_rinfo_bottom">
									<a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="//images/jsp/acacia/floorplan_a1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_a1.png" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">A1</span><br /><br />
							1 Bed, 1 Bath<br />
							701 Square Feet<br />
							</div>
							<div class="floorplan_item_price">
								<div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
								<div class="floorplan_rinfo_bottom">
									<a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="//images/jsp/acacia/floorplan_a1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_a1.png" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">A1</span><br /><br />
							1 Bed, 1 Bath<br />
							701 Square Feet<br />
							</div>
							<div class="floorplan_item_price">
								<div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
								<div class="floorplan_rinfo_bottom">
									<a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
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
				<a href="<?php echo url_for("default/index")?>"><img src="//images/jsp/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
			</div>
		</div>
		<div class="header_right_container">
			<div class="header_right_inner">
				<div class="header_right_login">
					<a href="<?php echo url_for("residents/login")?>"><img src="//images/jsp/acacia/btn_login.png" border="0" /></a>
				</div>
				<div class="header_right_resident">
					Already a resident?
				</div>
			</div>
			<div class="header_right_nav">
				<div class="header_right_params">
					<a href="<?php echo url_for("floorplans/index")?>" class="nav_item active">FLOOR PLANS</a>
					<a href="<?php echo url_for("photos/index")?>" class="nav_item">PHOTOS</a>
					<a href="<?php echo url_for("features/index")?>" class="nav_item">FEATURES</a>
					<a href="<?php echo url_for("community/index")?>" class="nav_item">COMMUNITY</a>
					<a href="<?php echo url_for("contact/min")?>" class="nav_item">CONTACT</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php end_slot() ?>

<?php slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
	<div class="banner_secondary_inner" style="background:url('//images/jsp/acacia/<?php echo $property->getCode()?>/banner_floorplan.png') "></div>
</div>
<?php end_slot() ?>

<?php slot('logo-grey') ?>
<div class="footer_logo">
	<img src="//images/jsp/acacia/<?php echo $property->getCode()?>/footerlogo.png" />
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

*/?>
<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_floorplan.jpg" />
</div>
<!-- banner:end -->

<!-- Content:start -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">
				<div class="floorplan_topinfo">
					<div class="floorplan_topinfo_left">
						<div class="floorplan_topinfo_left_params">
							<?php echo nl2br($propertyTemplate->getAcaciaFloorplanDesc())?>
						</div>
					</div>
					<div style="float:right; width:405px; margin:0 20px 0 0;">
						<a href="<?php echo url_for("ebrochure/index")?>" target="_blank"><img src="/images/jsp/floorplan-special.png" /></a>
					</div>
				</div>

				<div class="page_title_shell">
				<div style="width:165px; font-family:Arial,Helvetica,sans-serif;" class="page_title_params_sub">
						FLOORPLANS
					</div>
				</div>

				<div class="floorplan_grid">
				<?php foreach($property->getPropertyFloorPlans() as $floorplan):?>
					<!-- floorplan:A2 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox"><img src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" /></a>
						</div>
						<div class="floor-box-text"><?php echo $floorplan->getName();?><br/>
						<span class="italic-georgia-14"><br/>
						<?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br/><?php echo $floorplan->getSquareFeet();?> Sq. Ft.</span></div>
						<div class="floor-box-price"><?php echo $floorplan->getPrice();?></div>
						<div class="download-floorplan"><a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" target="_blank"><img src="/images/jsp/download-floorplan.jpg" width="129" height="24" /></a></div>
						<div class="schedule-floorplan"><a href="<?php echo url_for("contact/index");?>"><img src="/images/jsp/schedule-visit.jpg" width="129" height="24" /></a></div>

						<?php /*<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm"><?php echo $floorplan->getName();?></span>
							<div class="floorplan_item_price"><?php echo $floorplan->getPrice();?></div>
							<?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br />
							<?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
							<small><em>*Prices are subject to change</em></small>
							</div>
						</div>*/?>
					</div>
				<?php endforeach;?>
					<?php /*
					<!-- floorplan:A2 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/jsp/floorplan_2.jpg" rel="lightbox"><img src="/images/jsp/floorplan_2.jpg" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">A2</span>
							<div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
							1 Bed, 1 Bath<br />
							701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
							</div>
						</div>
					</div>

					<!-- floorplan:B1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/jsp/floorplan_3.jpg" rel="lightbox"><img src="/images/jsp/floorplan_3.jpg" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">A2</span>
							<div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
							1 Bed, 1 Bath<br />
							701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
							</div>
						</div>
					</div>

					<!-- floorplan:C1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/jsp/floorplan_4.jpg" rel="lightbox"><img src="/images/jsp/floorplan_4.jpg" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">A2</span>
							<div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
							1 Bed, 1 Bath<br />
							701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
							</div>
						</div>
					</div>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/jsp/floorplan_5.jpg" rel="lightbox"><img src="/images/jsp/floorplan_5.jpg" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm">A2</span>
							<div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
							1 Bed, 1 Bath<br />
							701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
							</div>
						</div>
					</div>
					*/?>

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