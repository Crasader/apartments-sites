<div id="sec-content">
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