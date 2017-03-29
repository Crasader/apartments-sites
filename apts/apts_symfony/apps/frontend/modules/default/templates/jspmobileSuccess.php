<!-- Start of first page: #home -->
<div data-role="page" id="home">

	<div class="home_header">
		<div style="text-align:center;">
			<img src="/images/jsp/<?php echo $property->getCode()?>/logo_top.png" />
		</div>
	</div>

	<div class="home_banner" style="background: url('/images/jsp/<?php echo $property->getCode()?>/slidemobile.jpg') top center; background-size: cover;">
	</div>

	<?php /*<div class="home_brochure">
		<a class="home_brochure_params" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>">
			Download our Rental Application
		</a>
	</div>*/?>

	<div data-role="none" >
		<div class="home_button_group">
			<a class="home_button" href="#floorplans"><span><img src="/images/jsp/mobile/icon_w_floorplans.png" /></span>FLOORPLANS</a>
			<a class="home_button" href="#gallery"><span><img src="/images/jsp/mobile/icon_w_gallery.png" /></span>GALLERY</a>
			<a class="home_button" href="#amenities"><span><img src="/images/jsp/mobile/icon_w_amenities.png" /></span>AMENITIES</a>
			<a class="home_button" href="#contact"><span><img src="/images/jsp/mobile/icon_w_contact.png" /></span>CONTACT</a>
		</div>
	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br />
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?><br />
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
	    <br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
	    <a class="ui-link" rel="external" href="/default/nomobile">desktop site</a>
	    </div>
		</div>
	</div>

</div><!-- /page home -->


<!-- Start of second page: #floorplans -->
<div data-role="page" id="floorplans" data-theme="a">

	<div data-role="header" style="position:relative;">
	<div style="position:absolute; top:10px; left:10px;"><a href="#home" id="btnSave" data-role="button" data-inline="true" data-icon="back" style="width:20px; height:20px; margin:0; padding:5px;"></a></div>
		<h1>Floorplans</h1>
	</div><!-- /header -->

	<div data-role="none" >
		<div class="top_button_group">
			<a class="top_button" href="#floorplans"><div class="top_icon"><img src="/images/jsp/mobile/icon_floorplans.png" /></div><span>FLOORPLANS</span></a>
			<a class="top_button" href="#gallery"><div class="top_icon"><img src="/images/jsp/mobile/icon_gallery.png" /></div><span>GALLERY</span></a>
			<a class="top_button" href="#amenities"><div class="top_icon"><img src="/images/jsp/mobile/icon_amenities.png" /></div><span>AMENITIES</span></a>
			<a class="top_button" href="#contact"><div class="top_icon"><img src="/images/jsp/mobile/icon_contact.png" /></div><span>CONTACT</span></a>
		</div>
	</div><!-- /content -->

	<div data-role="content" data-theme="a" style="margin:0px; padding:0px;">



  <?php
  $fpcount = 1;
  foreach($property->getPropertyFloorPlans() as $floorplan):?>
  <?php if($fpcount % 2 != 0):?>
		  <!-- floorplan_row:start -->
		<div class="floorplan_row">
	<?php endif;?>
			<!-- floorplan:start -->
			<div class="floorplan_item">
				<div class="floorplan_inner">
					<a class="ui-link" href="#floorplan<?php echo $fpcount?>" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" /></a>
					<div data-role="popup" id="floorplan<?php echo $fpcount?>" data-overlay-theme="b" data-theme="b" data-corners="false">
						<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" style="max-height:512px;" alt="Floorplan">
					</div>
				</div>
				<div class="floorplan_info">
					<div class="floorplan_info_inner">
						<div class="floorplan_name"><?php echo $floorplan->getName();?></div>
						<div class="floorplan_spec"><?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath
						<br /><?php echo $floorplan->getSquareFeet();?> Sq. Ft.
						<br /><small><em>*Prices are subject to change</em></small></div>
						<div class="floorplan_price"><?php echo $floorplan->getPrice();?></div>

					</div>
				</div>
				<div class="floorplan_buttons">
					<?php /*<a class="floorplan_download_button" href="/uploads/floorplans/<?php echo $floorplan->getImage()?>">VIEW LARGER</a>*/?>
					<a class="floorplan_visit_button" href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>">CALL TO VISIT</a>
				</div>
			</div>
			<!-- floorplan:end -->

  <?php if($fpcount % 2 == 0):?>
    </div>
    <!-- floorplan_row:end -->

  <?php endif;?>

  <?php $fpcount++;
  endforeach;?>
  <?php if($fpcount % 2 == 0):?>
    </div>
  <?php endif;?>
  <?php /*
			<!-- floorplan:start -->
			<div class="floorplan_item">
				<div class="floorplan_inner">
					<a class="ui-link" href="#floorplan2" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/floorplan2.jpg" /></a>
					<div data-role="popup" id="floorplan2" data-overlay-theme="b" data-theme="b" data-corners="false">
						<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/floorplan2.jpg" style="max-height:512px;" alt="Floorplan">
					</div>
				</div>
				<div class="floorplan_info">
					<div class="floorplan_info_inner">
						<div class="floorplan_name">One Bedroom</div>
						<div class="floorplan_spec">1 Bed 1 Bath 669 Sq. Ft.</div>
						<div class="floorplan_price">$699</div>
					</div>
				</div>
				<div class="floorplan_buttons">
					<a class="floorplan_download_button" href="#">DOWNLOAD PDF</a>
					<a class="floorplan_visit_button" href="#">CALL TO VISIT</a>
				</div>
			</div>
			<!-- floorplan:end -->
		</div>
		<!-- floorplan_row:end -->
		<!-- floorplan_row:start -->
		<div class="floorplan_row">

			<!-- floorplan:start -->
			<div class="floorplan_item">
				<div class="floorplan_inner">
					<a class="ui-link" href="#floorplan3" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/floorplan2.jpg" /></a>
					<div data-role="popup" id="floorplan3" data-overlay-theme="b" data-theme="b" data-corners="false">
						<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/floorplan2.jpg" style="max-height:512px;" alt="Floorplan">
					</div>
				</div>
				<div class="floorplan_info">
					<div class="floorplan_info_inner">
						<div class="floorplan_name">One Bedroom</div>
						<div class="floorplan_spec">1 Bed 1 Bath 669 Sq. Ft.</div>
						<div class="floorplan_price">$699</div>
					</div>
				</div>
				<div class="floorplan_buttons">
					<a class="floorplan_download_button" href="#">DOWNLOAD PDF</a>
					<a class="floorplan_visit_button" href="#">CALL TO VISIT</a>
				</div>
			</div>
			<!-- floorplan:end -->

			<!-- floorplan:start -->
			<div class="floorplan_item">
				<div class="floorplan_inner">
					<a class="ui-link" href="#floorplan4" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/floorplan1.jpg" /></a>
					<div data-role="popup" id="floorplan4" data-overlay-theme="b" data-theme="b" data-corners="false">
						<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/floorplan1.jpg" style="max-height:512px;" alt="Floorplan">
					</div>
				</div>
				<div class="floorplan_info">
					<div class="floorplan_info_inner">
						<div class="floorplan_name">One Bedroom</div>
						<div class="floorplan_spec">1 Bed 1 Bath 669 Sq. Ft.</div>
						<div class="floorplan_price">$699</div>
					</div>
				</div>
				<div class="floorplan_buttons">
					<a class="floorplan_download_button" href="#">DOWNLOAD PDF</a>
					<a class="floorplan_visit_button" href="#">CALL TO VISIT</a>
				</div>
			</div>
			<!-- floorplan:end -->
		</div>
		<!-- floorplan_row:end -->*/?>


	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br>
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?>
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
			<br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
		</div>
	</div>
