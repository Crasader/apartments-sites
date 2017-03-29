<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">

			<div class="page_title_shell">
				<div style="width:140px;" class="page_title_params_secondary">
					FEATURES
				</div>
			</div>

			<div class="content_description">
				<?php echo nl2br($propertyTemplate->getAcaciaFeaturesDesc())?>
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
<?php /*<div id="banner-gray">
<div id="banner2"><img src="/images/acacia/banner-features.png" width="1024" height="257" /></div>
</div><!-- end of banner-gray -->

<div id="white-fill">
<div id="wrap-top">
  <div id="middle">

  	<div id="features-left">
      <div class="color14">Description</div>
      <div class="txt-left10"><?php echo nl2br($property->getDescription())?></div>
      <div class="color14">Floor Plans</div>
      <?php foreach($property->getPropertyFloorPlans() as $floorplan):?>
      <div class="features-floorplan">
      	<?php if($floorplan->getImage()):?>
        <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" target="_blank"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" title="<?php echo $floorplan->getName();?>" border="0" /></a>
        <?php endif;?>
      	<strong><?php echo $floorplan->getName();?></strong><br />
        <?php echo $floorplan->getBedrooms();?> Bedroom(s), <?php echo $floorplan->getBathrooms();?> Bath<br />
        <?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
        Rent: <?php echo $floorplan->getPrice();?><br />
        Lease: <?php echo $floorplan->getLeaseTerm();?><br />
        Deposit: <?php echo $floorplan->getDeposit();?>
      </div>
      <?php endforeach;?>
    </div>
    <div  id="features-right">
    	<div class="color14">Location</div>
      <div class="txt-left10">
        <?php echo $property->getAddress()?><br />
        <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br />
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
      <div class="color14">Office Hours</div>
      <div class="txt-left10">
		<?php echo nl2br($property->getHours())?>
      </div>
      <div class="color14">Apartment Features</div>
      <div class="txt-left10">
      	<ul>
      	<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
          <li><?php echo $feature->getApartmentFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
      <div class="color14">Community Features</div>
      <div class="txt-left10">
      	<ul>
        <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
          <li><?php echo $feature->getCommunityFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
      <div class="color14">Other Services And Features</div>
      <div class="txt-left10">
      	<ul>
      	<?php foreach($property->getPropertyOtherFeatures() as $feature):?>
          <li><?php echo $feature->getOtherFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
    </div>

  <?php /*<div id="line-half1"></div>
  <div id="feature-title">FEATURES</div>
  <div id="line-half2"></div>



    <div id="features-intro">Behold stunning studio, one- and two-bedroom homes with <br />
gleaming hardwood floors. Imagine dazzling granite countertops, <br />
elegant cherry cabinetry, and sparkling stainless steel appliances <br />
that welcome you as you enter your home. </div>
    <div id="features-apt">
    <img src="/images/acacia/feature1.png" width="419" height="209" />
    <div id="feature-list1">
<span class="feature-header">APARTMENT FEATURES</span><br /><br /><br />
    <span class="green">+</span> Wolf appliances <br />
      <span class="green">+ </span>Stainless steel fridge and oven.<br />
      <span class="green">+ </span>Two toned paint.<br />
      <span class="green">+</span> Designed with modern interiors and lush surroundings.<br />
      <span class="green">+</span> 18” tile in entire apartment.<br />
      <span class="green">+ </span>Hardwood floor options<br />
      <span class="green">+ </span>Designed with modern interiors and lush surroundings. </div>
      </div><!-- end of feature-list1 -->

      <div id="features-comm"><img src="/images/acacia/feature2.png" width="419" height="209" />
        <div id="feature-list2">
  <span class="feature-header">COMMUNITY FEATURES</span><br /><br /><br />
    <span class="green">+</span> State- of-the-art gym facility.<br />
      <span class="green">+ </span>Community pool<br />
      <span class="green">+ </span>Hot Tub<br />
      <span class="green">+</span> WI-FI Access<br />
      <span class="green">+</span> Community Theater room<br />
      <span class="green">+ </span>Recreation room<br />
      <span class="green">+ </span>Pet Friendly<br />
      <span class="green">+</span> Community Theater room<br />
      <span class="green">+ </span>Recreation room<br />
      </div><!-- end of feature-list2 -->
      </div><!-- end of feature-comm -->
      ?>

  </div><!-- end of middle -->

</div>
</div>
*/?>

