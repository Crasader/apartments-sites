<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">

			<div class="page_title_shell">
				<div style="width:140px;" class="page_title_params_secondary">
				Terms of Use
				</div>
			</div>

			<div class="content_secondary">


<b>Web Site Terms and Conditions of Use</b><br />
<b>1. Terms</b>
<p>By accessing this web site, you are agreeing to be bound by these web site Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this web site are protected by applicable copyright and trade mark law.</p>
<b>2. Use License</b>
<ol type="a">
<li>Permission is granted to temporarily download one copy of the materials (information or software) on <?php echo $property->getName()?>&#8217;s web site for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
<ol type="i">
<li>modify or copy the materials;</li>
<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
<li>attempt to decompile or reverse engineer any software contained on <?php echo $property->getName()?>&#8217;s web site;</li>
<li>remove any copyright or other proprietary notations from the materials; or</li>
<li>transfer the materials to another person or &#8220;mirror&#8221; the materials on any other server.</li>

</ol>
</li>
<li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by <?php echo $property->getName()?> at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
</ol>
<b>3. Disclaimer</b>
<ol type="a">
<li>The materials on <?php echo $property->getName()?>&#8217;s web site are provided &#8220;as is&#8221;. <?php echo $property->getName()?> makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, <?php echo $property->getName()?> does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.</li>
</ol>
<b>4. Limitations</b>
<p>In no event shall <?php echo $property->getName()?> or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on <?php echo $property->getName()?>&#8217;s Internet site, even if <?php echo $property->getName()?> or a <?php echo $property->getName()?> authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>

<b>5. Revisions and Errata</b>
<p>The materials appearing on <?php echo $property->getName()?>&#8217;s web site could include technical, typographical, or photographic errors. <?php echo $property->getName()?> does not warrant that any of the materials on its web site are accurate, complete, or current. <?php echo $property->getName()?> may make changes to the materials contained on its web site at any time without notice. <?php echo $property->getName()?> does not, however, make any commitment to update the materials.</p>
<b>6. Links</b>
<p><?php echo $property->getName()?> has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by <?php echo $property->getName()?> of the site. Use of any such linked web site is at the user&#8217;s own risk.</p>
<b>7. Site Terms of Use Modifications</b>
<p><?php echo $property->getName()?> may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.</p>
<b>8. Governing Law</b>
<p>Any claim relating to <?php echo $property->getName()?>&#8217;s web site shall be governed by the laws of the State of <?php echo $property->getState()->getName()?> without regard to its conflict of law provisions.</p>


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
					<a href="<?php echo url_for("floorplans/index")?>" class="nav_item">FLOOR PLANS</a>
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
<a href="<?php echo url_for('contact/index')?>"><?php echo $property->getEmail()?></a><br />
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