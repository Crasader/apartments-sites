<script>
$(function() {
    $('form').on('submit', function(e) { //use on if jQuery 1.7+
        if($('#contact_fname').val() == 'FIRST NAME*'){
          $('#contact_fname').val('');
        }
        if($('#contact_lname').val() == 'LAST NAME*'){
          $('#contact_lname').val('');
        }
        if($('#contact_phone').val() == 'PHONE'){
          $('#contact_phone').val('');
        }
        if($('#contact_email').val() == 'EMAIL*'){
          $('#contact_email').val('');
        }
        if($('#contact_fax').val() == 'FAX'){
          $('#contact_fax').val('');
        }

    });
});
</script>

<!-- banner:start -->
<div style="float:left; width:999px;">
  <img src="/images/jsp/banner_contact.jpg" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
</div>
<!-- banner:end -->
<!-- Content -->
<div class="content_container">
      <div class="content_container_params">
        <div class="content_container_margins">

      <div class="content_secondary">
        <div id="contact-us">
        <div id="contact-title">
          SEND US A MESSAGE
        </div>
        <?php if($sf_params->get('a') == 'passwordhelp'): ?>
        <div style="clear:both;padding-top:10px">
        Please fill out the form below and let the property manager know you would like a Resident Center log in created.
        </div>
        <?php endif;?>
      <?php if ($sf_user->hasFlash('mailsuccess')): ?>
      <div id="contact-form-title"> <span class="color14b"><?php echo $sf_user->getFlash('mailsuccess') ?></span></div>
      <?php else: ?>
      <form action="<?php echo url_for('contact/min'); ?>" method="post">
        <?php if($form->hasErrors()): ?>
        <div class="contact-form-row">
          <ul style="color:red">
            <?php foreach($form as $formField): ?>
            <?php if($formField->hasError()): ?>
            <?php echo $formField->renderError();?>
            <?php endif; ?>
            <?php endforeach;?>
          </ul>
        </div>
        <?php endif; ?>
        <div id="contact-form">



          <?php echo $form['fname']->render(array('size' => '55','class' => 'contact-form','title' => 'FIRST NAME*')) ?>
          <?php echo $form['lname']->render(array('size' => '55','class' => 'contact-form','title' => 'LAST NAME*')) ?>
          <?php echo $form['phone']->render(array('size' => '55','class' => 'contact-form','title' => 'PHONE')) ?>
          <?php echo $form['email']->render(array('size' => '55','class' => 'contact-form','title' => 'EMAIL*')) ?>
          <?php echo $form['fax']->render(array('size' => '55','class' => 'contact-form','title' => 'FAX')) ?>
          <?php echo $form['notes']->render(array('cols' => '75','rows' => '6','style' => 'font-size: 12px; text-align:left;')); ?>
          
          <p style="padding: 10px 0;"><input type="image" name="Submit" src="/images/jsp/contact-submit.png" width="99" height="37" value="SEND" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" /></p>
        </form>
        <?php endif; ?>
        </div>
        </div>

        <div id="contact-info">
        <span class="contact-title-directions">VISIT US</span><br /><br />
        <a href="<?php echo $propertyTemplate->getMapHtml();?>">
        <span class="contact-subtitle">Click here for custom directions.</span></a>

        <div id="contact-map">
          <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0"
          marginwidth="0" src="<?php echo $propertyTemplate->getMapFrameSrc();?>">
          </iframe>
        </div><?php echo $property->getAddress()?><br />
        <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br />
        <br />
        <br />
        <span class="contact-info-sec">T&nbsp;&nbsp;</span> <?php echo $property->getPhone()?><br />
        <span class="contact-info-sec">E&nbsp;&nbsp;</span>	<?php echo $property->getEmail()?><br />
        <br />
        <?php echo nl2br($property->getHours())?>

        </div>
      </div>

    </div>
  </div>
</div>

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