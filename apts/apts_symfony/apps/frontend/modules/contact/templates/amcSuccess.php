<!-- Content -->
<div id="primaryContainer" class="primaryContainer clearfix">
  <div id="contactwrapper" class="clearfix">

<!-- ---- Start of Form ------->

    <div id="contactform" class="contactformwidth">
      <h1>We'd love to hear from you</h1>
        <form id="form" action="<?php echo url_for('contact/index'); ?>" method="post">
         <?php if($form->hasErrors()): ?>

        <ul class="formerrors">
          <?php foreach($form as $formField): ?>
          <?php if($formField->hasError()): ?>
          <li><?php echo $formField->renderError();?></li>
          <?php endif; ?>
          <?php endforeach;?>
        </ul>
      <?php endif; ?>
        <ul >
          <li>
            <label class="description" for="element_1">*First Name </label>
            <div>
              <?php echo $form['fname']->render(array('size' => '20')) ?>
            </div>
          </li>
          <li>
            <label class="description" for="element_2">*Last Name </label>
            <div>
              <?php echo $form['lname']->render(array('size' => '20')) ?>
            </div>
          </li>
          <li>
            <label class="description" for="element_3">Phone </label>
            <div>
              <?php echo $form['phone']->render(array('size' => '20')) ?>
            </div>
          </li>
          <li>
            <label class="description" for="element_4">*Email </label>
            <div>
              <?php echo $form['email']->render(array('size' => '20')) ?>
            </div>
          </li>
          <li>
            <label class="description" for="element_5">Employer </label>
            <div>
              <?php echo $form['employer']->render(array('size' => '20')) ?>
            </div>
          </li>
          <li>
            <label class="description" for="element_6">Approximate Move-in Date </label>
            <div>
             <?php echo $form['when']->render(array('size' => '20')) ?>
            </div>
          </li>
          <li>
            <label class="description" for="element_7">Types and sizes of pets </label>
            <div>
              <?php echo $form['pets']->render(array('size' => '200')) ?>
            </div>
          </li>
          <li >
            <label>How did you hear about us? </label>
            <div>
              <?php echo $form['howhear']; ?>
            </div>
          </li>
          <li>
            <label>Preferred contact methods</label>
            <span>
            <div>
              <?php echo $form['howcontact']; ?>
            </div>
            </span> </li>
          <li>
            <div class="pushdown">
              <label class="description" for="element_8">Notes </label>
            </div>
            <div>
              <?php echo $form['notes']; ?>
            </div>
          </li>
          <li>
            <label class="description" for="element_9">Enter Security Code </label>
            <div>
              <?php echo $form['captcha']->render() ?>
            </div>
          </li>
          <li>
            <input type="button" value="Submit" onclick="$('#form').submit();" />
          </li>
        </ul>
      </form>
    </div>

    <!--   End of Form  ---------->

    <!-- Directions  ---------------->
    <div id="directions">
      <h1>Driving Directions:</h1>
      <p><?php echo $property->getDirections();?> </p>
      <?php if ($property->getCode() == '554PRS'): ?>
      <p><img src="/images/amc/<?php echo $property->getCode()?>/map.jpg" /></p>
      <p><a href="/images/amc/<?php echo $property->getCode()?>/brochure.pdf" />Download printable brochure (pdf).</p>
      <?php else:?>
        <iframe src="<?php echo $propertyTemplate->getMapFrameSrc();?>"  width="100%" height="300" frameborder="0" style="border:0"></iframe>
      <?php endif;?>
      <br />
      <br />
      <ul>
      <?php if($propertyTemplate->getFacebookUrl() != ''):?>
      <?php foreach($arrSocialUrls as $keySocialURL=>$itemSocialURL):?>
         <?php if($keySocialURL == 'facebook'):?>
            <li><a href="<?php echo $itemSocialURL?>" data-icon="a" class="icon" title="<?php echo $keySocialURL?>" alt="<?php echo $keySocialURL?>" target="_blank"></a></li>
          <?php endif;?>
	  <?php if($keySocialURL == 'google'):?>
            <li><a href="<?php echo $itemSocialURL?>" data-icon="b" class="icon" title="<?php echo $keySocialURL?>" alt="<?php echo $keySocialURL?>" target="_blank"></a></li>
          <?php endif;?>
          <?php if($keySocialURL == 'pinterest'):?>
            <li><a href="<?php echo $itemSocialURL?>" data-icon="d" class="icon" title="<?php echo $keySocialURL?>" alt="<?php echo $keySocialURL?>" target="_blank"></a></li>
          <?php endif;?>
          <?php if($keySocialURL == 'twitter'):?>
            <li><a href="<?php echo $itemSocialURL?>" data-icon="e" class="icon" title="<?php echo $keySocialURL?>" alt="<?php echo $keySocialURL?>" target="_blank"></a></li>
          <?php endif;?>
      <?php endforeach;?>
      <?php endif;?>
      <?php /*
        <li><a href="#" data-icon="a" class="icon"></a></li>
        <li><a href="#" data-icon="b" class="icon"></a></li>
        <li><a href="#" data-icon="c" class="icon"></a></li>
        <li><a href="#" data-icon="d" class="icon"></a></li>
        <li><a href="#" data-icon="e" class="icon"></a></li>*/?>
      </ul>
      <p><strong> <?php echo $property->getAddress()?><br />
      <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> </strong> </p>
      <p><?php if($property->getPhone()):?>
      P: <?php echo $property->getPhone()?><br />
      <?php endif;?>
      <?php if($property->getFax()):?>
      F: <?php echo $property->getFax()?><br />
      <?php endif;?>
      <?php if($property->getEmail()):?>
      <a href="<?php echo url_for('contact/index')?>" alt="<?php echo $property->getEmail()?>">Click here to email us</a>
      <?php endif;?></p>
        <p><strong>Office Hours</strong><br />
       <?php echo nl2br($property->getHours())?></p>
    </div>
    <!-- -----End of Directions --------->

  </div>
  <!-- this end div tag ends the contactwrapper div -->

  <!-- ---- Call to Action ------->
  <div id="contactwrapper2" class="clearix">
    <div id="CTA" class="clearfix">
      <div id="checkitout">
        <h1>Come and check it out</h1>
      </div>
      <div id="call"> Call today for an appointment <a href="#"><?php if($property->getPhone()):?>
      <?php echo $property->getPhone()?>
      <?php endif;?></a><br />
      </div>
    </div>
  </div>
  <!-- ------- End of Call to Action ----->
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
<div id="bold-chat-holder">
  <div id="bold-chat"><?php echo $propertyTemplate->getChat();?></div>
</div>
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
<?php slot('nav') ?>
<div id="nav">
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Apartments - Home" href="<?php echo url_for('default/index')?>">Home</a></div>
  <div class="nav-item"><a title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans" href="<?php echo url_for('floorplans/index')?>">Floor Plans</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos"href="<?php echo url_for('photos/index')?>">Photos</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartment Complex - Features" href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item"><a title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community" href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?>
  <div class="nav-item" title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Rentals - Contact Us">Contact Us</div>
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