<?php slot('header') ?>
<!-- Header -->
<div class="header_outter">
	<div class="header_inner">
		<div class="logo_container">
			<div class="logo_params">
				<a href="<?php echo url_for("default/index")?>"><img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
			</div>
		</div>
		<!-- responsive nav -->
          <div class="header_right_resp">
            <div class="header_right_resp_inner">

              <div class="respnav">

              <a href="#" id="respmenu-icon"><img src="/images/hamburger.png" /></a>

              <ul>
                  <li><a href="/" >HOME</a></li>
                  <li><a href="<?php echo url_for("floorplans/index")?>" >FLOOR PLANS</a></li>
                  <li><a href="<?php echo url_for("photos/index")?>" >PHOTOS</a></li>
                  <li><a href="<?php echo url_for("features/index")?>" >FEATURES</a></li>
                  <li><a href="<?php echo url_for("community/index")?>" >COMMUNITY</a></li>
                  <li><a href="<?php echo url_for("contact/min")?>" >CONTACT</a></li>
                  <li><a href="<?php echo url_for("residents/login")?>" >LOGIN</a></li>
                  <li><a href="https://amcrentpay.com" target="_blank">ONLINE RENT PAY</a></li>
                  <?php if($propertyTemplate->getCustomPageName() != ''):?>
                    <li><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a></li>
                  <?php endif;?>
                  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
                      <li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">RENTAL APPLICATION</a></li>
                      <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
                      <li><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">RENTAL APPLICATION</a></li>
                    <?php endif;?>
              </ul>

              </div>

            </div>
          </div>
          <!-- end responsive nav -->
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
					<a href="<?php echo url_for("features/index")?>" class="nav_item active">FEATURES</a>
					<a href="<?php echo url_for("community/index")?>" class="nav_item">COMMUNITY</a>
					<a href="<?php echo url_for("contact/min")?>" class="nav_item">CONTACT</a>
				</div>
				<div class="header_right_params" style="padding-top:3px;">
				<a href="https://amcrentpay.com" target="_blank" class="nav_item">ONLINE RENT PAY</a>
				<?php if($propertyTemplate->getCustomPageName() != ''):?>
					<a class="nav_item" href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a>
				<?php endif;?>
				<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
            <a class="nav_item" title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">RENTAL APPLICATION</a>
            <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
            <a class="nav_item" title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">RENTAL APPLICATION</a>
        <?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php end_slot() ?>

<?php slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
	<div class="banner_secondary_inner" style="background:url('/images/acacia/<?php echo $property->getCode()?>/banner_features.png') "></div>
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
<a href="<?php echo url_for('contact/min')?>"><?php echo $property->getEmail()?></a><br />
</div>
<?php end_slot() ?>

<?php slot('tracking-code') ?>
	<?php if($propertyTemplate->getTrackingCode()):?>
		<?php echo $propertyTemplate->getTrackingCode()?>
	<?php endif;?>
<?php end_slot() ?>

