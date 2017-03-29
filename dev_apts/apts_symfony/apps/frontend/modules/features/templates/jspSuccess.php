<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_amenities.jpg" />
</div>
<!-- banner:end -->


<!-- Content:start -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">
			<div class="page_title_shell">
				<div style="width:100%;" class="page_title_params_secondary">
					DOZENS OF FEATURES
				</div>
			</div>

			<div class="content_intro_sub">
				<?php echo nl2br($propertyTemplate->getAcaciaFeaturesDesc())?>
			</div>

			<div class="content_secondary">
			<div style="margin:0 0 0 150px;">
			<!-- feature: start -->
				<div class="home_feature">
					<div class="home_feature_top"></div>
					<div class="home_feature_repy">
						<div class="home_feature_params">
							<div class="homefeature_photo_shell">
								<div class="homefeature_icon">
									<img src="/images/jsp/jsp_homeicon_paint.png">
								</div>
								<?php if(!empty($arrFeaturePhoto[0])):?>
									<img src="<?php echo $arrFeaturePhoto[0]['path']?>" alt="<?php echo $arrFeaturePhoto[0]['name']?>" class="homefeature_photo" />
								<?php endif;?>
							</div>
							<div class="homefeature_title">
								APARTMENT
							</div>
							<div class="homefeature_inner_sub">
								 features
							</div>
							<div class="homefeature_desc">
								 <ul>
									<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
										<li><?php echo $feature->getApartmentFeature()->getName()?></li>
									<?php endforeach;?>
								</ul>
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
									<img src="/images/jsp/jsp_homeicon_amenities.png">
								</div>
								<?php if(!empty($arrFeaturePhoto[1])):?>
									<img src="<?php echo $arrFeaturePhoto[1]['path']?>" alt="<?php echo $arrFeaturePhoto[1]['name']?>" class="homefeature_photo" />
								<?php endif;?>
							</div>
							<div class="homefeature_title">
								COMMUNITY
							</div>
							<div class="homefeature_inner_sub">
								 features
							</div>
							<div class="homefeature_desc">
								<ul>
								<?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
									<li><?php echo $feature->getCommunityFeature()->getName()?></li>
								<?php endforeach;?>
								</ul>

							</div>
						</div>
					</div>
					<div class="home_feature_bottom"></div>
				</div>
				<!-- feature: end -->
				</div>
			</div>


		</div>
	</div>
</div>
<!-- Content:end -->
<?php /*<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">

			<div class="page_title_shell">
				<div style="width:140px;" class="page_title_params_secondary">
					FEATURES
				</div>
			</div>

			<div class="content_description">
				The secret to finding a place you love is realizing that it's the
				day-to-day experiences, the timesavers and small satisfactions that
				end up mattering most. We provide you with a gratifying number of
				conveniences and benefits; like impeccable service, pristine
				courtyards, a basketball court, fitness center, residences that
				exude charm, and a fabulous location. Take Oscar's advice, "be
				satisfied only with the best."
			</div>

			<div class="content_secondary">

				<div class="feature_container">
					<div class="feature_group_left">
						<div class="feature_photo">
						<?php if(!empty($arrFeaturePhoto[0])):?>
							<img src="<?php echo $arrFeaturePhoto[0]['path']?>" alt="<?php echo $arrFeaturePhoto[0]['name']?>" />
						<?php endif;?>
						</div>
						<div class="feature_content">
							<div class="feature_content_params">
								<div class="feature_title">APARTMENT FEATURES</div>
								<ul>
								<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
									<li><?php echo $feature->getApartmentFeature()->getName()?></li>
								<?php endforeach;?>
								</ul>
							</div>
						</div>
					</div>

					<div class="feature_group_right">
						<div class="feature_photo">
						<?php if(!empty($arrFeaturePhoto[1])):?>
							<img src="<?php echo $arrFeaturePhoto[1]['path']?>" alt="<?php echo $arrFeaturePhoto[1]['name']?>" />
						<?php endif;?>
						</div>
						<div class="feature_content">
							<div class="feature_content_params">
								<div class="feature_title">COMMUNITY FEATURES</div>
								<ul>
									<?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
										<li><?php echo $feature->getCommunityFeature()->getName()?></li>
									<?php endforeach;?>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>
*/?>
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