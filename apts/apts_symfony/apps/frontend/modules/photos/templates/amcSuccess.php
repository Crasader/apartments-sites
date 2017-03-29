<?php /*<div id="sec-content">
  <div id="sec-left2">
  <h1 class="title"><?php echo $property->getName()?> Apartment Photos in <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?></h1>
    <p>Take an online Photo Tour of our <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> luxury apartments for rent to see what life at <?php echo $property->getName()?> Apartments is all about.</p>
    <span class="font-10i">- Click an image for a larger view.</span><br />
    <div class="photos-row">
    <?php $pcount=0;
     foreach($mainPhotos as $photo):
     $pcount++;
    ?>
      <div class="photos-item">
        <div class="photos">
          <a href="/uploads/photos/<?php echo $photo->getImage()?>" rel="lightbox[photos]" title="<?php echo $photo->getName()?>"><span></span>
          <img src="/uploads/photos/258/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" border="0" /></a>
        </div>
      </div>
    <?php if($pcount % 2 == 0 && $property->countPropertyPhotos() > $pcount):?>
      </div><div class="photos-row">
    <?php endif;?>
    <?php endforeach;?>
    </div>

  </div>
  <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery.noConflict();
  jQuery(document).ready(function() {

           jQuery.validator.addMethod("phoneCustom", function(phone_number, element) {
                phone_number = phone_number.replace(/\s+/g, "");
                return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "<div class='error_shell'><div class='error_inner'>Please enter a valid phone number.</div></div>");

           jQuery("#sideContact").validate({
               errorContainer: ".error_shell",
               errorLabelContainer: ".error_inner",
               errorElement: "div",
                rules: {
                  firstname: "required",
                  lastname: "required",
                  emailaddress: {
                    required: true,
                    email: true
                  }
                },
                messages: {
                  firstname: "<div class='error_shell'><div class='error_inner'>Required</div></div>",
                  lastname: "<div class='error_shell'><div class='error_inner'>Required.</div></div>",
                  emailaddress: "<div class='error_shell'><div class='error_inner'>Invalid.</div></div>",
               }
           });
       });
       </script>
  <div id="right">
  <div class="right-title">
  <div class="right-title-txt">Schedule a Visit</div>
  </div>
  <div class="sec-right-txt">
  <div class="rt_contact_shell">
    <form name="sideContact" id="sideContact" method="post" action="<?php echo url_for('contact/short'); ?>">

      <div class="inpt_elem">
        <div class="inpt_title">
        First Name:<span class="req_mark">*</span>
        </div>
        <div class="inpt_ct">
         <input type="text" name="firstname" id="firstname" class="frm_input" value=""/>
        </div>
      </div>

      <div class="inpt_elem">
        <div class="inpt_title">
        Last Name:<span class="req_mark">*</span>
        </div>
        <div class="inpt_ct">
         <input type="text" name="lastname" id="lastname" class="frm_input" value=""/>
        </div>
      </div>

      <div class="inpt_elem">
        <div class="inpt_title">
        Phone Number (optional):
        </div>
        <div class="inpt_ct">
         <input type="text" name="phonenumber" id="phonenumber" class="frm_input" value=""/>
        </div>
      </div>

      <div class="inpt_elem">
        <div class="inpt_title">
        Email Address:<span class="req_mark">*</span>
        </div>
        <div class="inpt_ct">
         <input type="text" name="emailaddress" id="emailaddress" class="frm_input" value=""/>
        </div>
      </div>

      <div class="btn_contact_submit"><input type="image" src="/images/contact_submit.png" alt="start now!" name="submit"></div>

    </form>
  </div>
  </div>
</div>
</div>
*/?>
<div id="gallerycontainer" class="clearfix">
    <div id="picstitle" class="clearfix">
      <div id="photostitle">
        <h1>Come and check it out</h1>
      </div>
      <a class="button popup" href="<?php echo url_for('/contact/min/index')?>" id="seeallbtn">Schedule a Tour</a> <!-- class="button fancybox fancybox.iframe"-->

    </div>
    <div id="piccontain" class="clearfix">

    <!-- to add an image caption, put title="name of caption" in the anchor tag. -->



