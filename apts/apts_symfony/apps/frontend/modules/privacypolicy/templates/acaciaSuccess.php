<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">

			<div class="page_title_shell">
				<div style="width:140px;" class="page_title_params_secondary">
				Privacy Policy Statement
				</div>
			</div>

			<div class="content_secondary">
<p>This is the web site of <strong><?php echo $property->getName()?></strong>.</p>
<p>Our postal address is<br />
<strong>
<?php echo $property->getAddress()?><br />
<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
</strong></p>
<p>We can be reached via e-mail at <a href="mailto:info@amcapartments.com">info@amcapartments.com</a></p>
<p>For each visitor to our Web page, our Web server automatically recognizes the consumer&#8217;s domain name and e-mail address (where possible).</p>
<p>We collect the domain name and e-mail address (where possible) of visitors to our Web page, the e-mail addresses of those who post messages to our bulletin board, the e-mail addresses of those who communicate with us via e-mail, the e-mail addresses of those who make postings to our chat areas, aggregate information on what pages consumers access or visit, user-specific information on what pages consumers access or visit, information volunteered by the consumer, such as survey information and/or site registrations, name and address, telephone number, fax number, payment information (e.g., credit card number and billing address).</p>
<p>The information we collect is used to improve the content of our Web page, used to customize the content and/or layout of our page for each individual visitor, used to notify consumers about updates to our Web site, shared with agents or contractors who assist in providing support for our internal operations, used by us to contact consumers for marketing purposes, shared with other reputable organizations to help them contact consumers for marketing purposes, disclosed when legally required to do so, at the request of governmental authorities conducting an investigation, to verify or enforce compliance with the policies governing our Website and applicable laws or to protect against misuse or unauthorized use of our Website, to a successor entity in connection with a corporate merger, consolidation, sale of assets or other corporate change respecting the Website.</p>
<p>With respect to cookies: We use cookies to store visitors preferences, record session information, such as items that consumers add to their shopping cart, record user-specific information on what pages users access or visit, alert visitors to new areas that we think might be of interest to them when they return to our site, record past activity at a site in order to provide better service when visitors return to our site , ensure that visitors are not repeatedly sent the same banner ads, customize Web page content based on visitors&#8217; browser type or other information that the visitor sends.</p>
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
					<a href="<?php echo url_for("features/index")?>" class="nav_item">FEATURES</a>
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

<?php /*slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
	<div class="banner_secondary_inner" style="background:url('/images/acacia/banner_community.png') "></div>
</div>
<?php end_slot() */?>

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

<?php /*<div id="banner-gray">
<div id="banner2"><img src="/images/acacia/banner-photo.png" width="1024" height="257" /></div>
</div><!-- end of banner-gray -->

<div id="white-fill">
<div id="wrap-top">
<div id="middle">
<div id="sec-left">
  	<span class="title">Our Community</span><br />
    <br />
    <?php if($propertyTemplate->getCommunityImage()):?>
      <img src="/uploads/properties/<?php echo $propertyTemplate->getCommunityImage()?>" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" border="0" class="community-image" align="left" />
    <?php endif;?>
    <?php echo nl2br($propertyTemplate->getCommunityDescription())?>
    <?php if(!$propertyTemplate->getShowWalkscore()):?>
    <br />
    <span class="color14">Nearby Shopping, Dining, Parks and Attractions  </span><br />
    <?php foreach($arrCommunityAttractions as $communityAttraction):?>
    <?php if(count($communityAttraction) > 1):?>
    <div class="community-row">
    	<div class="community-dist"><?php echo $communityAttraction[1]?></div>
    	<div class="community-item"><?php echo $communityAttraction[0]?></div>
    </div>
    <?php endif;
          endforeach;
    ?>
    <?php else:?>
<script type='text/javascript'>
var ws_wsid = 'd21903d1b6a43f0c958a2a2faee2c083';
var ws_address = '<?php echo $property->getAddress()?>, <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>';
var ws_width = '580';
var ws_height = '286';
var ws_layout = 'horizontal';
</script>
<style type='text/css'>#ws-walkscore-tile{position:relative;text-align:left}
#ws-walkscore-tile *{float:none;}
#ws-footer a,#ws-footer a:link{font:11px Verdana,Arial,Helvetica,sans-serif;margin-right:6px;white-space:nowrap;padding:0;color:#000;font-weight:bold;text-decoration:none}
#ws-footer a:hover{color:#777;text-decoration:none}
#ws-footer a:active{color:#b14900}
</style>
<div id='ws-walkscore-tile'>

</div>
<script type='text/javascript' src='http://www.walkscore.com/tile/show-walkscore-tile.php'></script>
<?php endif;?>
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
  <div id="sec-left">
  	<span class="title">Our Community</span><br />
    <br />
    <?php if($propertyTemplate->getCommunityImage()):?>
      <img src="/uploads/properties/<?php echo $propertyTemplate->getCommunityImage()?>" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" border="0" class="community-image" align="left" />
    <?php endif;?>
    <?php echo nl2br($propertyTemplate->getCommunityDescription())?>
    <?php if(!$propertyTemplate->getShowWalkscore()):?>
    <br />
    <span class="color14">Nearby Shopping, Dining, Parks and Attractions  </span><br />
    <?php foreach($arrCommunityAttractions as $communityAttraction):?>
    <?php if(count($communityAttraction) > 1):?>
    <div class="community-row">
    	<div class="community-dist"><?php echo $communityAttraction[1]?></div>
    	<div class="community-item"><?php echo $communityAttraction[0]?></div>
    </div>
    <?php endif;
          endforeach;
    ?>
    <?php else:?>
<script type='text/javascript'>
var ws_wsid = 'd21903d1b6a43f0c958a2a2faee2c083';
var ws_address = '<?php echo $property->getAddress()?>, <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>';
var ws_width = '580';
var ws_height = '286';
var ws_layout = 'horizontal';
</script>
<style type='text/css'>#ws-walkscore-tile{position:relative;text-align:left}
#ws-walkscore-tile *{float:none;}
#ws-footer a,#ws-footer a:link{font:11px Verdana,Arial,Helvetica,sans-serif;margin-right:6px;white-space:nowrap;padding:0;color:#000;font-weight:bold;text-decoration:none}
#ws-footer a:hover{color:#777;text-decoration:none}
#ws-footer a:active{color:#b14900}
</style>
<div id='ws-walkscore-tile'>

</div>
<script type='text/javascript' src='http://www.walkscore.com/tile/show-walkscore-tile.php'></script>
<?php endif;?>
  </div>
  <div id="right">
  	<div class="right-title">
    	<div class="right-title-txt">Community Photos</div>
    </div>
    <div class="right-txt">
    <?php foreach($communityPhotos as $photo):?>
      <img src="/uploads/photos/177/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" title="<?php echo $photo->getName()?>" border="0" />
    <?php endforeach;?>
    	<!-- img src="/images/our-community-1.jpg" alt="sample1" />
      <img src="/images/our-community-2.jpg" alt="sample1" />
      <img src="/images/our-community-3.jpg" alt="sample1" /-->
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
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartment Complex - Features" href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item">Our Community</div>
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