<div class="eb_main_params">
	<div class="eb_header"><img src="/images/jsp/banner_ebrochure.jpg" alt="Welcome to comfort and accesibility" title="<?php echo $property->getName();?>" /></div>

	<div class="eb_title_group">
		<div class="eb_title_left">
			<?php echo preg_replace('/http:\/\//','',$property->getURL())?>
		</div><a href="#" onclick="javascript:print()" style=
		"float:right; padding:6px 12px; border:1px solid #ccc; text-decoration:none; font-weight:bold;">PRINT</a>
	</div>

	<div class="eb_top_info">
		<div class="eb_top_info_left">
			<div class="eb_top_info_left_inner">
				<?php echo nl2br($propertyTemplate->getAcaciaEbrochureDesc())?>
			</div>
		</div>

		<div class="eb_top_info_right">
			<div class="eb_top_info_right_inner">
				<span class="eb_small_h">ADDRESS</span><br />
				<?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />
				t. <?php echo $property->getPhone()?><br />
				f. <?php echo $property->getFax()?><br />
				e. <?php echo $property->getEmail()?></a><br />

				<br />
				<span class="eb_small_h">DIRECTIONS</span><br />
				<?php echo $property->getDirections()?><br /><br />
				<span class="eb_small_h">OFFICE HOURS</span><br />
				<?php echo nl2br($property->getHours())?> <br />
			</div>
		</div>
	</div>

	<div class="eb_feature_title">
		<div class="eb_title_param">
			Features
		</div>
	</div>

	<div class="eb_feature_cont">
		<div class="eb_feature_image">
		<?php /*<img src="/images/jsp/photo2.jpg" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
		*/?>
		<img src="<?php echo $arrFeaturePhoto[0]['path']?>" alt="<?php echo $arrFeaturePhoto[0]['name']?>" title="<?php echo $arrFeaturePhoto[0]['name']?>" class="homefeature_photo" />
		</div>

		<div class="eb_feature_item">
			<span class="eb_small_hc">COMMUNITY FEATURES</span><br />
			<?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
				<?php echo $feature->getCommunityFeature()->getName()?><br />
			<?php endforeach;?>
		</div>

		<div class="eb_feature_item">
			<span class="eb_small_hc">INTERIOR FEATURES</span><br />
			<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
				<?php echo $feature->getApartmentFeature()->getName()?><br />
			<?php endforeach;?>
		</div>
	</div>

	<div class="eb_floorplan_title">
		<div class="eb_title_param">
			Floorplans
		</div>
	</div><!-- row floorplan -->

	<div class="eb_floorplan_row">
	<?php
	 $fpcount=0;
	 foreach($property->getPropertyFloorPlans() as $floorplan):
	 $fpcount++;
	 ?>
	 <div class="eb_floorplan_item">
			<div class="eb_floorplan_image"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" title="<?php echo $floorplan->getName();?>" border="0" /></div>
			<div class="eb_floorplan_content">
				<div class="eb_floorplan_params">
					<div class="eb_floorplan_title_sm"><?php echo $floorplan->getName();?></div>
					<div class="eb_floorplan_price"><?php echo $floorplan->getPrice();?></div>
					<?php echo $floorplan->getBedrooms();?> Bed, <?php echo $floorplan->getBathrooms();?> Bath<br />
					<?php echo $floorplan->getSquareFeet();?> Square Feet<br />
					<small>
					<em>*Prices are subject to change</em>
					</small>
				</div>
			</div>
	 </div>
	 <?php if($fpcount % 3 == 0 && $property->countPropertyFloorplans() > $fpcount):?>
	 </div><div class="eb_floorplan_row ">
	 <?php endif;?>
	 <?php endforeach;?>

	<?php /*
		<div class="eb_floorplan_item">
			<div class="eb_floorplan_image"><img src="/images/jsp/floorplan_1.jpg" alt="A1"
			title="A1" border="0" /></div>

			<div class="eb_floorplan_content">
				<div class="eb_floorplan_params">
					<div class="eb_floorplan_title_sm">
						A1
					</div>

					<div class="eb_floorplan_price">
						$635
					</div>1 Bed, 1 Bath<br />
					512 Square Feet<br />
					<small><em>*Prices are subject to change</em></small>
				</div>
			</div>
		</div>

		<div class="eb_floorplan_item">
			<div class="eb_floorplan_image"><img src="/images/jsp/floorplan_2.jpg" alt="A2"
			title="A2" border="0" /></div>

			<div class="eb_floorplan_content">
				<div class="eb_floorplan_params">
					<div class="eb_floorplan_title_sm">
						A2
					</div>

					<div class="eb_floorplan_price">
						$675
					</div>1 Bed, 1 Bath<br />
					684 Square Feet<br />
					<small><em>*Prices are subject to change</em></small>
				</div>
			</div>
		</div>

		<div class="eb_floorplan_item">
			<div class="eb_floorplan_image"><img src="/images/jsp/floorplan_3.jpg" alt="B1"
			title="B1" border="0" /></div>

			<div class="eb_floorplan_content">
				<div class="eb_floorplan_params">
					<div class="eb_floorplan_title_sm">
						B1
					</div>

					<div class="eb_floorplan_price">
						$750
					</div>2 Bed, 1 Bath<br />
					864 Square Feet<br />
					<small><em>*Prices are subject to change</em></small>
				</div>
			</div>
		</div>
	</div>

	<div class="eb_floorplan_row">
		<div class="eb_floorplan_item">
			<div class="eb_floorplan_image"><img src="/images/jsp/floorplan_4.jpg" alt="C1"
			title="C1" border="0" /></div>

			<div class="eb_floorplan_content">
				<div class="eb_floorplan_params">
					<div class="eb_floorplan_title_sm">
						C1
					</div>

					<div class="eb_floorplan_price">
						$800
					</div>2 Bed, 2 Bath<br />
					948 Square Feet<br />
					<small><em>*Prices are subject to change</em></small>
				</div>
			</div>
		</div>

<div class="eb_floorplan_item">
			<div class="eb_floorplan_image"><img src="/images/jsp/floorplan_5.jpg" alt="C1"
			title="C1" border="0" /></div>

			<div class="eb_floorplan_content">
				<div class="eb_floorplan_params">
					<div class="eb_floorplan_title_sm">
						C1
					</div>

					<div class="eb_floorplan_price">
						$800
					</div>2 Bed, 2 Bath<br />
					948 Square Feet<br />
					<small><em>*Prices are subject to change</em></small>
				</div>
			</div>
		</div>*/?>
	</div><!-- end row floorplan -->

	<div class="eb_bottom_info_title">
		<div class="eb_title_param"><?php echo $property->getName()?></div>
	</div>

	<div class="eb_bottom_info_cont">
		<div class="eb_bottom_info_left">
			<span class="eb_small_h">ADDRESS</span><br />
			<?php echo $property->getAddress()?><br />
			<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />
			t. <?php echo $property->getPhone()?><br />
			f. <?php echo $property->getFax()?><br />
			e. <?php echo $property->getEmail()?></a><br />
		</div>

		<div class="eb_bottom_info_mid">
			<span class="eb_small_h">DIRECTIONS</span><br />
			<?php echo $property->getDirections()?>
		</div>

		<div class="eb_bottom_info_right">
			<span class="eb_small_h">OFFICE HOURS</span><br />
			<?php echo nl2br($property->getHours())?> <br />
		</div>
	</div>
