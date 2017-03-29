<div id="sec-content">
<div id="sec-left"> <span class="title">Resident's Center</span><br />
  <br />
  <div id="res-payment">
    <div class="bold14f">Make a Payment</div>
    <div class="res-left1020">
      <div class="float-r"><a href="https://www.amcrentpay.com/Account/Login.aspx" target="_blank"><img src="/images/btn-payment.gif" alt="make a payment online" /></a></div>
      Want to pay your bill quickly and securely? Go to our Online Payment form.<br />
    </div>
  </div>
  <div id="res-maintenance">
    <div class="bold14f">Request Maintenance</div>
    <div class="res-left1020">
      <div class="float-r"><a href="<?php echo url_for('residents/maintenance')?>"><img src="/images/btn-maintenance.gif" alt="send maintenance request" /></a></div>
      Having a problem? Fill out our Maintenance Request form and we will get your concern taken care of as quickly as possible.<br />
    </div>
  </div>
  <div id="res-moved">
    <div class="res-left10">
      <img src="/images/weve-moved.jpg" alt="we've moved" align="left" class="padding20r" />
      <div class="bold14f">We've Moved</div><br />
      Let everyone know that you've moved into a great new apartment!<br />
      <br />
      <a href="<?php echo url_for('residents/wevemoved')?>"><img src="/images/weve-moved-btn.gif" alt="send personalized notice" /></a>
    </div>
  </div>
  <!--<div class="bold14f">Send a "We've Moved" Notice</div>
    <div class="res-left10">
      Select a picture and add a message. We will take care of the rest.<br />
      <br />
      <div class="res-form-txt">Recipients:</div>
      <div class="res-form-field"><input name="recipients" type="text" size="36"/></div>
      <br />
      <br />
      <div class="res-form-txt">Image:</div>
      <div class="res-form-field"><input name="name" type="text" size="24" value="Select an image to upload."/> <input name="browse" type="button" value="Browse" /></div>
      <br />
      <br />
      <div class="res-form-txt">Message:</div>
      <div class="res-form-field"><textarea name="request" cols="40" rows="5"></textarea></div>
      <br />
      <br /><br /><br /><br />
      <div class="res-form-txt">&nbsp;</div>
      <div class="res-form-field"><input name="submit" type="button" value="Submit" /></div>
    </div>-->
</div>
<div id="right">
  <div class="right-title">
    <div class="right-title-txt">
      <!-- Make a Payment -->
    </div>
  </div>
  <div class="right-txt">
    <!-- To make an online payment please fill in your credit card information below and click submit. If you have any additional comments please use the notes field.<br />
      <br />
      <form name="form" id="form">
      <span class="colorb">Card Number:</span><br />
      <input name="card-number" type="text" size="22" /><br />
      <br />
      <span class="colorb">Verification Number:</span> <input name="verification-number" type="text" size="4" /><br />
      <span class="font-10i">3 or 4 digit code on card</span><br />
      <br />
      <span class="colorb">Card Type:</span><br />
        <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
          <option selected="selected">Card Type</option>
          <option>Master Card</option>
          <option>VISA</option>
          <option>American Express</option>
        </select>
      <br />
      <br />
      <span class="colorb">Expiration Date:</span><br />
      <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
          <option selected="selected">Month:</option>
          <option>Jan (01)</option>
          <option>Feb (02)</option>
          <option>Mar (03)</option>
          <option>Apr (04)</option>
          <option>May (05)</option>
          <option>Jun (06)</option>
          <option>Jul (07)</option>
          <option>Aug (08)</option>
          <option>Sep (09)</option>
          <option>Oct (10)</option>
          <option>Nov (11)</option>
          <option>Dec (12)</option>
        </select>
        <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
          <option selected="selected">Year:</option>
          <option>2009</option>
          <option>2010</option>
          <option>2011</option>
          <option>2012</option>
          <option>2013</option>
          <option>2014</option>
          <option>2015</option>
          <option>2016</option>
          <option>2017</option>
          <option>2018</option>
          <option>2019</option>
          <option>2020</option>
        </select>
        <br />
      <br />
      <span class="colorb">Notes:</span><br />
      <textarea name="notes" cols="20" rows="4"></textarea><br />
      <br />
      <input name="submit" type="button" value="Submit" />
      </form>
    </div-->
  </div>
</div>
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
    <div id="logo"><a href="<?php echo url_for('default/index')?>"><img src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></a></div>
  <?php else:?>
    <div id="logo-text"><a href="<?php echo url_for('default/index')?>"><?php echo $property->getName()?></a></div>
  <?php endif;?>
<?php end_slot() ?>
<?php slot('nav') ?>
<div id="nav">
  <div class="nav-item" title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Apartments - Home"><a href="<?php echo url_for('default/index')?>">Home</a></div>
  <div class="nav-item" title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans"><a href="<?php echo url_for('floorplans/index')?>">Floor Plans</a></div>
  <div class="nav-item" title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos"><a href="<?php echo url_for('photos/index')?>">Photos</a></div>
  <div class="nav-item" title="<?php echo $property->getCity()?> Apartment Complex - Features"><a href="<?php echo url_for('features/index')?>">Features</a></div>
  <div class="nav-item" title="Apts for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Our Community"><a href="<?php echo url_for('community/index')?>">Our Community</a></div>
  <?php if($propertyTemplate->getCustomPageName() != ''):?>
    <div class="nav-item"><a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>"><?php echo $propertyTemplate->getCustomPageName()?></a></div>
  <?php endif;?>
  <div class="nav-item" title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> Rentals - Contact Us"><a href="<?php echo url_for('contact/index')?>">Contact Us</a></div>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a></div>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <div class="nav-item"><a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a></div>
  <?php endif;?>
  <!--<div id="nav-item-extra"><a href="extra.html">Extra</a></div>-->
</div>
<?php end_slot() ?>
</div>
<?php slot('bot-nav') ?>
<div style="text-align: center; padding: 0px 0px 15px 0px; color: white; font-size:10px;">
    <a href="http://www.aptsutah.com/privacy-policy/">Privacy Policy</a> | <a href="http://www.aptsutah.com/terms-of-use/">Terms of Use</a> | <?php echo $property->getCity()?> Apartments | Copyright &copy;<?php echo date('Y');?></div>
<?php end_slot() ?>
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>
