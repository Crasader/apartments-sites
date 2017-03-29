<?php /*<!-- Content -->
<div class="content_outter">
  <div class="content_inner">
    <div class="content_params">


      <div class="content_secondary">

        <div class="floorplan_topinfo">
          <div class="floorplan_topinfo_left">
            <div class="floorplan_topinfo_left_params">
              <?php echo nl2br($propertyTemplate->getAcaciaFloorplanDesc())?>
            </div>
          </div>
          <div style="float:left; width:393px;">
            <a href="<?php echo url_for("ebrochure/index")?>" target="_blank"><img src="//images/jsp/acacia/contact-download.png" /></a>
          </div>
        </div>

        <div class="page_title_shell">
          <div style="width:165px;" class="page_title_params_secondary">
            FLOOR PLANS
          </div>

        </div>
        <div style="font-size: small;padding:10px 0">Click a floorplan to enlarge</div>
        <div class="floorplan_grid">
        <?php foreach($property->getPropertyFloorPlans() as $floorplan):?>

          <!-- floorplan:A1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox"><img src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <div class="floorplan_item_title_sm"><?php echo $floorplan->getName();?></div>
              <div class="floorplan_item_price"><?php echo $floorplan->getPrice();?></div>
              <?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br />
              <?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
              <small><em>*Prices are subject to change</em></small>
              </div>

            </div>
          </div>
        <?php endforeach;?>
        <?php /*
          <!-- floorplan:A2 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="//images/jsp/acacia/floorplan_a2.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_a2.png" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">A2</span><br /><br />
              1 Bed, 1 Bath<br />
              701 Square Feet<br />
              </div>
              <div class="floorplan_item_price">
                <div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
                <div class="floorplan_rinfo_bottom">
                  <a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
                </div>
              </div>
            </div>
          </div>

          <!-- floorplan:B1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="//images/jsp/acacia/floorplan_b1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_b1.png" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">B1</span><br /><br />
              1 Bed, 1 Bath<br />
              701 Square Feet<br />
              </div>
              <div class="floorplan_item_price">
                <div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
                <div class="floorplan_rinfo_bottom">
                  <a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
                </div>
              </div>
            </div>
          </div>

          <!-- floorplan:C1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="//images/jsp/acacia/floorplan_c1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_c1.png" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">C1</span><br /><br />
              1 Bed, 1 Bath<br />
              701 Square Feet<br />
              </div>
              <div class="floorplan_item_price">
                <div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
                <div class="floorplan_rinfo_bottom">
                  <a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
                </div>
              </div>
            </div>
          </div>

          <!-- floorplan:A1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="//images/jsp/acacia/floorplan_a1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_a1.png" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">A1</span><br /><br />
              1 Bed, 1 Bath<br />
              701 Square Feet<br />
              </div>
              <div class="floorplan_item_price">
                <div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
                <div class="floorplan_rinfo_bottom">
                  <a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
                </div>
              </div>
            </div>
          </div>

          <!-- floorplan:A1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="//images/jsp/acacia/floorplan_a1.png" rel="lightbox"><img src="//images/jsp/acacia/floorplan_a1.png" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">A1</span><br /><br />
              1 Bed, 1 Bath<br />
              701 Square Feet<br />
              </div>
              <div class="floorplan_item_price">
                <div class="floorplan_rinfo_top"><span class="floorplan_item_small">$</span>750</div>
                <div class="floorplan_rinfo_bottom">
                  <a href="#"><img src="//images/jsp/acacia/button-download-f.png" /></a>
                </div>
              </div>
            </div>
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
        <a href="<?php echo url_for("default/index")?>"><img src="//images/jsp/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
      </div>
    </div>
    <div class="header_right_container">
      <div class="header_right_inner">
        <div class="header_right_login">
          <a href="<?php echo url_for("residents/login")?>"><img src="//images/jsp/acacia/btn_login.png" border="0" /></a>
        </div>
        <div class="header_right_resident">
          Already a resident?
        </div>
      </div>
      <div class="header_right_nav">
        <div class="header_right_params">
          <a href="<?php echo url_for("floorplans/index")?>" class="nav_item active">FLOOR PLANS</a>
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

<?php slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
  <div class="banner_secondary_inner" style="background:url('//images/jsp/acacia/<?php echo $property->getCode()?>/banner_floorplan.png') "></div>
</div>
<?php end_slot() ?>

<?php slot('logo-grey') ?>
<div class="footer_logo">
  <img src="//images/jsp/acacia/<?php echo $property->getCode()?>/footerlogo.png" />
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

*/?>
<!-- banner:start -->
<div style="float:left; width:999px;">
  <img src="/images/jsp/banner_floorplan.jpg" />
</div>
<!-- banner:end -->

