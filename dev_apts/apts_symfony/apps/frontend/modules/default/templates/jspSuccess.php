<!-- Content:start -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">
			<!-- text: start -->
			<div class="content_intro_text">
				<div class="content_intro_title"><?php echo nl2br($propertyTemplate->getWelcome()); ?></div>
			</div>
			<div class="content_intro_desc">
				<?php echo nl2br($propertyTemplate->getDescription()); ?>
			</div>
			<!-- text: end -->

			<!-- feature boxes: start -->
			<div class="home_feature_container">

				<!-- feature: start -->
				<div class="home_feature">
					<div class="home_feature_top"></div>
					<div class="home_feature_repy">
						<div class="home_feature_params">
							<div class="homefeature_floorplan_shell">
								<div class="homefeature_icon">
									<img src="/images/jsp/jsp_homeicon_floorplan.png" />
								</div>
								<img src="/uploads/photos/258/<?php echo $arrhomePhotos[0];?>" class="homefeature_floorplan" />
							</div>
							<div class="homefeature_title">
								FLOORPLANS
							</div>
							<!--div class="homefeature_subtitle">
								 Lorem ipsum et nunca
							</div-->
							<div class="homefeature_desc">
								 <?php echo nl2br($propertyTemplate->getAcaciaHome1Desc()); ?>
							</div>
							<div class="homefeature_link">
								<a href="<?php echo url_for("floorplans/index")?>" class="homefeature_link_a">View More +</a>
							</div>
						</div>
					</div>
					<div class="home_feature_bottom"></div>
				</div>
				<!-- feature: end -->

				<!-- feature: start -->
				<div class="home_feature">
					<div class="home_feature_top"></div>
					<div class="home_feature_repy">
						<div class="home_feature_params">
							<div class="homefeature_photo_shell">
								<div class="homefeature_icon">
									<img src="/images/jsp/jsp_homeicon_photos.png" />
								</div>
								<img src="/uploads/photos/258/<?php echo $arrhomePhotos[1];?>" class="homefeature_photo" />
							</div>
							<div class="homefeature_title">
								PHOTOS
							</div>
							<!--div class="homefeature_subtitle">
								 Lorem ipsum et nunca
							</div-->
							<div class="homefeature_desc">
								 <?php echo nl2br($propertyTemplate->getAcaciaHome2Desc()); ?>
							</div>
							<div class="homefeature_link">
								<a href="<?php echo url_for("photos/index")?>" class="homefeature_link_a">View More +</a>
							</div>
						</div>
					</div>
					<div class="home_feature_bottom"></div>
				</div>
				<!-- feature: end -->

				<!-- feature: start -->
				<div class="home_feature no_feature_margin">
					<div class="home_feature_top"></div>
					<div class="home_feature_repy">
						<div class="home_feature_params">
							<div class="homefeature_photo_shell">
								<div class="homefeature_icon">
									<img src="/images/jsp/jsp_homeicon_amenities.png" />
								</div>
								<img src="/uploads/photos/258/<?php echo $arrhomePhotos[2];?>" class="homefeature_photo" />
							</div>
							<div class="homefeature_title">
								AMENITIES
							</div>
							<!--div class="homefeature_subtitle">
								 Lorem ipsum et nunca
							</div-->
							<div class="homefeature_desc">
								 <?php echo nl2br($propertyTemplate->getAcaciaHome3Desc()); ?>
							</div>
							<div class="homefeature_link">
								<a href="<?php echo url_for("features/index")?>" class="homefeature_link_a">View More +</a>
							</div>
						</div>
					</div>
					<div class="home_feature_bottom"></div>
				</div>
				<!-- feature: end -->

			</div>
			<!-- feature boxes: start -->
		</div>
	</div>
</div>
<!-- Content:end -->
<?php slot('slider') ?>
<div id="slider" class="nivoSlider theme-default">
	<img src="/images/jsp/<?php echo $property->getCode()?>/slide1.jpg" alt="" title="Welcome Home."/>
	<img src="/images/jsp/<?php echo $property->getCode()?>/slide2.jpg" alt="" title="Confort & Style." />
	<img src="/images/jsp/<?php echo $property->getCode()?>/slide3.jpg" alt="" title="Stay Awhile." />
	<?php /*
	<div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_1.jpg') no-repeat center !important;"></div>
	<div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_2.jpg') no-repeat center !important;"></div>
	<div class="banner_home_wide_slide" style="background:url('/images/acacia/<?php echo $property->getCode()?>/home_banner_large_3.jpg') no-repeat center !important;"></div>
	*/?>
</div>
<?php end_slot() ?>

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

