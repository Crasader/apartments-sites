<!-- banner:start -->
<?php /*<div style="float:left; width:999px;">
  <img src="/images/jsp/banner_contact.jpg" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
</div>*/?>
<!-- banner:end -->


<!-- Content:start -->
<div class="content_container">
  <div class="content_container_params">
    <div class="content_container_margins">
      <div class="page_title_shell">
        <div style="width:100%;" class="page_title_params_secondary">
          THE NEIGHBORHOOD
        </div>
      </div>

      <div class="content_intro_sub">
        <?php echo nl2br($propertyTemplate->getCommunityDescription())?>
      </div>

      <div class="content_secondary">

      <?php if ((int)$propertyTemplate->getLatitude() > 0):?>
      <div class="map_wrap">
      <div id="legend">
        <div class="iconlabelholder">
          <div class="iconholder"><img src="/images/jsp/entertainment.svg"></div>
          <div class="labelholder">Entertainment</div>
          <div class="iconholder"><img src="/images/jsp/outdoor-activities.svg"></div>
          <div class="labelholder">Outdoor Activities</div>
          <div class="iconholder"><img src="/images/jsp/restaurants.svg"></div>
          <div class="labelholder">Restaurants</div>
          <div class="iconholder"><img src="/images/jsp/schools.svg"></div>
          <div class="labelholder">Schools</div>
          <div class="iconholder"><img src="/images/jsp/shopping.svg"></div>
          <div class="labelholder">Shopping</div>
        </div>
      </div>

      <div id="map-canvas"></div>
      <?php if($propertyTemplate->getGMapKey() != ''):?>
      <?php echo $propertyTemplate->getGMapKey()?>
      <?php else:?>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
      <?php endif;?>
      
      <script>newMap = new placesMap(<?php echo $propertyTemplate->getLatitude()?>,<?php echo $propertyTemplate->getLongitude()?>,"/images/jsp/<?php echo $property->getCode()?>/favicon.png","map-canvas");</script>

      </div>
      <?php else:?>
      <div style="margin:0 0 0 150px;">
      <div id="contact-map">
        <iframe width="600" height="400" frameborder="0" scrolling="no" marginheight="0"
        marginwidth="0" src="<?php echo $propertyTemplate->getMapFrameSrc();?>">
        </iframe>
      </div>
      </div>
      <?php endif;?>
      </div>


    </div>
  </div>
</div>
<!-- Content:end -->
<?php slot('addresstop') ?>
<div class="header_bluebanner">
  <div class="header_bluebanner_params">
  <?php echo $property->getAddress()?> <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> | <strong><?php echo $property->getPhone()?></strong>
  </div>
</div>
<?php end_slot() ?>
<?php slot('addressfoot') ?>
<div class="footer_left_info">
  <?php echo $property->getAddress()?><br />
  <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
  <span class="footer_left_info_blue"><?php echo $property->getPhone()?></span>
  <a href="<?php echo url_for('contact/index')?>" class="footerlink"><?php echo $property->getEmail()?></a><br />
  Office Hours:<br /><?php echo nl2br($property->getHours())?>
</div>
<?php end_slot() ?>
<?php slot('logo') ?>
<div class="logos_container">
  <div class="logos_logo"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/<?php echo $property->getCode()?>/logo_top.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" /></a></div>
  <!--div class="logos_location"><a href="<?php echo url_for("default/index")?>"><img src="/images/jsp/jsp_logo_top_sandy.png" /></a></div-->
</div>
<?php end_slot() ?>
<?php slot('logofoot') ?>
<?php echo $property->getName()?>
<?php end_slot() ?>
<?php slot('nav') ?>
<div class="topnav_container_params" style="margin-top:3px;">
<?php if($propertyTemplate->getCustomPageName() != ''):?>
  <?php if(in_array($property->getCode(),array('556PVF'))):?>
    <a href="https://domuso.com/payment/myPaymentMethod/3740" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php else:?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php endif;?>
  <a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>" class="nav_item"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="nav_item">RENTAL APPLICATION PDF</a>
  <?php endif;?>
<?php else:?>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
  <?php if(in_array($property->getCode(),array('556PVF'))):?>
    <a href="https://domuso.com/payment/myPaymentMethod/3740" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php else:?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php endif;?>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
  <?php if(in_array($property->getCode(),array('556PVF'))):?>
    <a href="https://domuso.com/payment/myPaymentMethod/3740" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php else:?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <?php endif;?>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="nav_item">RENTAL APPLICATION PDF</a>
  <?php endif;?>
<?php endif;?>
</div>
<?php end_slot() ?>
<?php slot('bot-nav') ?>
<?php if($propertyTemplate->getCustomPageName() != ''):?>
<a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>" class="footerlink"><?php echo $propertyTemplate->getCustomPageName()?></a><br />
<?php endif;?>
<?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
  <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="footerlink">Online Rental Application</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
  <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="footerlink">Rental Application PDF</a>
<?php endif;?>
<?php end_slot() ?>
<?php slot('social') ?>
<div class="footer_left_facebook">
<?php foreach($arrSocialUrls as $keySocialURL=>$itemSocialURL):?>
  <a href="<?php echo $itemSocialURL?>" title="<?php echo $keySocialURL?>"><img src="/images/jsp/icon_<?php echo $keySocialURL?>_orange.png" alt="<?php echo $keySocialURL?>" /></a>
<?php endforeach;?>
</div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
      <?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
<?php slot('bot-code') ?>
<?php if(in_array($property->getCode(),array('368LOA'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('b5091124', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('77e58b83', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ });
</script>
<?php endif;?>

<?php if(in_array($property->getCode(),array('363PHG'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('85e5566f', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('6db5f4c9', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){  });
</script>
<?php endif;?>

<?php if(in_array($property->getCode(),array('357PAC'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('46d7fe36', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('2ae05b1f', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){  });
</script>
<?php endif;?>

<?php if(in_array($property->getCode(),array('133REE'))):?>
<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('c16d8213', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('5149e5d9', e); });
</script>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){  });
</script>
<?php endif;?>

<?php end_slot() ?>