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

		<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>

		<!-- /content -->
		<div data-role="none" class="ui-amc-homecontent">
			<img src="/uploads/properties/<?php echo $propertyTemplate->getHomeImage()?>" class="resizeFull" />
		</div>

		<!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<div data-role="none" class="ui-amc-footernav-inner">
			 <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Floorplans</a>
			 <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Photos</a>
			 <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Features</a>
			 <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Contact Us</a>
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

				<div class="ui-amc-footer-inner">
				<?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
				<a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a></div>
			</div>
			<div class="ui-amc-equal-shell">
				<img src="/images/equal.png" class="ui-amc-equal">
				</div>
		</div>

		</div>

	<!--  **************** /Floor Plans *************************  -->
		<div data-role="page" id="page_floorplans">

		<!-- /header -->
		<div data-role="none" class="ui-amc-header">
			<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>

		<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Floorplans
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

		<!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<div data-role="none" class="ui-amc-footernav-inner">
			 <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn active">Floorplans</a>
			 <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Photos</a>
			 <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Features</a>
			 <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Contact Us</a>
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

				<div class="ui-amc-footer-inner">
				<?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
				<a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a></div>
			</div>
			 <div class="ui-amc-equal-shell">
				<img src="/images/equal.png" class="ui-amc-equal">
				</div>
		</div>
		</div>


	<!--  **************** /Photos *************************  -->
		<div data-role="page" id="page_photos">

		<!-- /header -->
		<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>

		<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Photos
		 </div>

		<!-- /content -->
		<div data-role="none" class="ui-amc-tancontent">
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
			 </div>
		</div>

		<!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<div data-role="none" class="ui-amc-footernav-inner">
			 <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Floorplans</a>
			 <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn active">Photos</a>
			 <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Features</a>
			 <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Contact Us</a>
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

				<div class="ui-amc-footer-inner">
				<?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
				<a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a></div>
			</div>
			 <div class="ui-amc-equal-shell">
				<img src="/images/equal.png" class="ui-amc-equal">
				</div>
		</div>
		</div>

	<!--  **************** /Features *************************  -->
		<div data-role="page" id="page_features">

		<!-- /header -->
		<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>

		<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Features
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

		<!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<div data-role="none" class="ui-amc-footernav-inner">
			 <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Floorplans</a>
			 <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Photos</a>
			 <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn active">Features</a>
			 <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Contact Us</a>
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
				<div class="ui-amc-footer-inner">
				<?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
				<a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a></div>
			</div>
			 <div class="ui-amc-equal-shell">
				<img src="/images/equal.png" class="ui-amc-equal">
				</div>
		</div>
		</div>


	<!--  **************** /Contact Us *************************  -->
		<div data-role="page" id="page_contactus">

		<!-- /header -->
		<div data-role="none" class="ui-amc-header">
		<?php if($propertyTemplate->getLogoImage()):?>
			<img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" />
		<?php else:?>
			<?php echo $property->getName()?>
		<?php endif;?>
		</div>

		<div data-role="none" class="ui-amc-headnav">
			<a href="#page_home" class="navItem"><img src="/images/nav_home.png" class="scaleNav"></a>
			<a href="tel:<?php echo $property->getPhone()?>" class="navItem"><img src="/images/nav_call.png" class="scaleNav"></a>
			<a href="geo:<?php echo $jsonAddress['results'][0]['geometry']['location']['lat']?>,<?php echo $jsonAddress['results'][0]['geometry']['location']['lng']?>" target="_blank" class="lastItem"><img src="/images/nav_map.png" class="scaleNav"></a>
		</div>

		<!-- /title_bar-->
		 <div data-role="none" class="ui-amc-titlebar">
			 Contact Us
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

				<form>
				<div style="padding:10px 0 10px 0; margin:10px 0 10px 0; border-top:2px solid #b0b087; border-bottom:2px solid #b0b087;">
					<label for="fullname">Full Name:</label>
					<input name="fullname" id="fullname">

					<label for="email">Email:</label>
					<input name="email" id="email">

					<label for="">Short Message:</label>
					<textarea cols="40" rows="8" name="message" id="message"></textarea>
				</div>
				<input type="submit" value="Submit" data-role="none" class="ui-btn ui-shadow ui-btn-corner-all ui-mini btn_submit"/>
				</form>


			 </div>
		</div>

		<!-- /footerNav-->
		<div data-role="none" class="ui-amc-footernav">
			<div data-role="none" class="ui-amc-footernav-inner">
			 <a href="#page_floorplans" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Floorplans</a>
			 <a href="#page_photos" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Photos</a>
			 <a href="#page_features" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn">Features</a>
			 <a href="#page_contactus" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="right" class="ui-amc-footernav-btn active">Contact Us</a>
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
				<div class="ui-amc-footer-inner">
					<?php /*<a href="http://www.amcapartments.com" target="_blank">view full site</a>&nbsp;|&nbsp;*/?>
					<a href="http://www.amcapartments.com/termsofuse" target="_blank">terms of use</a>&nbsp;|&nbsp;<a href="http://www.amcapartments.com/privacypolicy"  target="_blank">privacy policy</a>
			  </div>
			</div>
			<div class="ui-amc-equal-shell">
				<img src="/images/equal.png" class="ui-amc-equal">
			</div>
		</div>
  </div>
</div>
<?php slot('tracking-code') ?>
  <?php if($propertyTemplate->getTrackingCode()):?>
    <?php echo $propertyTemplate->getTrackingCode()?>
  <?php endif;?>
<?php end_slot() ?>