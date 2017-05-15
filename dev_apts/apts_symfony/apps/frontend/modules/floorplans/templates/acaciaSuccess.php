<!-- Content -->
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
						<a href="<?php echo url_for("ebrochure/index")?>" target="_blank"><img src="/images/acacia/contact-download.png" /></a>
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
							<a href="/images/acacia/floorplan_a2.png" rel="lightbox"><img src="/images/acacia/floorplan_a2.png" /></a>
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
									<a href="#"><img src="/images/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:B1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/acacia/floorplan_b1.png" rel="lightbox"><img src="/images/acacia/floorplan_b1.png" /></a>
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
									<a href="#"><img src="/images/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:C1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/acacia/floorplan_c1.png" rel="lightbox"><img src="/images/acacia/floorplan_c1.png" /></a>
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
									<a href="#"><img src="/images/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/acacia/floorplan_a1.png" rel="lightbox"><img src="/images/acacia/floorplan_a1.png" /></a>
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
									<a href="#"><img src="/images/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>

					<!-- floorplan:A1 -->
					<div class="floorplan_item">
						<div class="floorplan_item_image">
							<a href="/images/acacia/floorplan_a1.png" rel="lightbox"><img src="/images/acacia/floorplan_a1.png" /></a>
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
									<a href="#"><img src="/images/acacia/button-download-f.png" /></a>
								</div>
							</div>
						</div>
					</div>
					*/?>




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
				<a href="<?php echo url_for("default/index")?>"><img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
			</div>
		</div>
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
	<div class="banner_secondary_inner" style="background:url('/images/acacia/<?php echo $property->getCode()?>/banner_floorplan.png') "></div>
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

<?php /*
<div id="banner-gray">
<div id="banner2"><img src="/images/acacia/banner-floorplan.png" width="1024" height="257" /></div>
</div><!-- end of banner-gray -->

<div id="white-fill">
<div id="wrap-top">
  <div id="middle">

  <div id="sec-left3">
    <h1 class="title">Floor Plans at <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?></h1>
    <p><?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> offers <?php echo $property->getUnitType()?> apartments. Our floor plans are designed with your comfort and enjoyment in mind. Choose <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> as your new home and enjoy the convenient location and superior service.</p>
    <span class="font-10i">- Click a floorplan to enlarge</span><br />

    <div class="floorplan-row">
    <?php $fpcount=0;
      foreach($property->getPropertyFloorPlans() as $floorplan):
      $fpcount++;?>
      <div class="floorplan-item">
        <?php if($floorplan->getImage()):?>
        <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox[floorplans]" title="<?php echo $floorplan->getName();?>"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" align="right" border="0" /></a>
        <?php endif;?>
        <strong><?php echo $floorplan->getName();?></strong><br />
        <?php echo $floorplan->getBedrooms();?> Bedroom(s), <?php echo $floorplan->getBathrooms();?> Bath<br />
        <?php echo $floorplan->getSquareFeet();?> Sq. Ft.
        <?php if($floorplan->getPrice()):?>
        	<br />Rent: <?php echo $floorplan->getPrice();?>
        <?php endif; ?>
        <?php if($floorplan->getLeaseTerm()):?>
        	<br />Lease: <?php echo $floorplan->getLeaseTerm();?>
        <?php endif; ?>
        <?php if($floorplan->getDeposit()):?>
        	<br />Deposit: <?php echo $floorplan->getDeposit();?>
        <?php endif; ?>
        <?php if($floorplan->getAvailabilityLink()):?>
        <p><button onclick="window.open('<?php echo $floorplan->getAvailabilityLink();?>','mywindow','width=640,height=480,resizable=yes,scrollbars=yes')">Availability</button></p>
        <?php endif; ?>
      </div>
      <?php if($fpcount % 2 == 0 && $property->countPropertyFloorplans() > $fpcount):?>
    	</div><div class="floorplan-row">
    <?php endif;?>
    <?php endforeach;?>
    </div>
  </div>
  </div><!-- end of middle -->

</div>
</div>


<?php slot('logo') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo-head"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('logo-grey') ?>
  <?php if($propertyTemplate->getLogoImage()):?>
    <div id="logo-grey"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('address') ?>
<div id="addres-hours"><span class="footer-title1">address</span><br />
<?php echo $property->getAddress()?><br /><br />
<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />
<span class="footer-title1">hours</span><br />
<?php echo nl2br($property->getHours())?>
</div>
<div id="phone-fax-email">
<span class="footer-title1">phone </span><br />
<?php echo $property->getPhone()?><br /><br />
<span class="footer-title1">fax</span><br />
<?php echo $property->getFax()?><br /><br />
<span class="footer-title1">email</span><br />
<?php echo $property->getEmail()?><br />
</div>
<?php end_slot() ?>

<?php /*<div id="sec-content">
  <div id="sec-left3">
    <h1 class="title">Floor Plans at <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?></h1>
    <p><?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> offers <?php echo $property->getUnitType()?> apartments. Our floor plans are designed with your comfort and enjoyment in mind. Choose <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> as your new home and enjoy the convenient location and superior service.</p>
    <span class="font-10i">- Click a floorplan to enlarge</span><br />

    <div class="floorplan-row">
    <?php $fpcount=0;
      foreach($property->getPropertyFloorPlans() as $floorplan):
      $fpcount++;?>
      <div class="floorplan-item">
        <?php if($floorplan->getImage()):?>
        <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox[floorplans]" title="<?php echo $floorplan->getName();?>"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" align="right" border="0" /></a>
        <?php endif;?>
        <strong><?php echo $floorplan->getName();?></strong><br />
        <?php echo $floorplan->getBedrooms();?> Bedroom(s), <?php echo $floorplan->getBathrooms();?> Bath<br />
        <?php echo $floorplan->getSquareFeet();?> Sq. Ft.
        <?php if($floorplan->getPrice()):?>
        	<br />Rent: <?php echo $floorplan->getPrice();?>
        <?php endif; ?>
        <?php if($floorplan->getLeaseTerm()):?>
        	<br />Lease: <?php echo $floorplan->getLeaseTerm();?>
        <?php endif; ?>
        <?php if($floorplan->getDeposit()):?>
        	<br />Deposit: <?php echo $floorplan->getDeposit();?>
        <?php endif; ?>
        <?php if($floorplan->getAvailabilityLink()):?>
        <p><button onclick="window.open('<?php echo $floorplan->getAvailabilityLink();?>','mywindow','width=640,height=480,resizable=yes,scrollbars=yes')">Availability</button></p>
        <?php endif; ?>
      </div>
      <?php if($fpcount % 2 == 0 && $property->countPropertyFloorplans() > $fpcount):?>
    	</div><div class="floorplan-row">
    <?php endif;?>
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
	<div class="nav-item" title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans">Floor Plans</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos"href="<?php echo url_for('photos/index')?>">Photos</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartment Complex - Features" href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item"><a title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community" href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Rentals - Contact Us" href="<?php echo url_for('contact/index')?>">Contact Us</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<?php end_slot() ?>

<?php slot('main-repeat') ?>
<div id="main-repeat2">
<?php end_slot() ?>

<?php slot('main-bot') ?>
<div id="main-bot2">
<?php end_slot() ?>
<?php slot('bot-nav') ?>
<div style="text-align: center; padding: 0px 0px 15px 0px; color: white; font-size:10px;">
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?></div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>*/?>