<?php /*

<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">

			<div class="page_title_shell">
				<div style="width:260px;" class="page_title_params">
					<?php echo nl2br($propertyTemplate->getWelcome()); ?>
				</div>
			</div>

			<div class="content_description">
				<?php echo nl2br($propertyTemplate->getDescription()); ?>
			</div>

			<div class="divider_item"></div>

			<div class="homephotos">
				<div class="homephotos_left">
					<div class="homephotos_left_content">
					<span class="homephotos_left_title">PHOTO GALLERY</span><br /><br />
					Designed with modern interiors and lush surroundings.
					</div>

					<div class="homephotos_description_link">
						<a href="<?php echo url_for("photos/index")?>" class="link_learnmore">
						<span class="homephotos_description_plus">+&nbsp;&nbsp;</span>VIEW MORE
						</a>
					</div>
				</div>
				<?php $photocnt = 0;
				foreach($acaciahomePhotos as $photo):
				//print_r($photo);
				$photocnt++;?>
				<?php if($photocnt == 1):?>
				<div class="homephotos_thumb_left">
					<div style="homephotos_thumb_photo">
						<a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" width="225" border="0" /></a>
					</div>
					<div class="homephotos_description"><?php echo $photo->getName()?></div>
				</div>
				<?php endif;?>
				<?php if($photocnt == 2):?>
				<div class="homephotos_thumb_middle">
					<div style="homephotos_thumb_photo">
						<a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" width="225" border="0" /></a>
					</div>
					<div class="homephotos_description"><?php echo $photo->getName()?></div>
				</div>
				<?php endif;?>
				<?php if($photocnt == 3):?>
				<div class="homephotos_thumb_right">
					<div style="homephotos_thumb_photo">
						<a href="<?php echo url_for('photos/index')?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" width="225" border="0" /></s>
					</div>
					<div class="homephotos_description"><?php echo $photo->getName()?></div>
				</div>
				<?php endif;?>
				<?php endforeach;?>
			</div>

			<div class="divider_item"></div>

			<!-- homegroup -->
			<div class="homegroup">

				<!-- homegroup item: Features -->
				<div class="homegroup_item">
					<div class="homegroup_top">
						<div class="homegroup_top_inner">

							<div class="homegroup_top_icon">
								<img src="/images/acacia/icon_features.png" />
							</div>
							<div class="homegroup_top_item">
								FEATURES
							</div>

						</div>

					</div>

					<div class="homegroup_bottom">
						<div class="homegroup_bottom_text">
							<?php echo nl2br($propertyTemplate->getAcaciaHome1Desc()); ?>
						</div>
						<div class="homegroup_bottom_link">
							<a href="<?php echo url_for("features/index")?>" class="link_learnmore"><span class="homegroup_bottom_plus">+&nbsp;&nbsp;</span>LEARN MORE</a>
						</div>
					</div>

				</div>

				<!-- homegroup item: Floor Plans -->
				<div class="homegroup_item">
					<div class="homegroup_top">
						<div class="homegroup_top_inner">

							<div class="homegroup_top_icon">
								<img src="/images/acacia/icon_floorplans.png" />
							</div>
							<div class="homegroup_top_item">
								FLOOR PLANS
							</div>

						</div>

					</div>

					<div class="homegroup_bottom">
						<div class="homegroup_bottom_text">
							<?php echo nl2br($propertyTemplate->getAcaciaHome2Desc()); ?>
						</div>
						<div class="homegroup_bottom_link">
							<a href="<?php echo url_for("floorplans/index")?>" class="link_learnmore"><span class="homegroup_bottom_plus">+&nbsp;&nbsp;</span>LEARN MORE</a>
						</div>
					</div>

				</div>

				<!-- homegroup item: Community -->
				<div class="homegroup_item no_r_margin">
					<div class="homegroup_top">
						<div class="homegroup_top_inner">

							<div class="homegroup_top_icon">
								<img src="/images/acacia/icon_community.png" />
							</div>
							<div class="homegroup_top_item">
								COMMUNITY
							</div>

						</div>

					</div>

					<div class="homegroup_bottom">
						<div class="homegroup_bottom_text">
							<?php echo nl2br($propertyTemplate->getAcaciaHome3Desc()); ?>
						</div>
						<div class="homegroup_bottom_link">
							<a href="<?php echo url_for("community/index")?>" class="link_learnmore"><span class="homegroup_bottom_plus">+&nbsp;&nbsp;</span>LEARN MORE</a>
						</div>
					</div>

				</div>

			</div>
			<!-- end: homegroup -->


		</div>
	</div>
</div>
<?php slot('logo') ?>
<div class="logo_container">
	<div class="logo_params">
		<a href="<?php echo url_for("default/index")?>"><img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
	</div>
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

*/?>
