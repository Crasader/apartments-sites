<!-- banner:start -->
<div style="float:left; width:999px;">
  <img src="/images/jsp/banner_amenities.jpg" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
</div>
<!-- banner:end -->


<!-- Content:start -->
<div class="content_container">
  <div class="content_container_params">
    <div class="content_container_margins">
      <div class="page_title_shell">
        <div style="width:100%;" class="page_title_params_secondary">
          DOZENS OF FEATURES
        </div>
      </div>

      <div class="content_intro_sub">
        <?php echo nl2br($propertyTemplate->getAcaciaFeaturesDesc())?>
      </div>

      <div class="content_secondary">
      <div style="margin:0 0 0 150px;">
      <!-- feature: start -->
        <div class="home_feature">
          <div class="home_feature_top"></div>
          <div class="home_feature_repy">
            <div class="home_feature_params">
              <div class="homefeature_photo_shell">
                <div class="homefeature_icon">
                  <img src="/images/jsp/jsp_homeicon_paint.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
                </div>
                <?php if(!empty($arrFeaturePhoto[0])):?>
                  <img src="<?php echo $arrFeaturePhoto[0]['path']?>" alt="<?php echo $arrFeaturePhoto[0]['name']?>" title="<?php echo $arrFeaturePhoto[0]['name']?>" class="homefeature_photo" />
                <?php endif;?>
              </div>
              <div class="homefeature_title">
                APARTMENT
              </div>
              <div class="homefeature_inner_sub">
                 features
              </div>
              <div class="homefeature_desc">
                 <ul>
                  <?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
                    <li><?php echo $feature->getApartmentFeature()->getName()?></li>
                  <?php endforeach;?>
                </ul>
              </div>
            </div>
          </div>
          <div class="home_feature_bottom"></div>
        </div>
        <!-- feature: end -->

        <!-- feature: start -->
        <div class="home_feature">
          <div class="home_feature_top"></div>
          <div class="home_feature_repy">
            <div class="home_feature_params">
              <div class="homefeature_photo_shell">
                <div class="homefeature_icon">
                  <img src="/images/jsp/jsp_homeicon_amenities.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
                </div>
                <?php if(!empty($arrFeaturePhoto[1])):?>
                  <img src="<?php echo $arrFeaturePhoto[1]['path']?>" alt="<?php echo $arrFeaturePhoto[1]['name']?>" title="<?php echo $arrFeaturePhoto[1]['name']?>" class="homefeature_photo" />
                <?php endif;?>
              </div>
              <div class="homefeature_title">
                COMMUNITY
              </div>
              <div class="homefeature_inner_sub">
                 features
              </div>
              <div class="homefeature_desc">
                <ul>
                <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
                  <li><?php echo $feature->getCommunityFeature()->getName()?></li>
                <?php endforeach;?>
                </ul>

              </div>
            </div>
          </div>
          <div class="home_feature_bottom"></div>
        </div>
        <!-- feature: end -->
        </div>
      </div>


    </div>
    <div style="text-align:center;font-size:12px;font-family:arial;">*Select units only</div>
  </div>

</div>
<!-- Content:end -->
<?php /*<!-- Content -->
<div class="content_outter">
  <div class="content_inner">
    <div class="content_params">

      <div class="page_title_shell">
        <div style="width:140px;" class="page_title_params_secondary">
          FEATURES
        </div>
      </div>

      <div class="content_description">
        The secret to finding a place you love is realizing that it's the
        day-to-day experiences, the timesavers and small satisfactions that
        end up mattering most. We provide you with a gratifying number of
        conveniences and benefits; like impeccable service, pristine
        courtyards, a basketball court, fitness center, residences that
        exude charm, and a fabulous location. Take Oscar's advice, "be
        satisfied only with the best."
      </div>

      <div class="content_secondary">

        <div class="feature_container">
          <div class="feature_group_left">
            <div class="feature_photo">
            <?php if(!empty($arrFeaturePhoto[0])):?>
              <img src="<?php echo $arrFeaturePhoto[0]['path']?>" alt="<?php echo $arrFeaturePhoto[0]['name']?>" />
            <?php endif;?>
            </div>
            <div class="feature_content">
              <div class="feature_content_params">
                <div class="feature_title">APARTMENT FEATURES</div>
                <ul>
                <?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
                  <li><?php echo $feature->getApartmentFeature()->getName()?></li>
                <?php endforeach;?>
                </ul>
              </div>
            </div>
          </div>

          <div class="feature_group_right">
            <div class="feature_photo">
            <?php if(!empty($arrFeaturePhoto[1])):?>
              <img src="<?php echo $arrFeaturePhoto[1]['path']?>" alt="<?php echo $arrFeaturePhoto[1]['name']?>" />
            <?php endif;?>
            </div>
            <div class="feature_content">
              <div class="feature_content_params">
                <div class="feature_title">COMMUNITY FEATURES</div>
                <ul>
                  <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
                    <li><?php echo $feature->getCommunityFeature()->getName()?></li>
                  <?php endforeach;?>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
*/?>
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