</div><!-- /page floorplans -->



<!-- Start of second page: #gallery -->
<div data-role="page" id="gallery" data-theme="a">

	<div data-role="header" style="position:relative;">
	<div style="position:absolute; top:10px; left:10px;"><a href="#home" id="btnSave" data-role="button" data-inline="true" data-icon="back" style="width:20px; height:20px; margin:0; padding:5px;"></a></div>
		<h1>Gallery</h1>
	</div><!-- /header -->

	<div data-role="none" >
		<div class="top_button_group">
			<a class="top_button" href="#floorplans"><div class="top_icon"><img src="/images/jsp/mobile/icon_floorplans.png" /></div><span>FLOORPLANS</span></a>
			<a class="top_button" href="#gallery"><div class="top_icon"><img src="/images/jsp/mobile/icon_gallery.png" /></div><span>GALLERY</span></a>
			<a class="top_button" href="#amenities"><div class="top_icon"><img src="/images/jsp/mobile/icon_amenities.png" /></div><span>AMENITIES</span></a>
			<a class="top_button" href="#contact"><div class="top_icon"><img src="/images/jsp/mobile/icon_contact.png" /></div><span>CONTACT</span></a>
		</div>
	</div><!-- /content -->

	<div data-role="content" data-theme="a" style="margin:0px; padding:0px;">
		<div class="gallery-container">
		<?php
		$pcount = 1;
		foreach($mainPhotos as $photo):?>
			<!-- gallery-item:start -->
			<div class="gallery-item">
				<a class="ui-link" href="#photo<?php echo $pcount?>" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="/uploads/photos/<?php echo $photo->getImage()?>" /></a>
				<div data-role="popup" id="photo<?php echo $pcount?>" data-overlay-theme="b" data-theme="b" data-corners="false">
					<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="/uploads/photos/<?php echo $photo->getImage()?>" style="max-height:512px;" alt="Gallery Item">
				</div>
			</div>
		<?php
		$pcount++;
		endforeach;?>
			<!-- gallery-item:end -->
		<?php /*
			<!-- gallery-item:start -->
			<div class="gallery-item">
				<a class="ui-link" href="#66a20ca732895a28a77a275cb77099a8" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/66a20ca732895a28a77a275cb77099a8.jpg" /></a>
				<div data-role="popup" id="66a20ca732895a28a77a275cb77099a8" data-overlay-theme="b" data-theme="b" data-corners="false">
					<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/66a20ca732895a28a77a275cb77099a8.jpg" style="max-height:512px;" alt="Gallery Item">
				</div>
			</div>
			<!-- gallery-item:end -->

			<!-- gallery-item:start -->
			<div class="gallery-item">
				<a class="ui-link" href="#6da2ffec1ea67a4996793e38493bea60" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/6da2ffec1ea67a4996793e38493bea60.jpg" /></a>
				<div data-role="popup" id="6da2ffec1ea67a4996793e38493bea60" data-overlay-theme="b" data-theme="b" data-corners="false">
					<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/6da2ffec1ea67a4996793e38493bea60.jpg" style="max-height:512px;" alt="Gallery Item">
				</div>
			</div>
			<!-- gallery-item:end -->

			<!-- gallery-item:start -->
			<div class="gallery-item">
				<a class="ui-link" href="#a86f44039bd3268907df6a5e3fc78706" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/a86f44039bd3268907df6a5e3fc78706.jpg" /></a>
				<div data-role="popup" id="a86f44039bd3268907df6a5e3fc78706" data-overlay-theme="b" data-theme="b" data-corners="false">
					<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/a86f44039bd3268907df6a5e3fc78706.jpg" style="max-height:512px;" alt="Gallery Item">
				</div>
			</div>
			<!-- gallery-item:end -->

			<!-- gallery-item:start -->
			<div class="gallery-item">
				<a class="ui-link" href="#ad99064d04bc99f60253d5bf2e2d0097" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/ad99064d04bc99f60253d5bf2e2d0097.jpg" /></a>
				<div data-role="popup" id="ad99064d04bc99f60253d5bf2e2d0097" data-overlay-theme="b" data-theme="b" data-corners="false">
					<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/ad99064d04bc99f60253d5bf2e2d0097.jpg" style="max-height:512px;" alt="Gallery Item">
				</div>
			</div>
			<!-- gallery-item:end -->

			<!-- gallery-item:start -->
			<div class="gallery-item">
				<a class="ui-link" href="#b1d8b846e52a23f5e2d6021b4cfca2da" data-rel="popup" data-position-to="window" data-transition="fade"><img class="popphoto" src="images/b1d8b846e52a23f5e2d6021b4cfca2da.jpg" /></a>
				<div data-role="popup" id="b1d8b846e52a23f5e2d6021b4cfca2da" data-overlay-theme="b" data-theme="b" data-corners="false">
					<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img class="popphoto" src="images/b1d8b846e52a23f5e2d6021b4cfca2da.jpg" style="max-height:512px;" alt="Gallery Item">
				</div>
			</div>
			<!-- gallery-item:end -->*/?>

		</div>
	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br>
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?>
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
				<br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
		</div>
	</div>
