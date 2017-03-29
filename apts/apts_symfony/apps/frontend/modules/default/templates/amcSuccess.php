<img id="mainimg1" src="/images/amc/<?php echo $property->getCode()?>/home_main.jpg" class="image" alt="<?php echo $property->getName()?>" title="<?php echo $property->getName()?>" />
    </div>
    <div id="content" class="clearfix">
      <div id="maincopy">
        <h1><?php echo nl2br($propertyTemplate->getWelcome()); ?></h1>
        <font face="verdana"><?php echo nl2br($propertyTemplate->getDescription()); ?></font>
      </div>
      <div id="aside">
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
          <li><a href="#" data-icon="g" class="icon"></a></li>*/?>
        </ul>
        <?php if($propertyTemplate->getAnnouncements()):?>
        <h2>Announcements</h2>
        <p><?php echo nl2br($propertyTemplate->getAnnouncements()); ?></p>
        <?php endif;?>

        <?php if(in_array($property->getCode(),array('629CLI'))):?>
          <!-- Live Chat Button Code -->
          <p><a class="button fancybox fancybox.iframe" id="seeallbtn" href="contact/min">Schedule a Tour</a></p>
          <!-- Live Chat Button Code -->
        <?php endif;?>

        <h2><?php echo $property->getAddress()?><br />
           <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> </h2>
        <p><?php if($property->getPhone()):?>
        <a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
          <a href="<?php echo url_for('contact/index')?>">Click here to email us</a></p>
        <?php endif;?>
        <h2>Office Hours</h2>
        <p><?php echo nl2br($property->getHours())?></p>
        <a href="<?php echo url_for('features/index')?>"><h2>Apartment Features</h2></a>
        <p>
      <?php
          $fcount = 0;
          foreach($property->getPropertyApartmentFeatures() as $feature):
          $fcount++;
      ?>
          <?php echo $feature->getApartmentFeature()->getName()?><br />
      <?php
          if($fcount >= 2) break;
          endforeach;?>

      </p>
      <a href="<?php echo url_for('features/index')?>"><h2>Community Features</h2></a>
      <p>
      <?php
          $ccount = 0;
          foreach($property->getPropertyCommunityFeatures() as $feature):
          $ccount++;
      ?>
          <?php echo $feature->getCommunityFeature()->getName()?><br />
      <?php
          if($ccount >= 2) break;
          endforeach;?>
      </p>
      <a href="<?php echo url_for('features/index')?>"><h2>More Features</h2></a>
      <p>
      <?php
          $ccount = 0;
          foreach($property->getPropertyOtherFeatures() as $feature):
          $ccount++;
      ?>
          <?php echo $feature->getOtherFeature()->getName()?><br />
      <?php
          if($ccount >= 2) break;
          endforeach;?>
      </p>

      </div>
    </div>
    <div id="picstitle" class="clearfix">
      <div id="photostitle">
        <h1>Don't take our word for it</h1>
      </div>
            <a href="<?php echo url_for('photos/index')?>" id="seeallbtn" class="button">See All Photos</a>

    </div>
    <div id="piccontain" class="clearfix">
    <?php  $pcount = 0;
        foreach($homePhotos as $photo):
        //print_r($photo);
        //$photocnt++;
        $pcount++;?>

      <?php /*<div id="img<?php echo $photocnt?>" class="clearfix"><img id="img<?php echo $photocnt?>pic" src="/uploads/photos/<?php echo $photo->getImage()?>" class="image homegalleryitem" /> </div>*/?>
<div class="galleryitem" ><a href="/uploads/photos/<?php echo $photo->getImage()?>" class="fancybox"><img id="img<?php echo $pcount?>pic" src="/uploads/photos/<?php echo $photo->getImage()?>" class="image" alt="<?php echo $photo->getName()?>" title="<?php echo $photo->getName()?>" /></a>
<?php if ($property->getCode() == '554PRS'): ?><p><?php echo $photo->getName()?></p><?php endif;?>
</div>
    <?php endforeach;?>
    </div>
    <div id="CTA" class="clearfix">
      <div id="checkitout">
        <h1>Come and check it out</h1>
      </div>
      <div id="call"> Call today for an appointment <a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />


<?php if(in_array($property->getCode(),array('354AX9'))):?>
  <!-- Live Chat Button Code -->
  <div id="live_chat_status"></div>
  <!-- Live Chat Button Code -->
<?php endif;?>


      </div>
    </div>
  </div>




<?php /*<div style="display: none;" id="dialog" title="Pet Guidelines">
<?php echo $property->getPetPolicy();?>
</div>
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
    <a href="https://amcrentpay.com" alt="Online Rent Pay" target="_blank" title="Online Rent Pay"><img style="padding-top: 10px; border: none;" src="/images/btn_rent_pay.png" border="0"></a>
      <br />
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
      <img id="opener" src="/images/btn_pet_policy_amc.png" style="border:none !important; cursor:pointer; margin:-20px 0 10px 0; padding:0;" alt="Pet Policy" title="Pet Policy">
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

  </div>
</div>
*/?>
<?php if(in_array($property->getCode(),array('28LOT','659LTP','657BWA','615MDR','658CIL','632BLK','605PNA'))):?>

<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="<?php echo url_for('residents/login')?>">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="<?php echo url_for('residents/login')?>">Resident Center</a><br />
<?php end_slot() ?>

<?php elseif(in_array($property->getCode(),array('607SET','673CLR','06COV','11GGR','677GST'))):?>

<?php $shortcode =  $property->getCode();
$shortcode = substr($shortcode,-3,3);?>
<?php slot('rescenterlink') ?>
&nbsp;&nbsp;&nbsp;<a href="https://amc.myresman.com/Portal/Access/SignIn/<?php print $shortcode;?>" target="_blank">Resident Center</a>
<?php end_slot() ?>
<?php slot('rescenterlinkm') ?>
<a href="https://amc.myresman.com/Portal/Access/SignIn/<?php print $shortcode;?>" target="_blank">Resident Center</a><br />
<?php end_slot() ?>

<?php else:?>
<?php slot('loginbox') ?>
<div id="loginbox" class="clearfix">
      <form name="tmplogin" action="<?php echo url_for('residents/login')?>" method="post">
        <label id="username-group">
        <div id="logintitle"> Resident Center </div>
        <input id="username" type="text" value="Username" name="login[email]" onclick="this.value='';">
        </input>
        </label>
        <label id="password-group">
        <div id="blank"><br />
        </div>
        <input id="password" type="text" value="Password" name="login[password]" onclick="this.value=''; this.type='password';" >
        </input>
        </label>

  <input type="button" id="sbmtbtn" value="Log In" onclick="document.tmplogin.submit();">
      </form>
        <!--div id="forgot"><a href="#">Forgot Password?</a></div-->
      </div>
<?php end_slot() ?>
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
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a><br />
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a><br />
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
<?php slot('bot-nav') ?>
<?php echo $property->getCity()?> Apartments  &copy; Copyright <?php echo date('Y');?>
<?php end_slot() ?>
<?php slot('bot-navCA') ?>
<?php if($property->getState()->getCode() == 'CA'): ?>
       <br />
       <br />
  <p>AMC-CA, Inc. dba Apartment Management Consultants- BRE #1525033</p>
<?php endif;?>
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