<!-- Content:start -->
<div class="content_container">
  <div class="content_container_params">
    <div class="content_container_margins">
        <div class="floorplan_topinfo">
          <div class="floorplan_topinfo_left">
            <div class="floorplan_topinfo_left_params">
              <?php echo nl2br($propertyTemplate->getAcaciaFloorplanDesc())?>
            </div>
          </div>
          <div style="float:right; width:405px; margin:0 20px 0 0;">
          <?php if($propertyTemplate->getEBrochure() != ''):?>
            <a href="/uploads/properties/<?php echo $propertyTemplate->getEBrochure();?>" target="_blank"><img src="/images/jsp/floorplan-special.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>"/></a>
          <?php else:?>
            <a href="<?php echo url_for("ebrochure/index")?>" target="_blank"><img src="/images/jsp/floorplan-special.png" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>"/></a>
          <?php endif;?>
          </div>
        </div>

        <div class="page_title_shell">
        <div style="width:165px; font-family:Arial,Helvetica,sans-serif;" class="page_title_params_sub">
            FLOOR PLANS
          </div>
        </div>

        <div class="floorplan_grid">
        <?php $fpcount=0;
          foreach($arrFloorPlansAvailability as $floorPlanID => $row):
          $fpcount++;?>
        <div id="floorplan" class="clearfix">
          <div id="floorplanhdr">
            <h2><?php echo $row['floorplan']['name'];?></h2>
            <?php if($row['floorplan']['unitcount'] > 0):?>
            <a href="<?php echo url_for('floorplans/detail?id='.$floorPlanID)?>"><?php echo $row['floorplan']['unitcount']?> available &raquo;</a>

            <?php endif;?>
          </div>
          <div class="floorplancell cell1">
            <h2>RENT</h2>
            <p><?php if(!empty($row['floorplan']['price'])):?>
              <?php echo $row['floorplan']['price'];?>
              <?php else:?>
              TBD
              <?php endif; ?>
            </p>
          </div>
          <div class="floorplancell cell2">
            <h2>DEPOSIT</h2>
            <p><?php if(!empty($row['floorplan']['deposit'])):?>
            <?php echo $row['floorplan']['deposit'];?>
            <?php else:?>
              TBD
              <?php endif; ?>
            </p>
          </div>
          <div class="floorplancell cell3">
            <h2>SQ FEET</h2>
            <p><?php echo $row['floorplan']['squarefeet'];?></p>
          </div>
          <div class="floorplancell cell4">
            <h2>BED/BATH</h2>
            <p><?php echo $row['floorplan']['bedrooms'];?> bed/<?php echo $row['floorplan']['bathrooms'];?> ba</p>
          </div>
          <div class="floorplancell cell5"><a href="/uploads/floorplans/<?php echo $row['floorplan']['image'];?>" class="fancybox"><img src="/uploads/floorplans/169/<?php echo $row['floorplan']['image'];?>" /></a>
            <div class="floorplan-linkbox"><a href="/uploads/floorplans/<?php echo $row['floorplan']['image'];?>" class="fancybox">Floor Plan »</a></div>
          </div>
        </div>
        <?php endforeach;?>
        <p>*Pricing and availability are subject to change. Valid for new residents only. Square footages displayed are approximate. Discounts will be calculated upon lease execution. Minimum lease terms and occupancy guidelines may apply. Deposits may fluctuate based on credit, rental history, income, and/or other qualifying standards. Additional taxes and fees may apply and will be disclosed as per governing laws and company policies.</p>
        <?php /*foreach($property->getPropertyFloorPlans() as $floorplan):?>
        <?php //print_r($floorplan);?>
          <!-- floorplan:A2 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox"><img src="/uploads/floorplans/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" title="<?php echo $floorplan->getName();?>" /></a>
            </div>
            <div class="floor-box-text"><?php echo $floorplan->getName();?><br/>
            <span class="italic-georgia-14"><br/>
            <?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br/><?php echo $floorplan->getSquareFeet();?> Sq. Ft.</span></div>
            <div class="floor-box-price"><?php echo $floorplan->getPrice();?></div>
            <div class="download-floorplan"><a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" target="_blank" rel="lightbox" ><img src="/images/jsp/download-floorplan.jpg" width="129" height="24" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" /></a></div>
            <div class="schedule-floorplan"><a href="<?php echo url_for("contact/index");?>"><img src="/images/jsp/schedule-visit.jpg" width="129" height="24" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" /></a></div>

            <?php /*<div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm"><?php echo $floorplan->getName();?></span>
              <div class="floorplan_item_price"><?php echo $floorplan->getPrice();?></div>
              <?php echo $floorplan->getBedrooms();?> Bed <?php echo $floorplan->getBathrooms();?> Bath<br />
              <?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
              <small><em>*Prices are subject to change</em></small>
              </div>
            </div>
          </div>
        <?php endforeach;*/?>
          <?php /*
          <!-- floorplan:A2 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="/images/jsp/floorplan_2.jpg" rel="lightbox"><img src="/images/jsp/floorplan_2.jpg" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">A2</span>
              <div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
              1 Bed, 1 Bath<br />
              701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
              </div>
            </div>
          </div>

          <!-- floorplan:B1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="/images/jsp/floorplan_3.jpg" rel="lightbox"><img src="/images/jsp/floorplan_3.jpg" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">A2</span>
              <div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
              1 Bed, 1 Bath<br />
              701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
              </div>
            </div>
          </div>

          <!-- floorplan:C1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="/images/jsp/floorplan_4.jpg" rel="lightbox"><img src="/images/jsp/floorplan_4.jpg" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">A2</span>
              <div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
              1 Bed, 1 Bath<br />
              701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
              </div>
            </div>
          </div>

          <!-- floorplan:A1 -->
          <div class="floorplan_item">
            <div class="floorplan_item_image">
              <a href="/images/jsp/floorplan_5.jpg" rel="lightbox"><img src="/images/jsp/floorplan_5.jpg" /></a>
            </div>
            <div class="floorplan_item_info">
              <div class="floorplan_item_params">
              <span class="floorplan_item_title_sm">A2</span>
              <div class="floorplan_item_price"><span class="floorplan_item_small">$</span>750</div>
              1 Bed, 1 Bath<br />
              701 Square Feet<br /><small><em>*Prices are subject to change</em></small>
              </div>
            </div>
          </div>
          */?>

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