</div><!-- /page gallery -->


<!-- Start of second page: #amenities -->
<div data-role="page" id="amenities" data-theme="a">

	<div data-role="header" style="position:relative;">
	<div style="position:absolute; top:10px; left:10px;"><a href="#home" id="btnSave" data-role="button" data-inline="true" data-icon="back" style="width:20px; height:20px; margin:0; padding:5px;"></a></div>
		<h1>Amenities</h1>
	</div><!-- /header -->

	<div data-role="none" >
		<div class="top_button_group">
			<a class="top_button" href="#floorplans"><div class="top_icon"><img src="/images/jsp/mobile/icon_floorplans.png" /></div><span>FLOORPLANS</span></a>
			<a class="top_button" href="#gallery"><div class="top_icon"><img src="/images/jsp/mobile/icon_gallery.png" /></div><span>GALLERY</span></a>
			<a class="top_button" href="#amenities"><div class="top_icon"><img src="/images/jsp/mobile/icon_amenities.png" /></div><span>AMENITIES</span></a>
			<a class="top_button" href="#contact"><div class="top_icon"><img src="/images/jsp/mobile/icon_contact.png" /></div><span>CONTACT</span></a>
		</div>
	</div><!-- /content -->

	<div data-role="content" data-theme="a" style="margin:0px; padding:0px;">

		<div class="amenities_title" style="background:url('<?php echo $arrFeaturePhoto[0]['path']?>') center right; background-size: cover;">
			Apartment <span>features</span>
		</div>

		<div class="amenities_desc">
			<ul>
				<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
          <li><?php echo $feature->getApartmentFeature()->getName()?></li>
        <?php endforeach;?>
			</ul>
		</div>
		<div class="amenities_title" style="background:url('<?php echo $arrFeaturePhoto[1]['path']?>') center right; background-size: cover;">
			Community <span>features</span>
		</div>

		<div class="amenities_desc">
			<ul>
				<?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
          <li><?php echo $feature->getCommunityFeature()->getName()?></li>
        <?php endforeach;?>
			</ul>
		</div>

	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br>
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?>
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
				<br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
		</div>
	</div>
</div><!-- /page amenities -->