<?php $pcount=0;
     foreach($mainPhotos as $photo):
     $pcount++;
    ?>

      <div class="galleryitem" ><a href="/uploads/photos/<?php echo $photo->getImage()?>" class="fancybox" rel="group"><img id="img<?php echo $pcount?>pic" src="/uploads/photos/<?php echo $photo->getImage()?>" class="image" alt="<?php echo $photo->getName()?>" title="<?php echo $photo->getName()?>" /></a>
      <?php if ($property->getCode() == '554PRS'): ?><p><?php echo $photo->getName()?></p><?php endif;?></div>

    <?php endforeach;?>

      <?php /*<div id="img1" class="clearfix"><a href="img/gallery/443058bf4b121be0145dce23490a7a0d.jpg" class="fancybox"><img id="img1pic" src="img//gallery/443058bf4b121be0145dce23490a7a0d.jpg" class="image" /></a></div>
      <div id="img2" class="clearfix"><a href="img/gallery/685d58ac88a96bdb74d93e51d277c6ee.jpg" class="fancybox"><img id="img2pic" src="img/gallery/685d58ac88a96bdb74d93e51d277c6ee.jpg" class="image" /></a></div>
      <div id="img3" class="clearfix"><a href="img/gallery/6cac3e9f80b0bbd47b27bc800c341707.jpg" class="fancybox"><img id="img3pic" src="img/gallery/6cac3e9f80b0bbd47b27bc800c341707.jpg" class="image" /></a></div>
      <div id="img4" class="clearfix"><a href="img/gallery/6f23bfbdaf1a1a6c84e18b44a9ed60e6.jpg" class="fancybox"><img id="img4pic" src="img/gallery/6f23bfbdaf1a1a6c84e18b44a9ed60e6.jpg" class="image" /></a></div>
      <div id="img5" class="clearfix"><a href="img/gallery/85e3fb801d1a1c520ec0dbeb5bce6905.jpg" class="fancybox"><img id="img5pic" src="img/gallery/85e3fb801d1a1c520ec0dbeb5bce6905.jpg" class="image" /></a></div>
      <div id="img6" class="clearfix"><a href="img/gallery/b87f242fca7fcf2a90ffffbe09f501ee.jpg" class="fancybox"><img id="img6pic" src="img/gallery/b87f242fca7fcf2a90ffffbe09f501ee.jpg" class="image" /></a></div>
      <div id="img7" class="clearfix"><a href="img/gallery/c6f91c924a83c5dd89a6f35a5fef3366.jpg" class="fancybox"><img id="img7pic" src="img/gallery/c6f91c924a83c5dd89a6f35a5fef3366.jpg" class="image" /></a></div>
      <div id="img8" class="clearfix"><a href="img/gallery/cd70db664344fb92b13346490974ff0d.jpg" class="fancybox"><img id="img8pic" src="img/gallery/cd70db664344fb92b13346490974ff0d.jpg" class="image" /></a></div>
      <div id="img9" class="clearfix"><a href="img/gallery/d6c3570694ee38518e10962e9cb7e478.jpg" class="fancybox"><img id="img9pic" src="img/gallery/d6c3570694ee38518e10962e9cb7e478.jpg" class="image" /></a></div>
      <div id="img9" class="clearfix"><a href="img/gallery/fbaa40e39111fd509c341e51bc60cbf2.jpg" class="fancybox"><img id="img9pic" src="img/gallery/fbaa40e39111fd509c341e51bc60cbf2.jpg" class="image" /></a></div>*/?>



    </div>
     <div id="CTA" class="clearfix">
      <div id="checkitout">
        <h1>Come and check it out</h1>
      </div>
      <div id="call"> Call today for an appointment <a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
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
  <div class="nav-item" title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos">Photos</div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartment Complex - Features" href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item"><a title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community" href="<?php echo url_for('community/index')?>">Our Community</a></div>
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
    <a href="<?php echo url_for('privacy-policy/index')?>">Privacy Policy</a> | <a href="<?php echo url_for('terms-of-use/index')?>">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?>&nbsp;&nbsp;<img style="vertical-align:middle;" src="/images/icon_equal_housing.png"/>
</div>
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