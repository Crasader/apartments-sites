<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">

			<?php if($propertyTemplate->getGMapKey() != ''):?>
          	<?php echo $propertyTemplate->getGMapKey()?>
          	<?php else:?>
          	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
          	<?php endif;?>
          	
			<?php /*<div class="page_title_shell">
				<div style="width:140px;" class="page_title_params_secondary">
					COMMUNITY
				</div>
			</div>*/?>

			<div class="content_secondary">
				<script>
				jQuery(document).ready(function($) {

					 jQuery('.com_acc h3').click(function(e) {
						jQuery(e.target).next('div').siblings('div').slideUp('fast');
						jQuery(e.target).next('div').slideToggle('fast');
					 });

					 jQuery('.acc_expander').click(function(e) {
						jQuery(e.target).parent().next('div').siblings('div').slideUp('fast');
						jQuery(e.target).parent().next('div').slideToggle('fast');
					 });

					 // ======== POI ENTERTAINMENT =========================
					jQuery('.poi_entertainment').click(function(e) {
						jQuery('.poimap').gMap({
							latitude: <?php echo $propertyTemplate->getLatitude();?>,
							longitude: <?php echo $propertyTemplate->getLongitude();?>,
							zoom: 12,
							markers:[
							{
								latitude: <?php echo $propertyTemplate->getLatitude();?>,
								longitude: <?php echo $propertyTemplate->getLongitude();?>,
								html: "<?php echo $property->getName();?>",
								icon: {
											image: "/images/acacia/gmap_acacia.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'entertainment'):
								$rowCnt++;
							?>

							{
								latitude: <?php echo $propertyCommunityMap->getLatitude();?>,
								longitude: <?php echo $propertyCommunityMap->getLongitude();?>,
								html: "<?php echo $propertyCommunityMap->getName();?>",
								icon: {
											image: "/images/acacia/gmap_<?php echo $rowCnt?>.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								endif;
								endforeach;?>
							<?php /*{
								latitude: 33.307067,
								longitude: -111.841294,
								html: "Chandler Center for the Arts",
								icon: {
											image: "/images/acacia/gmap_1.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							{
								latitude: 33.269554,
								longitude: -111.835770,
								html: "<a href=http://www.azrymuseum.org/ target=_blank>Arizona Railway Museum</a><br>Arizona Railway Museum<br>Arizona Railway Museum<br>",
								icon: {
											image: "/images/acacia/gmap_2.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
						{
								latitude: 33.303451,
								longitude: -111.838890,
								html: "Chandler Museum",
								icon: {
											image: "/images/acacia/gmap_3.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							{
								latitude: 33.300556,
								longitude: -111.841268,
								html: "Vision Gallery",
								icon: {
											image: "/images/acacia/gmap_4.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},*/?>

							]
						});
					 });

					 // ======== POI OUTDOOR ACTIVITIES =========================
					jQuery('.poi_outdoor').click(function(e) {
						jQuery('.poimap').gMap({
							latitude: <?php echo $propertyTemplate->getLatitude();?>,
							longitude: <?php echo $propertyTemplate->getLongitude();?>,
							zoom: 12,
							markers:[
							{
								latitude: <?php echo $propertyTemplate->getLatitude();?>,
								longitude: <?php echo $propertyTemplate->getLongitude();?>,
								html: "<?php echo $property->getName();?>",
								icon: {
											image: "/images/acacia/gmap_acacia.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'outdoor'):
								$rowCnt++;
							?>

							{
								latitude: <?php echo $propertyCommunityMap->getLatitude();?>,
								longitude: <?php echo $propertyCommunityMap->getLongitude();?>,
								html: "<?php echo $propertyCommunityMap->getName();?>",
								icon: {
											image: "/images/acacia/gmap_<?php echo $rowCnt?>.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								endif;
								endforeach;?>
							]
						});
					 });

					 // ======== POI RESTAURANTS =========================
					jQuery('.poi_restaurants').click(function(e) {
						jQuery('.poimap').gMap({
							latitude: <?php echo $propertyTemplate->getLatitude();?>,
							longitude: <?php echo $propertyTemplate->getLongitude();?>,
							zoom: 12,
							markers:[
							{
								latitude: <?php echo $propertyTemplate->getLatitude();?>,
								longitude: <?php echo $propertyTemplate->getLongitude();?>,
								html: "<?php echo $property->getName();?>",
								icon: {
											image: "/images/acacia/gmap_acacia.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'restaurants'):
								$rowCnt++;
							?>

							{
								latitude: <?php echo $propertyCommunityMap->getLatitude();?>,
								longitude: <?php echo $propertyCommunityMap->getLongitude();?>,
								html: "<?php echo $propertyCommunityMap->getName();?>",
								icon: {
											image: "/images/acacia/gmap_<?php echo $rowCnt?>.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								endif;
								endforeach;?>
							]
						});
					 });

					 // ======== POI SCHOOLS =========================
					jQuery('.poi_schools').click(function(e) {
						jQuery('.poimap').gMap({
							latitude: <?php echo $propertyTemplate->getLatitude();?>,
							longitude: <?php echo $propertyTemplate->getLongitude();?>,
							zoom: 12,
							markers:[
							{
								latitude: <?php echo $propertyTemplate->getLatitude();?>,
								longitude: <?php echo $propertyTemplate->getLongitude();?>,
								html: "<?php echo $property->getName();?>",
								icon: {
											image: "/images/acacia/gmap_acacia.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'schools'):
								$rowCnt++;
							?>

							{
								latitude: <?php echo $propertyCommunityMap->getLatitude();?>,
								longitude: <?php echo $propertyCommunityMap->getLongitude();?>,
								html: "<?php echo $propertyCommunityMap->getName();?>",
								icon: {
											image: "/images/acacia/gmap_<?php echo $rowCnt?>.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								endif;
								endforeach;?>
							]
						});
					 });

					 // ======== POI SHOPPING =========================
					jQuery('.poi_shopping').click(function(e) {
						jQuery('.poimap').gMap({
							latitude: <?php echo $propertyTemplate->getLatitude();?>,
							longitude: <?php echo $propertyTemplate->getLongitude();?>,
							zoom: 12,
							markers:[
							{
								latitude: <?php echo $propertyTemplate->getLatitude();?>,
								longitude: <?php echo $propertyTemplate->getLongitude();?>,
								html: "<?php echo $property->getName();?>",
								icon: {
											image: "/images/acacia/gmap_acacia.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'shopping'):
								$rowCnt++;
							?>

							{
								latitude: <?php echo $propertyCommunityMap->getLatitude();?>,
								longitude: <?php echo $propertyCommunityMap->getLongitude();?>,
								html: "<?php echo $propertyCommunityMap->getName();?>",
								icon: {
											image: "/images/acacia/gmap_<?php echo $rowCnt?>.png",
											iconsize: [26, 46],
											iconanchor: [12, 46]
										}
							},
							<?php
								endif;
								endforeach;?>
							]
						});
					 });


				 jQuery('.poimap').gMap({
					latitude: <?php echo $propertyTemplate->getLatitude();?>,
					longitude: <?php echo $propertyTemplate->getLongitude();?>,
					zoom: 12,
					markers:[
					{
						latitude: <?php echo $propertyTemplate->getLatitude();?>,
						longitude: <?php echo $propertyTemplate->getLongitude();?>,
						html: "<?php echo $property->getName();?>",
						icon: {
									image: "/images/acacia/gmap_acacia.png",
									iconsize: [26, 46],
									iconanchor: [12, 46]
								}
					},
					]
				});
				});
				</script>
        <div class="comm_outer">
          <div class="comm_params">
            <div class="comm_inner poimap">

						</div>
						</div>
					 </div><!-- end of feature-comm -->

					<div class="com_acc">
					<h3 class="h3_acc poi_entertainment">ENTERTAINMENT<div class="acc_expander"></div></h3>
					<div class="acc_content">
						 <ul>
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'entertainment'):
								$rowCnt++;
							?>
							<?php if($propertyCommunityMap->getUrl()):?>
								<li><a href="<?php echo $propertyCommunityMap->getUrl();?>" target="_blank"><?php echo $propertyCommunityMap->getName();?></a></li>
							<?php else:?>
								<li><?php echo $propertyCommunityMap->getName();?></li>
							<?php endif;?>
							<?php if($rowCnt % 3 == 0):?>
								</ul><ul>
							<?php endif;?>
							<?php
								endif;
								endforeach;?>
							</ul>
					<?php /*<div class="acc_content">
						 <ul>
							<li><a href="http://www.chandlercenter.org/entry.html" target="_blank">Chandler Center for the Arts</a></li>
							<li><a href="http://www.azrymuseum.org/" target="_blank">Arizona Railway Museum</a></li>
							<li><a href="http://www.chandlermuseum.org/" target="_blank">Chandler Museum</a></li>
						</ul>

						<ul>
							<li><a href="http://www.visiongallery.org/" target="_blank">Vision Gallery</a></li>

						</ul>*/?>
					</div>
					<h3 class="h3_acc poi_outdoor">OUTDOOR ACTIVITIES<div class="acc_expander"></div></h3>
					<div class="acc_content">
						 <ul>
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'outdoor'):
								$rowCnt++;
							?>
							<?php if($propertyCommunityMap->getUrl()):?>
								<li><a href="<?php echo $propertyCommunityMap->getUrl();?>" target="_blank"><?php echo $propertyCommunityMap->getName();?></a></li>
							<?php else:?>
								<li><?php echo $propertyCommunityMap->getName();?></li>
							<?php endif;?>
							<?php if($rowCnt % 3 == 0):?>
								</ul><ul>
							<?php endif;?>
							<?php
								endif;
								endforeach;?>
							</ul>
					</div>
					<h3 class="h3_acc poi_restaurants">RESTAURANTS<div class="acc_expander"></div></h3>
					<div class="acc_content">
						 <ul>
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'restaurants'):
								$rowCnt++;
							?>
							<?php if($propertyCommunityMap->getUrl()):?>
								<li><a href="<?php echo $propertyCommunityMap->getUrl();?>" target="_blank"><?php echo $propertyCommunityMap->getName();?></a></li>
							<?php else:?>
								<li><?php echo $propertyCommunityMap->getName();?></li>
							<?php endif;?>
							<?php if($rowCnt % 3 == 0):?>
								</ul><ul>
							<?php endif;?>
							<?php
								endif;
								endforeach;?>
							</ul>
					</div>
					<h3 class="h3_acc poi_schools">SCHOOLS<div class="acc_expander"></div></h3>
					<div class="acc_content">
						 <ul>
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'schools'):
								$rowCnt++;
							?>
							<?php if($propertyCommunityMap->getUrl()):?>
								<li><a href="<?php echo $propertyCommunityMap->getUrl();?>" target="_blank"><?php echo $propertyCommunityMap->getName();?></a></li>
							<?php else:?>
								<li><?php echo $propertyCommunityMap->getName();?></li>
							<?php endif;?>
							<?php if($rowCnt % 3 == 0):?>
								</ul><ul>
							<?php endif;?>
							<?php
								endif;
								endforeach;?>
							</ul>
					</div>
					<h3 class="h3_acc poi_shopping">SHOPPING<div class="acc_expander"></div></h3>
					<div class="acc_content">
						<ul>
							<?php
								$rowCnt = 0;
								foreach($propertyCommunityMaps as $propertyCommunityMap):
								if($propertyCommunityMap->getType() == 'shopping'):
								$rowCnt++;
							?>
							<?php if($propertyCommunityMap->getUrl()):?>
								<li><a href="<?php echo $propertyCommunityMap->getUrl();?>" target="_blank"><?php echo $propertyCommunityMap->getName();?></a></li>
							<?php else:?>
								<li><?php echo $propertyCommunityMap->getName();?></li>
							<?php endif;?>
							<?php if($rowCnt % 3 == 0):?>
								</ul><ul>
							<?php endif;?>
							<?php
								endif;
								endforeach;?>
							</ul>
					</div>
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
					<a href="<?php echo url_for("community/index")?>" class="nav_item active">COMMUNITY</a>
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