<!-- Start of second page: #contact -->
<div data-role="page" id="contact" data-theme="a">

	<div data-role="header" style="position:relative;">
	<div style="position:absolute; top:10px; left:10px;"><a href="#home" id="btnSave" data-role="button" data-inline="true" data-icon="back" style="width:20px; height:20px; margin:0; padding:5px;"></a></div>
		<h1>Contact</h1>
	</div><!-- /header -->

	<div data-role="none" >
		<div class="top_button_group">
			<a class="top_button" href="#floorplans"><div class="top_icon"><img src="/images/jsp/mobile/icon_floorplans.png" /></div><span>FLOORPLANS</span></a>
			<a class="top_button" href="#gallery"><div class="top_icon"><img src="/images/jsp/mobile/icon_gallery.png" /></div><span>GALLERY</span></a>
			<a class="top_button" href="#amenities"><div class="top_icon"><img src="/images/jsp/mobile/icon_amenities.png" /></div><span>AMENITIES</span></a>
			<a class="top_button" href="#contact"><div class="top_icon"><img src="/images/jsp/mobile/icon_contact.png" /></div><span>CONTACT</span></a>
		</div>
	</div><!-- /content -->

	<div data-role="content" data-theme="a" style="margin:0px; padding:0px;">

			<div style="float:left: width:100%; margin-top:25px;">
        <div style="float:left; width:50%; height:75px; text-align:center;">
          <a class="contact_button" href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank"><span><img src="/images/jsp/mobile/icon_w_map.png"/></span>MAP</a>
        </div>
        <div style="float:left; width:50%; height:75px; text-align:center;">
          <a class="contact_button" href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" target="_blank"><span><img src="/images/jsp/mobile/icon_w_contact.png" style="margin-top:1px;"/></span>CALL</a>
        </div>
      </div>

			<div style="float:left; font-size:18px; margin:-20px 20px 20px 20px;">


              <p>Interested in <?php echo $property->getName()?>? Fill out the form below and click "send" or Call us at: <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>"><?php echo $property->getPhone()?></a></p>

              <span style="color:#597a2a; font-style:italic;">Office Hours:</span><br>
              <?php echo nl2br($property->getHours())?>


              <form name="mContact" id="mContact" method="post" action="<?php echo url_for('contact/shortm'); ?>" data-ajax="false">
                <div style="padding:10px 0 10px 0; margin:10px 0 10px 0;">
                <label class="jsp-input-text" for="firstname">First Name:</label>
                <input class="jsp-input-text ui-body-c ui-corner-all ui-shadow-inset" name="firstname" id="firstname">

                <label class="jsp-input-text" for="lastname">Last Name*:</label>
                <input class="jsp-input-text ui-body-c ui-corner-all ui-shadow-inset" name="lastname" id="lastname">

                <label class="jsp-input-text" for="phonenumber">Phone Number:</label>
                <input class="jsp-input-text ui-body-c ui-corner-all ui-shadow-inset" name="phonenumber" id="phonenumber">

                <label class="jsp-input-text" for="email">Email Address*:</label>
                <input class="jsp-input-text ui-body-c ui-corner-all ui-shadow-inset" name="email" id="email" required email>

                <label class="jsp-input-text" for="notes">Notes:</label>
                <textarea class="jsp-input-text ui-body-c ui-corner-all ui-shadow-inset" name="notes" id="notes" rows="6" cols="82"></textarea>

                </div>
                <input value="Submit" data-role="none" class="ui-btn ui-shadow ui-btn-corner-all ui-mini btn_submit" type="submit">
              </form>
              <script>
                $('#contact').bind('pageinit', function(event) {
                  $('#mContact').validate({
                    rules: {
                      email: {
                        required: true,
                        email: true
                      },
                      lastname: {
                        required: true
                      }
                    }
                  });
                });
              </script>
			   </div>

	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br>
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?>
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
				<br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
		</div>
	</div>
</div><!-- /page contact -->

<!-- Start of second page: #page_thankyou -->
<div data-role="page" id="page_thankyou" data-theme="a">

	<div data-role="header" style="position:relative;">
	<div style="position:absolute; top:10px; left:10px;"><a href="#home" id="btnSave" data-role="button" data-inline="true" data-icon="back" style="width:20px; height:20px; margin:0; padding:5px;"></a></div>
		<h1>Contact</h1>
	</div><!-- /header -->

	<div data-role="none" >
		<div class="top_button_group">
			<a class="top_button" href="#floorplans"><div class="top_icon"><img src="/images/jsp/mobile/icon_floorplans.png" /></div><span>FLOORPLANS</span></a>
			<a class="top_button" href="#gallery"><div class="top_icon"><img src="/images/jsp/mobile/icon_gallery.png" /></div><span>GALLERY</span></a>
			<a class="top_button" href="#amenities"><div class="top_icon"><img src="/images/jsp/mobile/icon_amenities.png" /></div><span>AMENITIES</span></a>
			<a class="top_button" href="#contact"><div class="top_icon"><img src="/images/jsp/mobile/icon_contact.png" /></div><span>CONTACT</span></a>
		</div>
	</div><!-- /content -->

	<div data-role="content" data-theme="a" style="margin:0px; padding:0px;">

			<div style="float:left: width:100%; margin-top:25px;">
        <div style="float:left; width:50%; height:75px; text-align:center;">
          <a class="contact_button" href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank"><span><img src="/images/jsp/mobile/icon_w_map.png"/></span>MAP</a>
        </div>
        <div style="float:left; width:50%; height:75px; text-align:center;">
          <a class="contact_button" href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" target="_blank"><span><img src="/images/jsp/mobile/icon_w_contact.png" style="margin-top:1px;"/></span>CALL</a>
        </div>
      </div>

			<div style="float:left; font-size:18px; margin:-20px 20px 20px 20px;">


              <p>Thank you.</p>


			   </div>

	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br>
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?>
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
				<br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
		</div>
	</div>
