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
*/?>


              <?/*
              <script>
              jQuery(document).ready(function($) {

                 // ======== POI  =========================

                  jQuery('.poimap').gMap({
                    latitude: <?php echo $propertyTemplate->getLatitude();?>,
                    longitude: <?php echo $propertyTemplate->getLongitude();?>,
                    zoom: 14,
                    markers:[

                    {
                      latitude: <?php echo $propertyTemplate->getLatitude();?>,
                      longitude: <?php echo $propertyTemplate->getLongitude();?>,
                      html: "<?php echo $property->getName();?><br /><?php echo $property->getAddress()?><br /><?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?>",
                      icon: {
                            image: "/images/amc/<?php echo $property->getCode()?>/favicon.png",
                            iconsize: [26, 46],
                            iconanchor: [12, 46]
                          }
                    },
                    // RESTAURANTS**************
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
                            image: "/images/resp/map-icons/restaurants.png",
                            iconsize: [26, 46],
                            iconanchor: [12, 46]
                          }
                    },
                    <?php
                  endif;
                  endforeach;?>
                    // SCHOOLS**************
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
                            image: "/images/resp/map-icons/schools.png",
                            iconsize: [26, 46],
                            iconanchor: [12, 46]
                          }
                    },
                    <?php
                    endif;
                    endforeach;?>
                    // SHOPPING**************
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
                            image: "/images/resp/map-icons/shopping.png",
                            iconsize: [26, 46],
                            iconanchor: [12, 46]
                          }
                    },
                    <?php
                    endif;
                    endforeach;?>

                    // OUTDOOR ACTVITIES**************
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
                            image: "/images/resp/map-icons/outdoor-activities.png",
                            iconsize: [26, 46],
                            iconanchor: [12, 46]
                          }
                    },
                    <?php
                    endif;
                    endforeach;?>
                    // ENTERTAINMENT**************
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
                            image: "/images/resp/map-icons/entertainment.png",
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
              </script>
              */?>


              <div class="map_wrap">
                  <div id="legend">
                      <div class="iconlabelholder">
                          <div class="iconholder"><img src="/images/resp/map-icons/entertainment.svg"></div>
                          <div class="labelholder">Entertainment</div>

                          <div class="iconholder"><img src="/images/resp/map-icons/outdoor-activities.svg"></div>
                          <div class="labelholder">Outdoor Activities</div>

                          <div class="iconholder"><img src="/images/resp/map-icons/restaurants.svg"></div>
                          <div class="labelholder">Restaurants</div>

                          <div class="iconholder"><img src="/images/resp/map-icons/schools.svg"></div>
                          <div class="labelholder">Schools</div>

                          <div class="iconholder"><img src="/images/resp/map-icons/shopping.svg"></div>
                          <div class="labelholder">Shopping</div>
                      </div>
                  </div>
                      <div id="map-canvas"></div>
                      <?php if($propertyTemplate->getGMapKey() != ''):?>
                      <?php echo $propertyTemplate->getGMapKey()?>
                      <?php else:?>
                      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
                      <?php endif;?>
                      <script>newMap = new placesMap(<?php echo $propertyTemplate->getLatitude()?>,<?php echo $propertyTemplate->getLongitude()?>,"/images/amc/<?php echo $property->getCode()?>/favicon.png","map-canvas");</script>
              </div>
              
</div>
<?php if(in_array($property->getCode(),array('354AX9'))):?>
  <!-- Live Chat Button Code -->
  <div id="live_chat_status"></div>
  <!-- Live Chat Button Code -->
<?php endif;?>
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
    <?php /*<a href="<?php echo url_for('default/index')?>"><img id="logo" src="/images/resp/logo.png" class="image" /></a>*/?>
    <a href="<?php echo url_for('default/index')?>"><img id="logo" class="image" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" title="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" alt="Apartments in <?php echo $property->getCity()?> at <?php echo $property->getName()?> Apartments" border="0" /></a>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>

<?php slot('rentalapp') ?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
&nbsp;&nbsp;&nbsp;<a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
&nbsp;&nbsp;&nbsp;<a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('rentalappm') ?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('ourpage') ?>
<?php if(trim($propertyTemplate->getCustomPageName()) != ''):?>
    &nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a>&nbsp;&nbsp;&nbsp;|
  <?php endif;?>
<?php end_slot() ?>
<?php slot('ourpagem') ?>
<?php if(trim($propertyTemplate->getCustomPageName()) != ''):?>
    <a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a><br />
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
<?php slot('bot-code') ?>
<?php if(in_array($property->getCode(),array('354AX9'))):?>
<!--Start of Chat Window Code-->
<script type='text/javascript' src="https://thelivechatsoftware.com/Dashboard/cwgen/scripts/library.js" ></script>
<script type='text/javascript' src="https://thelivechatsoftware.com/Dashboard/cwgen/Company/RealInteract/axisninemilestation.com/gvars.js" ></script>
<script type='text/javascript' src="https://thelivechatsoftware.com/Dashboard/cwgen/Company/RealInteract/axisninemilestation.com/chatwindow.js" ></script>
<script type='text/javascript' defer="defer" src="https://thelivechatsoftware.com/Dashboard/cwgen/scripts/chatscriptyui.js" ></script>
<!--End of Chat Window Code-->
<?php endif;?>
<?php end_slot() ?>
<?php if(in_array($property->getCode(),array('607SET','673CLR','06COV','11GGR','677GST'))):?>
<?php $shortcode =  $property->getCode();
$shortcode = substr($shortcode,-3,3);?>
<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="https://amc.myresman.com/Portal/Access/SignIn/<?php print $shortcode;?>" target="_blank">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="https://amc.myresman.com/Portal/Access/SignIn/<?php print $shortcode;?>" target="_blank">Resident Center</a><br />
<?php end_slot() ?>

<?php elseif(in_array($property->getCode(),array('28LOT','659LTP','657BWA','615MDR','658CIL','632BLK','605PNA'))):?>
<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('residents/login')?>">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="<?php echo url_for('residents/login')?>">Resident Center</a><br />
<?php end_slot() ?>

<?php else:?>
<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('residents/login')?>">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="<?php echo url_for('residents/login')?>">Resident Center</a><br />
<?php end_slot() ?>
<?php endif;?>