  <script type="text/javascript">
  jQuery.noConflict();
	jQuery(document).ready(function() {
//     var venderPrefix = (jQuery.browser.webkit)  ? 'Webkit' :
//                   (jQuery.browser.mozilla) ? 'Moz' :
//                   (jQuery.browser.ms)      ? 'Ms' :
//                   (jQuery.browser.opera)   ? 'O' : '';
//        var ratio = jQuery(window).width() / jQuery('#mainContainer').width();
//        jQuery('#mainContainer').css(venderPrefix + 'Transform', 'scale(' + ratio + ')');
     var newWidth = jQuery(window).width();
     jQuery('.containerScale').css('font-size', newWidth+'px');

     //alert(jQuery(window).width());

	 jQuery.validator.addMethod("phoneCustom", function(phone_number, element) {
				phone_number = phone_number.replace(/\s+/g, "");
				return this.optional(element) || phone_number.length > 9 &&
				phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
		}, "<div class='error_shell'><div class='error_inner'>Please enter a valid phone number.</div></div>");

	 jQuery("#mContact").validate({
			 errorContainer: ".error_shell",
			 errorLabelContainer: ".error_inner",
			 errorElement: "div",
				rules: {
					firstname: "required",
					lastname: "required",
					email: {
						required: true,
						email: true
					},
					phone: {
						phoneCustom: true
					}
				},
				messages: {
					firstname: "<div class='error_shell'><div class='error_inner'>First Name Required</div></div>",
					lastname: "<div class='error_shell'><div class='error_inner'>Last Name Required.</div></div>",
					email: "<div class='error_shell'><div class='error_inner'>Email Invalid.</div></div>",
			 }
	 });
});
</script>