</div><!-- /page thankyou -->


<!-- Start of second page: #terms -->
<div data-role="page" id="terms" data-theme="a">

	<div data-role="header" style="position:relative;">
	<div style="position:absolute; top:10px; left:10px;"><a href="#home" id="btnSave" data-role="button" data-inline="true" data-icon="back" style="width:20px; height:20px; margin:0; padding:5px;"></a></div>
		<h1>Terms</h1>
	</div><!-- /header -->

	<div data-role="none" >
		<div class="top_button_group">
			<a class="top_button" href="#floorplans"><div class="top_icon"><img src="/images/jsp/mobile/icon_floorplans.png" /></div><span>FLOORPLANS</span></a>
			<a class="top_button" href="#gallery"><div class="top_icon"><img src="/images/jsp/mobile/icon_gallery.png" /></div><span>GALLERY</span></a>
			<a class="top_button" href="#amenities"><div class="top_icon"><img src="/images/jsp/mobile/icon_amenities.png" /></div><span>AMENITIES</span></a>
			<a class="top_button" href="#contact"><div class="top_icon"><img src="/images/jsp/mobile/icon_contact.png" /></div><span>CONTACT</span></a>
		</div>
	</div><!-- /content -->

	<div data-role="content" data-theme="a" style="margin:0px; padding:0px;">
		<div style="font-size:18px; margin:20px;">
			<b>Web Site Terms and Conditions of Use</b><br>
			<b>1. Terms</b>
			<p>By accessing this web site, you are agreeing to be bound by these web site Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this web site are protected by applicable copyright and trade mark law.</p>
			<b>2. Use License</b>
			<ol type="a">
			<li>Permission is granted to temporarily download one copy of the materials (information or software) on <?php echo $property->getName()?>'s web site for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
			<ol type="i">
			<li>modify or copy the materials;</li>
			<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
			<li>attempt to decompile or reverse engineer any software contained on <?php echo $property->getName()?>'s web site;</li>
			<li>remove any copyright or other proprietary notations from the materials; or</li>
			<li>transfer the materials to another person or "mirror" the materials on any other server.</li>

			</ol>
			</li>
			<li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by <?php echo $property->getName()?> at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
			</ol>
			<b>3. Disclaimer</b>
			<ol type="a">
			<li>The materials on <?php echo $property->getName()?>'s web site are provided "as is". <?php echo $property->getName()?> makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, <?php echo $property->getName()?> does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.</li>
			</ol>
			<b>4. Limitations</b>
			<p>In no event shall <?php echo $property->getName()?> or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on <?php echo $property->getName()?>'s Internet site, even if <?php echo $property->getName()?> or a <?php echo $property->getName()?> authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>

			<b>5. Revisions and Errata</b>
			<p>The materials appearing on <?php echo $property->getName()?>'s web site could include technical, typographical, or photographic errors. <?php echo $property->getName()?> does not warrant that any of the materials on its web site are accurate, complete, or current. <?php echo $property->getName()?> may make changes to the materials contained on its web site at any time without notice. <?php echo $property->getName()?> does not, however, make any commitment to update the materials.</p>
			<b>6. Links</b>
			<p><?php echo $property->getName()?> has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by <?php echo $property->getName()?> of the site. Use of any such linked web site is at the user's own risk.</p>
			<b>7. Site Terms of Use Modifications</b>
			<p><?php echo $property->getName()?> may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.</p>
			<b>8. Governing Law</b>
			<p>Any claim relating to <?php echo $property->getName()?>'s web site shall be governed by the laws of the State of Utah without regard to its conflict of law provisions.</p>
		</div>

	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br>
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?>
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
				<br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
		</div>
	</div>
</div><!-- /page terms -->


