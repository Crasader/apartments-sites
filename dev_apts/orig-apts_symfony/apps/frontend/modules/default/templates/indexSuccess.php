<div id="home-content">
  <div id="home-left">
    <h1 class="title"><?php echo nl2br($propertyTemplate->getWelcome()); ?></h1>
      <?php echo nl2br($propertyTemplate->getDescription()); ?><br />
      <br />
      <div style="padding:5px; float:left;">
      <strong><?php echo $property->getName()?></strong><br />
      <?php echo $property->getAddress()?><br />
      <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
      <?php if($property->getPhone()):?>
      <strong>Phone: </strong><?php echo $property->getPhone()?><br />
      <?php endif;?>
      <?php if($property->getFax()):?>
      <strong>Fax: </strong> <?php echo $property->getFax()?><br />
      <?php endif;?>
      <?php if($property->getEmail()):?>
      <a href="<?php echo url_for('contact/index')?>" alt="<?php echo $property->getEmail()?>"><img style="padding-top: 10px; border: none;" src="/images/btn_email.png" border="0"></a>
      <?php endif;?>
    </div>
		<?php if($propertyTemplate->getFacebookUrl() != ''):?>
    <div style="padding:5px; float:right">
    <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $propertyTemplate->getFacebookUrl()?>&amp;width=232&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=true&amp;height=200" scrolling="auto" frameborder="0" style="border:none; overflow:hidden; width:232px; height:200px;" allowTransparency="true"></iframe>
    </div>
    <?php endif;?>
  </div>
  <div id="right">
    <div class="right-title">
      <div class="right-title-txt">Announcements</div>
    </div>
    <div class="right-txt">
    	<!-- AddThis Button BEGIN --><div class="addthis_toolbox addthis_default_style "><a class="addthis_button_preferred_1"></a><a class="addthis_button_preferred_2"></a><a class="addthis_button_preferred_3"></a><a class="addthis_button_preferred_4"></a><a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a></div><script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dc4326b35cba14f"></script><!-- AddThis Button END -->
      <br />
      <?php echo nl2br($propertyTemplate->getAnnouncements()); ?>
      <br />
      <br />
      <strong><?php echo $property->getName()?> Apartments</strong><br />
      <?php echo $property->getAddress()?><br />
      <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
      <?php if($property->getPhone()):?>
      <strong>Phone: </strong><?php echo $property->getPhone()?><br />
      <?php endif;?>
      <?php if($property->getFax()):?>
      <strong>Fax: </strong> <?php echo $property->getFax()?><br />
      <?php endif;?>
      <?php if($property->getEmail()):?>
      <a href="<?php echo url_for('contact/index')?>" alt="<?php echo $property->getEmail()?>"><img style="padding-top: 10px; border: none;" src="/images/btn_email.png" border="0"></a>
      <?php endif;?>
      <br />
      <strong>Office Hours</strong><br />
      <?php echo nl2br($property->getHours())?>
      <br />
      <br />
      <strong>Apartment Features</strong><br />
      <?php 
      		$fcount = 0;
      		foreach($property->getPropertyApartmentFeatures() as $feature):
      		$fcount++;
      ?>
          &nbsp;-<?php echo $feature->getApartmentFeature()->getName()?><br />
      <?php
      		if($fcount >= 2) break; 
      		endforeach;?>
      <br />
      <strong>Community Features</strong><br />
      <?php 
      		$ccount = 0;
      		foreach($property->getPropertyCommunityFeatures() as $feature):
      		$ccount++;
      ?>
          &nbsp;-<?php echo $feature->getCommunityFeature()->getName()?><br />
      <?php
      		if($ccount >= 2) break; 
      		endforeach;?>
      <br />
      <strong>Other Services And Features</strong><br />
      <?php 
      		$ocount = 0;
      		foreach($property->getPropertyOtherFeatures() as $feature):
      		$ocount++;
      ?>
          &nbsp;-<?php echo $feature->getOtherFeature()->getName()?><br />
      <?php
      		if($ocount >= 2) break; 
      		endforeach;?>	     		
      <br />
      <?php foreach($communityPhotos as $photo):?>
      	<img src="/uploads/photos/177/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" border="0" alt="Apartments <?php echo $property->getCity()?>" title="Apartments <?php echo $property->getCity()?>" />
    	<?php break; 
    				endforeach;?>		
    	<br />
			<strong><u><?php echo $property->getCity()?> Apartment Community</u></strong>
    </div>
    <?php /*if($propertyTemplate->getFacebookUrl() != ''):?>
    <div style="padding:5px">
    <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $propertyTemplate->getFacebookUrl()?>&amp;width=232&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=true&amp;height=200" scrolling="auto" frameborder="0" style="border:none; overflow:hidden; width:232px; height:200px;" allowTransparency="true"></iframe>
    </div>
    <?php endif;*/?>
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
    <div id="logo"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" title="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" alt="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('home-img') ?>
  <?php if($propertyTemplate->getHomeFlash()):?>
  <script type="text/javascript" src="/js/swfobject.js"></script>
	<script type="text/javascript">
	  var flashvars = {};
	  var params = {};
	  params.quality = "high";
	  params.scale = "noscale";
	  params.wmode = "transparent";
	  params.allowscriptaccess = "sameDomain";
	  var attributes = {};
	  swfobject.embedSWF("/uploads/properties/<?php echo $propertyTemplate->getHomeFlash()?>", "home-img", "950", "544", "9.0.0", false, flashvars, params, attributes);
	</script>
	 <div id="home-img">
        <span><strong>Adobe Flash Player</strong> is required on this homepage. Please use the link below to download the latest version.<br /></span>
    <a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" border="0" /></a><br />
  </div>
  <?php elseif($propertyTemplate->getHomeImage()):?>
    <div id="home-img"><img src="/uploads/properties/<?php echo $propertyTemplate->getHomeImage()?>" alt="Apartments <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>" /></div>
  <?php else:?>
    <div id="home-img"><img src="/images/home-img.jpg" alt="Apartments <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>" /></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('nav') ?>
<div id="nav">
  <div class="nav-item">Home</div>
  <div class="nav-item"><a title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans" href="<?php echo url_for('floorplans/index')?>">Floor Plans</a></div>
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
<?php slot('bot-nav') ?>
<div style="text-align: center; padding: 0px 0px 15px 0px; color: white; font-size:10px;">
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?></div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>