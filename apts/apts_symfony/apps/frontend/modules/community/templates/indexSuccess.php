<div id="sec-content">
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
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a></div>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <?php endif;?>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<?php end_slot() ?>
<?php slot('bot-nav') ?>
<div style="text-align: center; padding: 0px 0px 15px 0px; color: white; font-size:10px;">
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?>&nbsp;&nbsp;<img style="vertical-align:middle;" src="/images/icon_equal_housing.png"/></div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>