<!-- Start of second page: #privacy -->
<div data-role="page" id="privacy" data-theme="a">

	<div data-role="header" style="position:relative;">
	<div style="position:absolute; top:10px; left:10px;"><a href="#home" id="btnSave" data-role="button" data-inline="true" data-icon="back" style="width:20px; height:20px; margin:0; padding:5px;"></a></div>
		<h1>Privacy</h1>
	</div><!-- /header -->

	<div data-role="none" >
		<div class="top_button_group">
			<a class="top_button" href="#floorplans"><div class="top_icon"><img src="/images/jsp/mobile/icon_floorplans.png" /></div><span>FLOORPLANS</span></a>
			<a class="top_button" href="#gallery"><div class="top_icon"><img src="/images/jsp/mobile/icon_gallery.png" /></div><span>GALLERY</span></a>
			<a class="top_button" href="#amenities"><div class="top_icon"><img src="/images/jsp/mobile/icon_amenities.png" /></div><span>AMENITIES</span></a>
			<a class="top_button" href="#contact"><div class="top_icon"><img src="/images/jsp/mobile/icon_contact.png" /></div><span>CONTACT</span></a>
		</div>
	</div><!-- /content -->

	<div data-role="content" data-theme="a" style="margin:0px; padding:0px;">
		<div style="font-size:18px; margin:20px;">
			<p>This is the web site of <strong><?php echo $property->getName()?></strong>.</p>
			<p>Our postal address is<br>
			<strong>
			2102 East 6655 South<br>
			Salt Lake City, UT 84121 <br>
			</strong></p>
			<p>We can be reached via e-mail at <a href="mailto:info@amcapartments.com">info@amcapartments.com</a></p>
			<p>For each visitor to our Web page, our Web server automatically recognizes the consumer's domain name and e-mail address (where possible).</p>
			<p>We collect the domain name and e-mail address (where possible) of visitors to our Web page, the e-mail addresses of those who post messages to our bulletin board, the e-mail addresses of those who communicate with us via e-mail, the e-mail addresses of those who make postings to our chat areas, aggregate information on what pages consumers access or visit, user-specific information on what pages consumers access or visit, information volunteered by the consumer, such as survey information and/or site registrations, name and address, telephone number, fax number, payment information (e.g., credit card number and billing address).</p>
			<p>The information we collect is used to improve the content of our Web page, used to customize the content and/or layout of our page for each individual visitor, used to notify consumers about updates to our Web site, shared with agents or contractors who assist in providing support for our internal operations, used by us to contact consumers for marketing purposes, shared with other reputable organizations to help them contact consumers for marketing purposes, disclosed when legally required to do so, at the request of governmental authorities conducting an investigation, to verify or enforce compliance with the policies governing our Website and applicable laws or to protect against misuse or unauthorized use of our Website, to a successor entity in connection with a corporate merger, consolidation, sale of assets or other corporate change respecting the Website.</p>
			<p>With respect to cookies: We use cookies to store visitors preferences, record session information, such as items that consumers add to their shopping cart, record user-specific information on what pages users access or visit, alert visitors to new areas that we think might be of interest to them when they return to our site, record past activity at a site in order to provide better service when visitors return to our site , ensure that visitors are not repeatedly sent the same banner ads, customize Web page content based on visitors' browser type or other information that the visitor sends.</p>
			<p>If you do not want to receive e-mail from us in the future, please let us know by sending us e-mail at the above address.</p>

			<p>From time to time, we make the e-mail addresses of those who access our site available to other reputable organizations whose products or services we think you might find interesting. If you do not want us to share your e-mail address with other companies or organizations, please let us know by sending us e-mail at the above address.</p>
			<p>From time to time, we make our <em>customer</em> e-mail list available to other reputable organizations whose products or services we think you might find interesting. If you do not want us to share your e-mail address with other companies or organizations, please let us know by sending us e-mail at the above address.</p>
			<p>If you supply us with your postal address on-line you may receive periodic mailings from us with information on new products and services or upcoming events. If you do not wish to receive such mailings, please let us know by sending us e-mail at the above address.</p>
			<p>you may receive mailings from other reputable companies. You can, however, have your name put on our do-not-share list by sending us e-mail at the above address.</p>
			<p>Please provide us with your exact name and address. We will be sure your name is removed from the list we share with other organizations</p>
			<p>Persons who supply us with their telephone numbers on-line may receive telephone contact from us with information regarding new products and services or upcoming events. If you do not wish to receive such telephone calls, please let us know by sending us e-mail at the above address.</p>
			<p>Persons who supply us with their telephone numbers on-line may receive telephone contact from other reputable companies. You can, however, have your name put on our do-not-share list by , sending us e-mail at the above address.</p>

			<p>Please provide us with your name and phone number. We will be sure your name is removed from the list we share with other organizations.</p>
			<p>From time to time, we may use customer information for new, unanticipated uses not previously disclosed in our privacy notice. If our information practices change at some time in the future we will post the policy changes to our Web site to notify you of these changes and we will use for these new purposes only data collected from the time of the policy change forward. If you are concerned about how your information is used, you should check back at our Web site periodically.</p>
			<p>Customers may prevent their information from being used for purposes other than those for which it was originally collected by e-mailing us at the above address.</p>
			<p>If you feel that this site is not following its stated information policy, you may contact us by sending us e-mail at the above address.</p>
		</div>

	</div><!-- /content -->

	<div data-role="none" class="ui-jsp-footer">
		<div data-role="none" class="ui-jsp-footer-info">
		  <?php echo $property->getName()?>  -  <?php echo $property->getPhone()?><br>
		  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?>
		  <a href="#contact" class="ui-link"><?php echo $property->getEmail()?></a><br />
	Office Hours: <?php echo nl2br($property->getHours())?>
		</div>

		<div data-role="none" class="ui-jsp-footer-divider"></div>

		 <div data-role="none" class="ui-jsp-footer-links">
		  <div class="ui-jsp-equal-shell">
			<img src="/images/jsp/mobile/equal_invert.png" class="ui-jsp-equal">
		  </div>
		  <div class="ui-jsp-footer-inner">
			<a class="ui-link" href="#terms">terms of use</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
			<a class="ui-link" href="#privacy">privacy policy</a>
				<br /><a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">Español</a></div>
		</div>
	</div>