</div>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>

<?php /*			<div class="eb_main_params">

          <div class="eb_header">
		  <img src="//images/jsp/acacia/<?php echo $property->getCode()?>/logo.png" alt="Welcome to comfort and accesibility"/>
			  <a href="#" onclick="javascript:print()"style="float:right; padding:6px 12px; border:1px solid #ccc; text-decoration:none; font-weight:bold;">PRINT</a>
		  </div>

          <div class="eb_title_group">
            <div class="eb_title_left"><?php echo preg_replace('/http:\/\//','',$property->getURL())?></div>
          </div>

          <div class="eb_top_info">
              <div class="eb_top_info_left">
                  <div class="eb_top_info_left_inner">
                    <?php echo nl2br($propertyTemplate->getAcaciaEbrochureDesc())?>
                  </div>
              </div>
              <div class="eb_top_info_right">
                <div class="eb_top_info_right_inner">
                    <span class="eb_small_h">ADDRESS</span><br />
                    <?php echo $property->getAddress()?><br />
                    <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />
                    t. <?php echo $property->getPhone()?><br />
                    f. <?php echo $property->getFax()?><br />
					<a href="<?php echo $property->getURL()?>"><?php echo preg_replace('/http:\/\//','',$property->getURL())?></a><br /><br />

                    <span class="eb_small_h">DIRECTIONS</span><br />
                    <?php echo $property->getDirections()?><br /><br />

                    <span class="eb_small_h">OFFICE HOURS</span><br />
                    <?php echo nl2br($property->getHours())?> <br />
                </div>
              </div>
          </div>

          <div class="eb_feature_title">
            <div class="eb_title_param">Features</div>
          </div>

          <div class="eb_feature_cont">
             <div class="eb_feature_image"><img src="//images/jsp/acacia/feature.jpg" /></div>
             <div class="eb_feature_item">
                <span class="eb_small_h">COMMUNITY FEATURES</span><br />
                <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
									<?php echo $feature->getCommunityFeature()->getName()?><br />
								<?php endforeach;?>
						 </div>
             <div class="eb_feature_item">
                <span class="eb_small_h">INTERIOR FEATURES</span><br />
                <?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
									<?php echo $feature->getApartmentFeature()->getName()?><br />
								<?php endforeach;?>
						 </div>
                <?php /*Resort style pool and spa<br />
                Barbeque Deck<br />
                Fitness Center<br />
                Yoga/Pilates Studio<br />
                Controlled Access<br />
                24-hour attended front desk<br />
                Pet friendly<br />
                Controlled Access<br />
                24-hour attended front desk<br />
                Pet friendly<br />
             </div>
             <div class="eb_feature_item">
                <span class="eb_small_h">INTERIOR FEATURES</span><br />

                Resort style pool and spa<br />
                Barbeque Deck<br />
                Fitness Center<br />
                Yoga/Pilates Studio<br />
                Controlled Access<br />
                24-hour attended front desk<br />
                Pet friendly<br />
                Controlled Access<br />
                24-hour attended front desk<br />
                Pet friendly<br />
             </div>
          </div>

          <div class="eb_floorplan_title">
            <div class="eb_title_param">Floorplans</div>
          </div>

          <!-- row floorplan -->
          <div class="eb_floorplan_row ">
          	 <?php
          	 $fpcount=0;
          	 foreach($property->getPropertyFloorPlans() as $floorplan):
          	 $fpcount++;
          	 ?>
             <div class="eb_floorplan_item">
                <div class="eb_floorplan_image"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" title="<?php echo $floorplan->getName();?>" border="0" /></div>
                <div class="eb_floorplan_content">
									<div class="eb_floorplan_params">
										<div class="eb_floorplan_title_sm"><?php echo $floorplan->getName();?></div>
										<div class="eb_floorplan_price"><?php echo $floorplan->getPrice();?></div>
										<?php echo $floorplan->getBedrooms();?> Bed, <?php echo $floorplan->getBathrooms();?> Bath<br />
										<?php echo $floorplan->getSquareFeet();?> Square Feet<br />
										<small>
										<em>*Prices are subject to change</em>
										</small>
									</div>
                </div>
             </div>
             <?php if($fpcount % 3 == 0 && $property->countPropertyFloorplans() > $fpcount):?>
             </div><div class="eb_floorplan_row ">
             <?php endif;?>
             <?php endforeach;?>
             <?php /*
             <div class="eb_floorplan_item">
                <div class="eb_floorplan_image"><img src="//images/jsp/acacia/floorplan_a2.png"></div>
                <div class="eb_floorplan_content">
                <div class="eb_floorplan_params">
                <span class="eb_floorplan_title_sm">A2</span><br /><br />

                1 Bed, 1 Bath<br />
                701 Square Feet<br />
                </div>
                <div class="eb_floorplan_price"><span class="eb_floorplan_small">$</span>750</div>

                </div>
             </div>

             <div class="eb_floorplan_item">
                <div class="eb_floorplan_image"><img src="//images/jsp/acacia/floorplan_b1.png"></div>
                <div class="eb_floorplan_content">
                <div class="eb_floorplan_params">
                <span class="eb_floorplan_title_sm">B1</span><br /><br />

                1 Bed, 1 Bath<br />
                701 Square Feet<br />
                </div>
                <div class="eb_floorplan_price"><span class="eb_floorplan_small">$</span>750</div>

                </div>
             </div>

          </div>
          <!-- end row floorplan -->

          <!-- row floorplan -->
          <div class="eb_floorplan_row ">

             <div class="eb_floorplan_item">
                <div class="eb_floorplan_image"><img src="//images/jsp/acacia/floorplan_c1.png"></div>
                <div class="eb_floorplan_content">
                <div class="eb_floorplan_params">
                <span class="eb_floorplan_title_sm">C1</span><br /><br />

                1 Bed, 1 Bath<br />
                701 Square Feet<br />
                </div>
                <div class="eb_floorplan_price"><span class="eb_floorplan_small">$</span>750</div>

                </div>
             </div>

             <div class="eb_floorplan_item">
                <div class="eb_floorplan_image"><img src="//images/jsp/acacia/floorplan_a1.png"></div>
                <div class="eb_floorplan_content">
                <div class="eb_floorplan_params">
                <span class="eb_floorplan_title_sm">A1</span><br /><br />

                1 Bed, 1 Bath<br />
                701 Square Feet<br />
                </div>
                <div class="eb_floorplan_price"><span class="eb_floorplan_small">$</span>750</div>

                </div>
             </div>

             <div class="eb_floorplan_item">
                <div class="eb_floorplan_image"><img src="//images/jsp/acacia/floorplan_a1.png"></div>
                <div class="eb_floorplan_content">
                <div class="eb_floorplan_params">
                <span class="eb_floorplan_title_sm">A1</span><br /><br />

                1 Bed, 1 Bath<br />
                701 Square Feet<br />
                </div>
                <div class="eb_floorplan_price"><span class="eb_floorplan_small">$</span>750</div>

                </div>
             </div>

          </div>
          <!-- end row floorplan -->

          <div class="eb_bottom_info_title">
            <div class="eb_title_param"><?php echo $property->getName()?></div>
          </div>

          <div class="eb_bottom_info_cont">
             <div class="eb_bottom_info_left">
                    <span class="eb_small_h">ADDRESS</span><br />
                    <?php echo $property->getAddress()?><br />
                    <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />
                    t. <?php echo $property->getPhone()?><br />
                    f. <?php echo $property->getFax()?><br />
					<a href="<?php echo $property->getURL()?>"><?php echo preg_replace('/http:\/\//','',$property->getURL())?></a><br /><br />
             </div>
             <div class="eb_bottom_info_mid">
                    <span class="eb_small_h">DIRECTIONS</span><br />
                    <?php echo $property->getDirections()?>
             </div>
             <div class="eb_bottom_info_right">
                    <span class="eb_small_h">OFFICE HOURS</span><br />
                    <?php echo nl2br($property->getHours())?> <br />
             </div>
          </div>

      </div>

<?php /*
<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">


			<div class="content_secondary">

				<div class="floorplan_topinfo">
					<div class="floorplan_topinfo_left">
						<div class="floorplan_topinfo_left_params">
							Select from thoughtfully designed 1 and 2 bedroom
							rental homes crafted to maximize your satisfaction
							with the simple joys of home. Inspired, luxurious
							features, such as spacious light-filled rooms, a bay
							window, full-size washer/dryer, a fireplace and
							walk-in closets adorn the residences of Pheasant Run.
						</div>
					</div>
					<div style="float:left; width:393px;">
						<a href="ebrochure.html" target="_blank"><img src="///images/jsp/acacia/acacia/floorplan-special.png" /></a>
					</div>
				</div>

				<div class="page_title_shell">
					<div style="width:165px;" class="page_title_params_secondary">
						FLOOR PLANS
					</div>
				</div>

				<div class="floorplan_grid">
				<?php foreach($property->getPropertyFloorPlans() as $floorplan):?>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox"><img src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" /></a>
						</div>
						<div class="floorplan_item_info">
							<div class="floorplan_item_params">
							<span class="floorplan_item_title_sm"><?php echo $floorplan->getName();?></span><br /><br />
							<?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br />
							<?php echo $floorplan->getSquareFeet();?> Sq. Ft.
							</div>
							<div class="floorplan_item_price">
								<div class="floorplan_rinfo_top"><?php echo $floorplan->getPrice();?></div>
								<?/*<div class="floorplan_rinfo_bottom">
									<a href="#"><img src="///images/jsp/acacia/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
				<?php /*
					<!-- floorplan:A2 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="///images/jsp/acacia/acacia/floorplan_a2.png" rel="lightbox"><img src="///images/jsp/acacia/acacia/floorplan_a2.png" /></a>
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
									<a href="#"><img src="///images/jsp/acacia/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:B1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="///images/jsp/acacia/acacia/floorplan_b1.png" rel="lightbox"><img src="///images/jsp/acacia/acacia/floorplan_b1.png" /></a>
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
									<a href="#"><img src="///images/jsp/acacia/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:C1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="///images/jsp/acacia/acacia/floorplan_c1.png" rel="lightbox"><img src="///images/jsp/acacia/acacia/floorplan_c1.png" /></a>
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
									<a href="#"><img src="///images/jsp/acacia/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="///images/jsp/acacia/acacia/floorplan_a1.png" rel="lightbox"><img src="///images/jsp/acacia/acacia/floorplan_a1.png" /></a>
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
									<a href="#"><img src="///images/jsp/acacia/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="///images/jsp/acacia/acacia/floorplan_a1.png" rel="lightbox"><img src="///images/jsp/acacia/acacia/floorplan_a1.png" /></a>
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
									<a href="#"><img src="///images/jsp/acacia/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>





				</div>

			</div>

		</div>
	</div>
</div>

<?php /*slot('header') ?>
<!-- Header -->
<div class="header_outter">
	<div class="header_inner">
		<div class="logo_container">
			<div class="logo_params">
				<a href="<?php echo url_for("default/index")?>"><img src="///images/jsp/acacia/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
			</div>
		</div>
		<div class="header_right_container">
			<div class="header_right_inner">
				<div class="header_right_login">
					<a href="<?php echo url_for("residents/login")?>"><img src="///images/jsp/acacia/acacia/btn_login.png" border="0" /></a>
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
					<a href="<?php echo url_for("contact/index")?>" class="nav_item">CONTACT</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php end_slot()

<?php /*slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
	<div class="banner_secondary_inner" style="background:url('///images/jsp/acacia/acacia/banner_floorplan.png') "></div>
</div>
<?php end_slot()

<?php slot('logo-grey') ?>
<div class="footer_logo">
	<img src="///images/jsp/acacia/acacia/<?php echo $property->getCode()?>/footerlogo.png" />
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
<?php echo $property->getEmail()?><br />
</div>
<?php end_slot() ?>
*/?>