<div data-role="content">
	<!--  **************** /Home Page *************************  -->
	<div data-role="page" id="page_home">

		<!-- /header -->
		<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>

		<?php /*<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<?php /*<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>*/?>
			<?php /*<a href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>*/?>

		<!-- /content -->
		<div data-role="none" class="ui-amc-homecontent" style="background:url('/uploads/properties/<?php echo $propertyTemplate->getHomeImage()?>') top center; background-size: cover;">
			<?php /*<img src="/uploads/properties/<?php echo $propertyTemplate->getHomeImage()?>" class="resizeFull" />*/?>
		</div>

		<!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="#page_floorplans" class="navItem"><img src="/images/nav_floorplans.png" class="scaleNav"></a>
			<a href="#page_photos" class="navItem"><img src="/images/nav_photos.png" class="scaleNav"></a>
			<a href="#page_features" class="navItem"><img src="/images/nav_features.png" class="scaleNav"></a>
			<a href="#page_contactus"class="lastItem"><img src="/images/nav_contact.png" class="scaleNav"></a>
		</div>

		<!-- /footer-->
		<div data-role="none" class="ui-amc-footer">
			<div data-role="none" class="ui-amc-footer-info">
				<?php echo $property->getName()?><br />
				<?php if($property->getPhone()):?>
				<a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
				<?php endif;?>
				<?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
			</div>

			<div data-role="none" class="ui-amc-footer-divider"></div>

      <div data-role="none" class="ui-amc-footer-links">
        <div class="ui-amc-equal-shell">
         <img src="/images/equal_invert.png" class="ui-amc-equal">
        </div>

        <div class="ui-amc-footer-inner">
          <?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
          <a class="ui-link" href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;
          <a class="ui-link" href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy&nbsp;|&nbsp;
          <a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
        </div>
      </div>

		</div>

	<!--  **************** /Floor Plans *************************  -->
		<div data-role="page" id="page_floorplans">

		<!-- /header -->
		<?php /*<div data-role="none" class="ui-amc-header">
			<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>*/?>

		<?php /*<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<?php /*<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>*/?>
			<?php /*<a href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>*/?>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Floorplans
		 </div>

		 <!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="#page_floorplans" class="navItem"><img src="/images/nav_floorplans.png" class="scaleNav"></a>
			<a href="#page_photos" class="navItem"><img src="/images/nav_photos.png" class="scaleNav"></a>
			<a href="#page_features" class="navItem"><img src="/images/nav_features.png" class="scaleNav"></a>
			<a href="#page_contactus"class="lastItem"><img src="/images/nav_contact.png" class="scaleNav"></a>
		</div>

		<!-- /content -->
		<div data-role="none" class="ui-amc-tancontent">
		<?php foreach($property->getPropertyFloorPlans() as $floorplan):?>
			<!-- floorplan 1 -->
			 <div data-role="none" class="ui-amc-floorplan first_floorplan" >
				<div data-role="none" class="ui-amc-floorplan_inner first_floorplan_inner " >

				<table cellpadding="0" cellspacing="0">
					<tr valign="middle">
					<td class="tb_thumb ">
						<img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" class="floorplan_thumb" />
					</td>
					<td>
					<span class="floorplan_name"><?php echo $floorplan->getName();?></span><br />
						<span class="floorplan_details">
							<?php echo $floorplan->getBedrooms();?> Bedroom(s), <?php echo $floorplan->getBathrooms();?> Bath<br />
							<?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
							Lease: <?php echo $floorplan->getLeaseTerm();?><br />
							Deposit: <?php echo $floorplan->getDeposit();?>
						</span>
					</td>
					</tr>
					<tr>
					<td></td>
					<td>
						<table cellpadding="0" cellspacing="0">
						<tr>
							<td class="tb_price"><span class="floorplan_price"><?php echo $floorplan->getPrice();?></span></td>
							<td><a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" data-role="button" data-mini="true" class="floorplan_btn" target="_blank">View Larger</a></td>
						</tr>
						</table>
					</td>
					</tr>
					<tr>
					<td></td>
					<td><span class="floorplan_subject">*prices subject to change.</span></td>
					</tr>
				</table>

				</div>
			 </div>
		<?php endforeach;?>



		</div>

		<!-- /footer-->
		<div data-role="none" class="ui-amc-footer">
			<div data-role="none" class="ui-amc-footer-info">
				<?php echo $property->getName()?><br />
				<?php if($property->getPhone()):?>
				<a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
				<?php endif;?>
				<?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
			</div>

			<div data-role="none" class="ui-amc-footer-divider"></div>

			<div data-role="none" class="ui-amc-footer-links">
        <div class="ui-amc-equal-shell">
         <img src="/images/equal_invert.png" class="ui-amc-equal">
        </div>

        <div class="ui-amc-footer-inner">
          <?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
          <a class="ui-link" href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;
          <a class="ui-link" href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy&nbsp;|&nbsp;
          <a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
        </div>
      </div>
		</div>


	<!--  **************** /Photos *************************  -->
		<div data-role="page" id="page_photos">

		<!-- /header -->
		<?php /*<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>*/?>

		<?php /*<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<?php /*<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>*/?>
			<?php /*<a href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>*/?>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Photos
		 </div>

		 <!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="#page_floorplans" class="navItem"><img src="/images/nav_floorplans.png" class="scaleNav"></a>
			<a href="#page_photos" class="navItem"><img src="/images/nav_photos.png" class="scaleNav"></a>
			<a href="#page_features" class="navItem"><img src="/images/nav_features.png" class="scaleNav"></a>
			<a href="#page_contactus"class="lastItem"><img src="/images/nav_contact.png" class="scaleNav"></a>
		</div>

		<!-- /content -->
		<div data-role="none" class="ui-amc-tancontent">
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
      </div>
		<?php /*
			 <div data-role="none" class="photoParam"><img src="/uploads/photos/<?php echo $mainPhotos[0]->getImage()?>"  class="resizeFull" id="currentPhoto"/></div>
			 <div data-role="none" class="photoNav">
				<table class="photoTable" cellpadding="0" cellspacing="0" width="100%" height="75">
					<tr>
					<td width="55"><div class="photoNavLeft"><img src="/images/left_arrow.png" /></div></td>
					<td width="100%" align="center" >
						<div class="photoNavScroller">
						<div class="photoGroup">
						<?php foreach($mainPhotos as $photo):?>
						<?php if($photo->getImage()):?>
							<div class="photoItem" ref="/uploads/photos/<?php echo $photo->getImage()?>"><img src="/uploads/photos/<?php echo $photo->getImage()?>" class="photoThumb"/></div>
						<?php endif;?>
						<?php endforeach;?>
						</div>
						</div>
					</td>
					<td width="55"><div class="photoNavRight"><img src="/images/right_arrow.png" /></div></td>
					</tr>
				</table>
			 </div>*/?>
		</div>



		<!-- /footer-->
		<div data-role="none" class="ui-amc-footer">
			<div data-role="none" class="ui-amc-footer-info">
				<?php echo $property->getName()?><br />
				<?php if($property->getPhone()):?>
				<a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
				<?php endif;?>
				<?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
			</div>

			<div data-role="none" class="ui-amc-footer-divider"></div>

			<div data-role="none" class="ui-amc-footer-links">
        <div class="ui-amc-equal-shell">
         <img src="/images/equal_invert.png" class="ui-amc-equal">
        </div>

        <div class="ui-amc-footer-inner">
          <?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
          <a class="ui-link" href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;
          <a class="ui-link" href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy&nbsp;|&nbsp;
          <a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
        </div>
      </div>
		</div>

	<!--  **************** /Features *************************  -->
		<div data-role="page" id="page_features">

		<!-- /header -->
		<?php /*<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>*/?>

		<?php /*<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<?php /*<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>*/?>
			<?php /*<a href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>*/?>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Features
		 </div>

		 <!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="#page_floorplans" class="navItem"><img src="/images/nav_floorplans.png" class="scaleNav"></a>
			<a href="#page_photos" class="navItem"><img src="/images/nav_photos.png" class="scaleNav"></a>
			<a href="#page_features" class="navItem"><img src="/images/nav_features.png" class="scaleNav"></a>
			<a href="#page_contactus"class="lastItem"><img src="/images/nav_contact.png" class="scaleNav"></a>
		</div>

		<!-- /content -->
		<div data-role="none" class="ui-amc-tancontent">
			<div class="ui-amc-tancontent-inner">
			<h2>Apartment Features:</h2>
			<ul>
			<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
				<li><?php echo $feature->getApartmentFeature()->getName()?></li>
			<?php endforeach;?>
			</ul>

			<h2>Community Features:</h2>
			<ul>
			<?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
        <li><?php echo $feature->getCommunityFeature()->getName()?></li>
      <?php endforeach;?>
			</ul>

			<h2>Other Services And Features:</h2>
			<ul>
			<?php foreach($property->getPropertyOtherFeatures() as $feature):?>
        <li><?php echo $feature->getOtherFeature()->getName()?></li>
       <?php endforeach;?>
			</ul>
			</div>
		</div>


		<!-- /footer-->
		<div data-role="none" class="ui-amc-footer">
			<div data-role="none" class="ui-amc-footer-info">
				<?php echo $property->getName()?><br />
				<?php if($property->getPhone()):?>
				<a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
				<?php endif;?>
				<?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
			</div>

			<div data-role="none" class="ui-amc-footer-divider"></div>

			<div data-role="none" class="ui-amc-footer-links">
        <div class="ui-amc-equal-shell">
         <img src="/images/equal_invert.png" class="ui-amc-equal">
        </div>

        <div class="ui-amc-footer-inner">
          <?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
          <a class="ui-link" href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;
          <a class="ui-link" href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy&nbsp;|&nbsp;
          <a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
        </div>
      </div>
		</div>

		<!--  **************** /Contact Thank you *************************  -->
		<div data-role="page" id="page_thankyou">

		<!-- /header -->
		<?php /*<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>*/?>

		<?php /*<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<?php /*<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>*/?>
			<?php /*<a href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>*/?>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Contact Us
		 </div>

		 <!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="#page_floorplans" class="navItem"><img src="/images/nav_floorplans.png" class="scaleNav"></a>
			<a href="#page_photos" class="navItem"><img src="/images/nav_photos.png" class="scaleNav"></a>
			<a href="#page_features" class="navItem"><img src="/images/nav_features.png" class="scaleNav"></a>
			<a href="#page_contactus"class="lastItem"><img src="/images/nav_contact.png" class="scaleNav"></a>
		</div>

		<!-- /content -->
		<div data-role="none" class="ui-amc-tancontent">
		<div class="ui-amc-tancontent-inner">
			<div style="color:#2c6e96; font-size:18px;">
					<p>Thank you <br />Your information has been sent.</p>

				</div>
			</div>
		</div>


		<!-- /footer-->
		<div data-role="none" class="ui-amc-footer">
			<div data-role="none" class="ui-amc-footer-info">
				<?php echo $property->getName()?><br />
				<?php if($property->getPhone()):?>
				<a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
				<?php endif;?>
				<?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
			</div>

			<div data-role="none" class="ui-amc-footer-divider"></div>

			<div data-role="none" class="ui-amc-footer-links">
        <div class="ui-amc-equal-shell">
         <img src="/images/equal_invert.png" class="ui-amc-equal">
        </div>

        <div class="ui-amc-footer-inner">
          <?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
          <a class="ui-link" href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;
          <a class="ui-link" href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy&nbsp;|&nbsp;
          <a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
        </div>
      </div>
		</div>


	<!--  **************** /Contact Us *************************  -->
		<div data-role="page" id="page_contactus">

		<!-- /header -->
		<?php /*<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>*/?>

		<?php /*<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<?php /*<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>*/?>
			<?php /*<a href="http://maps.google.com/maps?z=15&q=<?php echo $property->getAddress()?>,+<?php echo $property->getCity()?>,+<?php echo $property->getState()->getCode()?>+(<?php echo $property->getName()?>)" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>*/?>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Contact Us
		 </div>

		 		<!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="#page_floorplans" class="navItem"><img src="/images/nav_floorplans.png" class="scaleNav"></a>
			<a href="#page_photos" class="navItem"><img src="/images/nav_photos.png" class="scaleNav"></a>
			<a href="#page_features" class="navItem"><img src="/images/nav_features.png" class="scaleNav"></a>
			<a href="#page_contactus"class="lastItem"><img src="/images/nav_contact.png" class="scaleNav"></a>
		</div>

		<!-- /content -->
		<div data-role="none" class="ui-amc-tancontent">
			<div class="ui-amc-tancontent-inner">
				<div style="color:#2c6e96; font-size:18px;">
					<p>Fill out the form below to receive more information about <?php echo $property->getName()?></p>

					<p>Call us at: <a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a></p>

					Office Hours:<br />
					<?php echo nl2br($property->getHours())?>
				</div>

				<form name="mContact" id="mContact" method="post" action="<?php echo url_for('contact/shortm'); ?>" data-ajax="false">
				<div style="padding:10px 0 10px 0; margin:10px 0 10px 0; border-top:2px solid #b0b087; border-bottom:2px solid #b0b087;">
					<label for="firstname">First Name <span class="red">*</span></label>
					<input name="firstname" id="firstname">

					<label for="lastname">Last Name <span class="red">*</span></label>
					<input name="lastname" id="lastname">

					<label for="email">Email <span class="red">*</span></label>
					<input name="email" id="email">

					<label for="phone">Phone (optionall)</label>
					<input name="phone" id="phone">
				</div>
				<input type="submit" value="Submit" data-role="none" class="ui-btn ui-shadow ui-btn-corner-all ui-mini btn_submit"/>
				</form>


			 </div>
		</div>


		<!-- /footer-->
		<div data-role="none" class="ui-amc-footer">
			<div data-role="none" class="ui-amc-footer-info">
				<?php echo $property->getName()?><br />
				<?php if($property->getPhone()):?>
				<a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
				<?php endif;?>
				<?php echo $property->getAddress()?><br />
				<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
			</div>

			<div data-role="none" class="ui-amc-footer-divider"></div>

			<div data-role="none" class="ui-amc-footer-links">
        <div class="ui-amc-equal-shell">
         <img src="/images/equal_invert.png" class="ui-amc-equal">
        </div>

        <div class="ui-amc-footer-inner">
          <?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
          <a class="ui-link" href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;
          <a class="ui-link" href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy&nbsp;|&nbsp;
          <a class="ui-link" href="http://translate.google.com/translate?hl=en&sl=en&tl=es&u=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">translate</a></div>
        </div>
      </div>
  </div>
</div>
<?php slot('tracking-code') ?>
  <?php if($propertyTemplate->getTrackingCode()):?>
    <?php echo $propertyTemplate->getTrackingCode()?>
  <?php endif;?>
<?php end_slot() ?>