</div><!-- /page privacy -->
<?php slot('tracking-code') ?>
  <?php if($propertyTemplate->getTrackingCode()):?>
    <?php echo $propertyTemplate->getTrackingCode()?>
  <?php endif;?>
<?php end_slot() ?>

<?php /*
       <div data-role="content">
      <!--  **************** /Home Page *************************  -->
      <div data-role="page" id="page_home">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-homecontent">
          <img src="/images/acacia/mobile/ac_home_img.jpg" class="resizeFull"/>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">
			<div data-role="none" class="ui-ac-footer-links">
			  <div class="ui-ac-footer-inner">
				<a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
			  </div>
			</div>
			<div class="ui-ac-equal-shell">
				<img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
			</div>
        </div>

      </div>

  <!--  **************** /Floor Plans *************************  -->
      <div data-role="page" id="page_floorplans">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Floorplans
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
        <?php foreach($property->getPropertyFloorPlans() as $floorplan):?>
			<!-- floorplan 1 -->
           <div data-role="none" class="ui-ac-floorplan first_floorplan" >
              <div data-role="none" class="ui-ac-floorplan_inner first_floorplan_inner " >

                <table cellpadding="0" cellspacing="0" width="100%">
                  <tr valign="top">
                    <td class="tb_thumb ">
                      <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" target="_blank"><img src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" class="floorplan_thumb" border="0" /></a>
                    </td>
                    <td class="tb_cont">

                    <span class="floorplan_name"><?php echo $floorplan->getName();?></span><br />
                      <span class="floorplan_details">
												<?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br />
												<?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
												<small><em>*Prices are subject to change</em></small>
                      </span>

                    </td>
                    <td class="tb_price">
                       <span class="floorplan_price"><?php echo $floorplan->getPrice();?></span>
                    </td>

                  </tr>
                </table>

              </div>
           </div>
           <?php endforeach;?>
           <?php /*
           <!-- floorplan 1 -->
           <div data-role="none" class="ui-ac-floorplan first_floorplan" >
              <div data-role="none" class="ui-ac-floorplan_inner first_floorplan_inner " >

                <table cellpadding="0" cellspacing="0" width="100%">
                  <tr valign="top">
                    <td class="tb_thumb ">
                      <img src="/images/acacia/mobile/floorplan_b1.png" class="floorplan_thumb" />
                    </td>
                    <td class="tb_cont">
					<a href="#">
                    <span class="floorplan_name">The Hampton</span><br />
                      <span class="floorplan_details">
                          2 Bedroom(s), 2 Bath<br />
                          1005 Sq. Ft.<br />
                      </span>
					</a>
                    </td>
                    <td class="tb_price">
						<a href="#" class="floorplan_arrow"><img src="/images/acacia/mobile/floorplan_arrow.png"><br />
                       <span class="floorplan_price">$1003</span></a>
                    </td>
                  </tr>
                </table>

              </div>
           </div>?>


        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">


             <div data-role="none" class="ui-ac-footer-links">

              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>


  <!--  **************** /Photos *************************  -->
      <div data-role="page" id="page_photos">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Photos
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
             <div data-role="none" class="photoParam"><img src="/uploads/photos/<?php echo $mainPhotos[0]->getImage()?>"  class="resizeFull" id="currentPhoto"/></div>
             <div data-role="none" class="photoNav">
                <table class="photoTable" cellpadding="0" cellspacing="0" width="100%" height="75">
                  <tr>
                    <td width="55"><div class="photoNavLeft"><img src="/images/acacia/mobile/left_arrow.png" /></div></td>
                    <td width="100%" align="center" >
                      <div class="photoNavScroller">
                        <div class="photoGroup">
                        <?php foreach($mainPhotos as $photo):?>
                          <div class="photoItem" ref="/uploads/photos/<?php echo $photo->getImage()?>" title="<?php echo $photo->getName()?>"><img src="/uploads/photos/258/<?php echo $photo->getImage()?>" class="photoThumb"/></div>
                          <?php /*<div class="photoItem" ref="/images/acacia/mobile/photos/photo2.jpg"><img src="/images/acacia/mobile/photos/photo2thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo3.jpg"><img src="/images/acacia/mobile/photos/photo3thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo4.jpg"><img src="/images/acacia/mobile/photos/photo4thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo5.jpg"><img src="/images/acacia/mobile/photos/photo5thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo6.jpg"><img src="/images/acacia/mobile/photos/photo6thumb.jpg" class="photoThumb"/></div>
                          <div class="photoItem" ref="/images/acacia/mobile/photos/photo7.jpg"><img src="/images/acacia/mobile/photos/photo7thumb.jpg" class="photoThumb"/></div>?>
                         <?php endforeach;?>
                        </div>
                      </div>
                    </td>
                    <td width="55"><div class="photoNavRight"><img src="/images/acacia/mobile/right_arrow.png" /></div></td>
                  </tr>
                </table>
             </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">



             <div data-role="none" class="ui-ac-footer-links">

              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
               </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>

  <!--  **************** /Features *************************  -->
      <div data-role="page" id="page_features">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Features
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
          <div class="ui-ac-tancontent-inner-nopad">
            <h2>Apartment Features:</h2>
			<div class="ui-ac-bump">
            <ul>
            <?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
							<li><?php echo $feature->getApartmentFeature()->getName()?></li>
						<?php endforeach;?>
				<?php /*<li>Granite countertops.</li>
				<li>18” tile in entire apartment.</li>
				<li>Hardwood floor options</li>
				<li>Stainless steel fridge and oven.</li>
				<li>Two toned paint.</li>
				<li>Stainless steel fridge and oven.</li>
				<li>Two toned paint.</li>
				<li>Designed with modern interiors</li>?>
            </ul>
			</div>

            <h2>Community Features:</h2>
			<div class="ui-ac-bump">
            <ul>
            <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
							<li><?php echo $feature->getCommunityFeature()->getName()?></li>
						<?php endforeach;?>
            <?php /*   <li>Convenient location</li>
               <li>Credit Cards Accepted</li>
               <li>Easy Freeway Access</li>
               <li>Pets Welcome! No weight limit (2 per apartment)</li>
               <li>(Breed Restrictions Apply)</li>
               <li>Housing Vouchers Welcome</li>
               <li>Playgrounds</li>
               <li>Fitness Center</li>
               <li>Swimming Pool</li>
               <li>Spa</li>
               <li>Gated Access</li>*?>
            </ul>
			</div>

          </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">



             <div data-role="none" class="ui-ac-footer-links">
              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>

  <!--  **************** /About *************************  -->
      <div data-role="page" id="page_about">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           About
         </div>

        <!-- /content -->
		<div data-role="none" class="ui-ac-homecontent">
          <img src="/images/acacia/mobile/about_banner.jpg" class="resizeFull"/>
        </div>

        <div data-role="none" class="ui-ac-tancontent">
          <div class="ui-ac-tancontent-inner">
			<span style="color:#597a2a; font-style:italic;">Important Message:</span><br />
            <?php echo nl2br($propertyTemplate->getDescription()); ?>
          </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">



             <div data-role="none" class="ui-ac-footer-links">
              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
             <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
              </div>
        </div>
      </div>


  <!--  **************** /Contact Us *************************  -->

      <div data-role="page" id="page_contactus">

      <!-- /header -->
        <div data-role="none" class="ui-ac-header">
          <img src="/images/acacia/mobile/logo_pheasant.png" />
        </div>

        <div data-role="none" class="ui-ac-headnav">
          <a href="#page_home" class="navItem"><img src="/images/acacia/mobile/nav_home.png" class="scaleNav"></a>
          <a href="#page_about" class="navItem"><img src="/images/acacia/mobile/nav_about.png" class="scaleNav"></a>
          <a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="navItem"><img src="/images/acacia/mobile/nav_map.png" class="scaleNav"></a>
          <a href="tel:<?php echo preg_replace('/[^0-9]/','',$property->getPhone())?>" class="lastItem"><img src="/images/acacia/mobile/nav_call.png" class="scaleNav"></a>
        </div>

        <!-- /title_bar-->
         <div data-role="none" class="ui-ac-titlebar">
           Contact Us
         </div>

        <!-- /content -->
        <div data-role="none" class="ui-ac-tancontent">
          <div class="ui-ac-tancontent-inner">
            <div style="font-size:18px;">
			  <p>
			  <a href="#"><?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?></a>
			  </p>

              <p>Interested in <?php echo $property->getName()?>? Fill out the form below and click “send” or call us at  <?php echo $property->getPhone()?></p>

              <span style="color:#597a2a; font-style:italic;">Hours of Operation:</span><br />
              <?php echo nl2br($property->getHours())?>
            </div>

              <form name="mContact" id="mContact" method="post" action="<?php echo url_for('contact/shortm'); ?>" data-ajax="false">
                <div style="padding:10px 0 10px 0; margin:10px 0 10px 0;">
                <label for="firstname">First Name*:</label>
                <input name="firstname" id="firstname">

                <label for="lastname">Last Name <span class="red">*</span></label>
                <input name="lastname" id="lastname">

                <label for="phonenumber">Phone Number:</label>
                <input name="phonenumber" id="phonenumber">

                <label for="email">Email Address*:</label>
                <input name="email" id="email">

                </div>
                <input type="submit" value="Submit" data-role="none" class="ui-btn ui-shadow ui-btn-corner-all ui-mini btn_submit"/>
              </form>

            </div>
        </div>

        <!-- /footerNav-->
        <div data-role="none" class="ui-ac-footernav">
          <div data-role="none" class="ui-ac-footernav-inner">
             <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Floorplans</a>
             <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Photos</a>
             <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn">Features</a>
             <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-ac-footernav-btn active">Contact Us</a>
          </div>
        </div>

        <!-- /footer-->
        <div data-role="none" class="ui-ac-footer">
            <div data-role="none" class="ui-ac-footer-links">
              <div class="ui-ac-footer-inner">
                <a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
                </div>
            </div>
            <div class="ui-ac-equal-shell">
                <img src="/images/acacia/mobile/equal.png" class="ui-ac-equal">
            </div>
        </div>
      </div>


      </div>
    </body>*/?>