<?php slot('social-bar') ?>
<!-- Social Bar -->
<div class="social_bar_outter">
	<div class="social_bar_inner">

		<div class="social_bar_params">
			<div class="social_bar_content">
			<?php if($propertyTemplate->getFacebookUrl() != ''):?>
				<?php foreach($arrSocialUrls as $keySocialURL=>$itemSocialURL):?>
				<a href="<?php echo $itemSocialURL?>" class="social_item" title="<?php echo $keySocialURL?>"><img src="/images/acacia/icon_<?php echo $keySocialURL?>.png" alt="<?php echo $keySocialURL?>"/></a>
			<?php endforeach;?>
			<?php endif;?>
			<?php /*
				<a href="#" class="social_item"><img src="/images/acacia/icon_twitter.png" alt=""/></a>
				<a href="#" class="social_item"><img src="/images/acacia/icon_vimeo.png" alt=""/></a>
				<a href="#" class="social_item"><img src="/images/acacia/icon_flickr.png" alt=""/></a>
				<a href="#" class="social_item"><img src="/images/acacia/icon_linkedin.png" alt=""/></a>
				<a href="#" class="social_item"><img src="/images/acacia/icon_youtube.png" alt=""/></a>
				<a href="#" class="social_item"><img src="/images/acacia/icon_google.png" alt=""/></a>
			<?php */?>
			</div>
		</div>

	</div>
</div>
<?php end_slot() ?>
<?php /*
<div id="sec-content">
  <div id="sec-left">
  	<div id="print"><a href="javascript:window.print()"><img src="images/btn-print.gif"></a></div>
  	<span class="title">Features</span><br />
    <br />
    <div id="features-left">
      <div class="color14">Description</div>
      <div class="txt-left10"><?php echo nl2br($property->getDescription())?></div>
      <div class="color14">Floor Plans</div>
      <?php foreach($property->getPropertyFloorPlans() as $floorplan):?>
      <div class="features-floorplan">
      	<?php if($floorplan->getImage()):?>
        <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" target="_blank"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" title="<?php echo $floorplan->getName();?>" border="0" /></a>
        <?php endif;?>
      	<strong><?php echo $floorplan->getName();?></strong><br />
        <?php echo $floorplan->getBedrooms();?> Bedroom(s), <?php echo $floorplan->getBathrooms();?> Bath<br />
        <?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
        Rent: <?php echo $floorplan->getPrice();?><br />
        Lease: <?php echo $floorplan->getLeaseTerm();?><br />
        Deposit: <?php echo $floorplan->getDeposit();?>
      </div>
      <?php endforeach;?>
    </div>
    <div  id="features-right">
    	<div class="color14">Location</div>
      <div class="txt-left10">
        <?php echo $property->getAddress()?><br />
        <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br />
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
      <div class="color14">Office Hours</div>
      <div class="txt-left10">
		<?php echo nl2br($property->getHours())?>
      </div>
      <div class="color14">Apartment Features</div>
      <div class="txt-left10">
      	<ul>
      	<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
          <li><?php echo $feature->getApartmentFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
      <div class="color14">Community Features</div>
      <div class="txt-left10">
      	<ul>
        <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
          <li><?php echo $feature->getCommunityFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
      <div class="color14">Other Services And Features</div>
      <div class="txt-left10">
      	<ul>
      	<?php foreach($property->getPropertyOtherFeatures() as $feature):?>
          <li><?php echo $feature->getOtherFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
    </div>
    <br />
  </div>
  <div class="page-break"></div>
  <div id="right">
  	<div class="right-title">
    	<div class="right-title-txt">Community Photos</div>
    </div>
    <div class="right-txt">
    <?php foreach($featurePhotos as $photo):?>
      <img src="/uploads/photos/177/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" title="<?php echo $photo->getName()?>" border="0" />
    <?php endforeach;?>
    </div>
  </div>
</div>

<?php slot('customstyles') ?>
<?php include_partial('global/customstyles', array('propertyTemplate' => $propertyTemplate)) ?>
<?php end_slot() ?>

<?php slot('chat') ?>
  <?php if($propertyTemplate->getChat()):?>
    <div id="bold-chat-holder"><div id="bold-chat"><?php echo $propertyTemplate->getChat();?></div></div>
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
  <div class="nav-item" title="<?php echo $property->getCity()?> Apartment Complex - Features">Features</div>
  <div class="nav-item"><a title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community" href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Rentals - Contact Us" href="<?php echo url_for('contact/index')?>">Contact Us</a></div>
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