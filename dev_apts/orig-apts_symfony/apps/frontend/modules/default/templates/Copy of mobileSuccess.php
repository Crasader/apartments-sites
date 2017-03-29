<div data-role="page" id="home" data-theme="b">
<div data-role="header"  data-theme="b">
		<h1><?php echo $property->getName()?></h1>
		<p><img style="width: 100%; " src="/uploads/properties/<?php echo $propertyTemplate->getHomeImage()?>" alt="Apartments <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?>" /></p>
	</div><!-- /header -->
	<div data-role="content"  data-theme="b">	
	<p><a data-role="button" href="#features">features</a>
		<a data-role="button" href="#floorplans">floorplans</a>
		<a data-role="button" href="#photos">photos</a></p>
		<p><?php echo strip_tags(nl2br($propertyTemplate->getDescription()),'<br><p>'); ?></p>
		<div style="padding:5px;">
		<?php echo $property->getName()?><br />
		  <?php echo $property->getAddress()?><br />
      <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
      <?php if($property->getPhone()):?>
      <strong>Phone: </strong><a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
      <?php endif;?>
      <?php if($property->getFax()):?>
      <strong>Fax: </strong> <?php echo $property->getFax()?><br />
      <?php endif;?>
      <?php if($property->getEmail()):?>
      <strong>Email: </strong> <a href="mailto:<?php echo $property->getEmail()?>"><?php echo $property->getEmail()?></a>
      <?php endif;?>
  </div>	
	<?php if($propertyTemplate->getFacebookUrl() != ''):?>
    <div style="padding:5px;">
    <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo $propertyTemplate->getFacebookUrl()?>&amp;width=232&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=true&amp;height=200" scrolling="auto" frameborder="0" style="border:none; overflow:hidden; width:232px; height:200px;" allowTransparency="true"></iframe>
    </div>
  <?php endif;?>	
	</div><!-- /content -->
	<div data-role="footer"  data-theme="b">
	<?php if($propertyTemplate->getLogoImage()):?>
    <div style="float:left; width:50%;"><img style="width:100%;" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></div>
  <?php endif;?>
		<h4 style="color:white;">
		<?php if($property->getPhone()):?>
      Phone: <a style="color:white;" href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
    <?php endif;?>
    <a style="color:white;" href="#privacy">Privacy Policy</a> | <a style="color:white;" href="#terms">Terms of Use</a><br />Copyright &copy;<?php echo date('Y');?>
    </h4>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="features" data-theme="b">

	<div data-role="header" data-theme="b">
		<a href="#" data-icon="home" data-iconpos="notext" data-rel="back" class="ui-btn-right jqm-home ui-btn ui-btn-icon-notext ui-btn-corner-all ui-shadow ui-btn-up-f" title="Home" data-theme="f"><span class="ui-btn-inner ui-btn-corner-all" aria-hidden="true"><span class="ui-btn-text">Home</span><span class="ui-icon ui-icon-home ui-icon-shadow"></span></span></a>
		<h1><?php echo $property->getName()?></h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="b">
	
      <div  id="features-right">
    	<div class="color14">Location</div>
      <div class="txt-left10">
        <?php echo $property->getName()?><br />
        <?php echo $property->getAddress()?><br />
        <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br />
        <?php if($property->getPhone()):?>
       	<br />
      <strong>Phone: </strong><a href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
       <?php endif;?>
       <?php if($property->getFax()):?>
	     <strong>Fax:</strong> <?php echo $property->getFax()?><br />
	   <?php endif;?>
	   <?php if($property->getEmail()):?>
      <strong>Email: </strong> <a href="mailto:<?php echo $property->getEmail()?>"><?php echo $property->getEmail()?></a>
      <?php endif;?>
	  </div>
      <div class="color14">Office Hours</div>
      <div class="txt-left10">
		<?php echo nl2br($property->getHours())?>
      </div>
      <div class="color14">Apartment Features</div>
      <div class="txt-left10">
      	<ul>
      	<?php foreach($property->getPropertyApartmentFeatures() as $feature):?>
          <li><?php echo $feature->getApartmentFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
      <div class="color14">Community Features</div>
      <div class="txt-left10">
      	<ul>
        <?php foreach($property->getPropertyCommunityFeatures() as $feature):?>
          <li><?php echo $feature->getCommunityFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
      <div class="color14">Other Services And Features</div>
      <div class="txt-left10">
      	<ul>
      	<?php foreach($property->getPropertyOtherFeatures() as $feature):?>
          <li><?php echo $feature->getOtherFeature()->getName()?></li>
        <?php endforeach;?>
        </ul>
      </div>
    </div>

	</div><!-- /content -->

	<div data-role="footer" data-theme="b">
	<?php if($propertyTemplate->getLogoImage()):?>
    <div style="float:left; width:50%;"><img style="width:100%;" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></div>
  <?php endif;?>
		<h4 style="color:white;">
		<?php if($property->getPhone()):?>
      Phone: <a style="color:white;" href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
    <?php endif;?>
    <a style="color:white;" href="#privacy">Privacy Policy</a> | <a style="color:white;" href="#terms">Terms of Use</a><br />Copyright &copy;<?php echo date('Y');?>
    </h4>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="floorplans" data-theme="b">

	<div data-role="header" data-theme="b">
	<a href="#" data-icon="home" data-iconpos="notext" data-rel="back" class="ui-btn-right jqm-home ui-btn ui-btn-icon-notext ui-btn-corner-all ui-shadow ui-btn-up-f" title="Home" data-theme="f"><span class="ui-btn-inner ui-btn-corner-all" aria-hidden="true"><span class="ui-btn-text">Home</span><span class="ui-icon ui-icon-home ui-icon-shadow"></span></span></a>
		<h1><?php echo $property->getName()?></h1>
	</div><!-- /header -->

	<div data-role="content" data-theme="b">	
	<p style="text-align:center;"><?php echo $property->getName()?></p>
      <?php foreach($property->getPropertyFloorPlans() as $floorplan):?>
      <p style="text-align:center;">
      <strong><?php echo $floorplan->getName();?></strong><br />
      	<?php if($floorplan->getImage()):?>
         <img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" border="0" />
        <?php endif;?>
      	<br />
        <?php echo $floorplan->getBedrooms();?> Bedroom(s), <?php echo $floorplan->getBathrooms();?> Bath<br />
        <?php echo $floorplan->getSquareFeet();?> Sq. Ft.<br />
        Rent: <?php echo $floorplan->getPrice();?><br />
        Lease: <?php echo $floorplan->getLeaseTerm();?><br />
        Deposit: <?php echo $floorplan->getDeposit();?>
      </p>
      <?php endforeach;?>

	</div><!-- /content -->

	<div data-role="footer" data-theme="b">
	<?php if($propertyTemplate->getLogoImage()):?>
    <div style="float:left; width:50%;"><img style="width:100%;" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></div>
  <?php endif;?>
		<h4 style="color:white;">
		<?php if($property->getPhone()):?>
      Phone: <a style="color:white;" href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
    <?php endif;?>
    <a style="color:white;" href="#privacy">Privacy Policy</a> | <a style="color:white;" href="#terms">Terms of Use</a><br />Copyright &copy;<?php echo date('Y');?>
    </h4>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="photos" data-theme="b">

	<div data-role="header" data-theme="b">
	<a href="#" data-icon="home" data-iconpos="notext" data-rel="back" class="ui-btn-right jqm-home ui-btn ui-btn-icon-notext ui-btn-corner-all ui-shadow ui-btn-up-f" title="Home" data-theme="f"><span class="ui-btn-inner ui-btn-corner-all" aria-hidden="true"><span class="ui-btn-text">Home</span><span class="ui-icon ui-icon-home ui-icon-shadow"></span></span></a>
		<h1><?php echo $property->getName()?></h1>
	</div><!-- /header -->
<div data-role="content" data-theme="b">
<p style="text-align:center;"><?php echo $property->getName()?></p>	
    <?php $pcount=0; 
     foreach($mainPhotos as $photo):
     $pcount++;
    ?>

      	<p style="text-align:center;">
        	
          <img src="/uploads/photos/258/<?php echo $photo->getImage()?>" alt="<?php echo $photo->getName()?>" border="0" /></a>
        </p>


    <?php endforeach;?>  

    


	</div><!-- /content -->

	<div data-role="footer" data-theme="b">
	<?php if($propertyTemplate->getLogoImage()):?>
    <div style="float:left; width:50%;"><img style="width:100%;" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></div>
  <?php endif;?>
		<h4 style="color:white;">
		<?php if($property->getPhone()):?>
      Phone: <a style="color:white;" href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
    <?php endif;?>
    <a style="color:white;" href="#privacy">Privacy Policy</a> | <a style="color:white;" href="#terms">Terms of Use</a><br />Copyright &copy;<?php echo date('Y');?>
    </h4>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="privacy" data-theme="b">

	<div data-role="header" data-theme="b">
	<a href="#" data-icon="home" data-iconpos="notext" data-rel="back" class="ui-btn-right jqm-home ui-btn ui-btn-icon-notext ui-btn-corner-all ui-shadow ui-btn-up-f" title="Home" data-theme="f"><span class="ui-btn-inner ui-btn-corner-all" aria-hidden="true"><span class="ui-btn-text">Home</span><span class="ui-icon ui-icon-home ui-icon-shadow"></span></span></a>
		<h1><?php echo $property->getName()?></h1>
	</div><!-- /header -->
<div data-role="content" data-theme="b">
<h1 class="title">Privacy Policy Statement</h1>
<p>This is the web site of <strong><?php echo $property->getName()?></strong>.</p>
<p>Our postal address is<br />
<strong>
<?php echo $property->getAddress()?><br />
<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> <?php echo $property->getZip()?> <br />
</strong></p>
<p>We can be reached via e-mail at <a href="mailto:info@amcapartments.com">info@amcapartments.com</a></p>
<p>For each visitor to our Web page, our Web server automatically recognizes the consumer&#8217;s domain name and e-mail address (where possible).</p>
<p>We collect the domain name and e-mail address (where possible) of visitors to our Web page, the e-mail addresses of those who post messages to our bulletin board, the e-mail addresses of those who communicate with us via e-mail, the e-mail addresses of those who make postings to our chat areas, aggregate information on what pages consumers access or visit, user-specific information on what pages consumers access or visit, information volunteered by the consumer, such as survey information and/or site registrations, name and address, telephone number, fax number, payment information (e.g., credit card number and billing address).</p>
<p>The information we collect is used to improve the content of our Web page, used to customize the content and/or layout of our page for each individual visitor, used to notify consumers about updates to our Web site, shared with agents or contractors who assist in providing support for our internal operations, used by us to contact consumers for marketing purposes, shared with other reputable organizations to help them contact consumers for marketing purposes, disclosed when legally required to do so, at the request of governmental authorities conducting an investigation, to verify or enforce compliance with the policies governing our Website and applicable laws or to protect against misuse or unauthorized use of our Website, to a successor entity in connection with a corporate merger, consolidation, sale of assets or other corporate change respecting the Website.</p>
<p>With respect to cookies: We use cookies to store visitors preferences, record session information, such as items that consumers add to their shopping cart, record user-specific information on what pages users access or visit, alert visitors to new areas that we think might be of interest to them when they return to our site, record past activity at a site in order to provide better service when visitors return to our site , ensure that visitors are not repeatedly sent the same banner ads, customize Web page content based on visitors&#8217; browser type or other information that the visitor sends.</p>
<p>If you do not want to receive e-mail from us in the future, please let us know by sending us e-mail at the above address.</p>

<p>From time to time, we make the e-mail addresses of those who access our site available to other reputable organizations whose products or services we think you might find interesting. If you do not want us to share your e-mail address with other companies or organizations, please let us know by sending us e-mail at the above address.</p>
<p>From time to time, we make our <em>customer</em> e-mail list available to other reputable organizations whose products or services we think you might find interesting. If you do not want us to share your e-mail address with other companies or organizations, please let us know by sending us e-mail at the above address.</p>
<p>If you supply us with your postal address on-line you may receive periodic mailings from us with information on new products and services or upcoming events. If you do not wish to receive such mailings, please let us know by sending us e-mail at the above address.</p>
<p>you may receive mailings from other reputable companies. You can, however, have your name put on our do-not-share list by sending us e-mail at the above address.</p>
<p>Please provide us with your exact name and address. We will be sure your name is removed from the list we share with other organizations</p>
<p>Persons who supply us with their telephone numbers on-line may receive telephone contact from us with information regarding new products and services or upcoming events. If you do not wish to receive such telephone calls, please let us know by sending us e-mail at the above address.</p>
<p>Persons who supply us with their telephone numbers on-line may receive telephone contact from other reputable companies. You can, however, have your name put on our do-not-share list by , sending us e-mail at the above address.</p>

<p>Please provide us with your name and phone number. We will be sure your name is removed from the list we share with other organizations.</p>
<p>From time to time, we may use customer information for new, unanticipated uses not previously disclosed in our privacy notice. If our information practices change at some time in the future we will post the policy changes to our Web site to notify you of these changes and we will use for these new purposes only data collected from the time of the policy change forward. If you are concerned about how your information is used, you should check back at our Web site periodically.</p>
<p>Customers may prevent their information from being used for purposes other than those for which it was originally collected by e-mailing us at the above address.</p>
<p>If you feel that this site is not following its stated information policy, you may contact us by sending us e-mail at the above address.</p>
</div><!-- /content -->
	<div data-role="footer" data-theme="b">
	<?php if($propertyTemplate->getLogoImage()):?>
    <div style="float:left; width:50%;"><img style="width:100%;" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></div>
  <?php endif;?>
		<h4 style="color:white;">
		<?php if($property->getPhone()):?>
      Phone: <a style="color:white;" href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
    <?php endif;?>
    <a style="color:white;" href="#privacy">Privacy Policy</a> | <a style="color:white;" href="#terms">Terms of Use</a><br />Copyright &copy;<?php echo date('Y');?>
    </h4>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="terms" data-theme="b">

	<div data-role="header" data-theme="b">
	<a href="#" data-icon="home" data-iconpos="notext" data-rel="back" class="ui-btn-right jqm-home ui-btn ui-btn-icon-notext ui-btn-corner-all ui-shadow ui-btn-up-f" title="Home" data-theme="f"><span class="ui-btn-inner ui-btn-corner-all" aria-hidden="true"><span class="ui-btn-text">Home</span><span class="ui-icon ui-icon-home ui-icon-shadow"></span></span></a>
		<h1><?php echo $property->getName()?></h1>
	</div><!-- /header -->
<div data-role="content" data-theme="b">
  	<h1 class="title">Terms of Use</h1>

<b>Web Site Terms and Conditions of Use</b><br />
<b>1. Terms</b>
<p>By accessing this web site, you are agreeing to be bound by these web site Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this web site are protected by applicable copyright and trade mark law.</p>
<b>2. Use License</b>
<ol type="a">
<li>Permission is granted to temporarily download one copy of the materials (information or software) on <?php echo $property->getName()?>&#8217;s web site for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
<ol type="i">
<li>modify or copy the materials;</li>
<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
<li>attempt to decompile or reverse engineer any software contained on <?php echo $property->getName()?>&#8217;s web site;</li>
<li>remove any copyright or other proprietary notations from the materials; or</li>
<li>transfer the materials to another person or &#8220;mirror&#8221; the materials on any other server.</li>

</ol>
</li>
<li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by <?php echo $property->getName()?> at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
</ol>
<b>3. Disclaimer</b>
<ol type="a">
<li>The materials on <?php echo $property->getName()?>&#8217;s web site are provided &#8220;as is&#8221;. <?php echo $property->getName()?> makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, <?php echo $property->getName()?> does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.</li>
</ol>
<b>4. Limitations</b>
<p>In no event shall <?php echo $property->getName()?> or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on <?php echo $property->getName()?>&#8217;s Internet site, even if <?php echo $property->getName()?> or a <?php echo $property->getName()?> authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>

<b>5. Revisions and Errata</b>
<p>The materials appearing on <?php echo $property->getName()?>&#8217;s web site could include technical, typographical, or photographic errors. <?php echo $property->getName()?> does not warrant that any of the materials on its web site are accurate, complete, or current. <?php echo $property->getName()?> may make changes to the materials contained on its web site at any time without notice. <?php echo $property->getName()?> does not, however, make any commitment to update the materials.</p>
<b>6. Links</b>
<p><?php echo $property->getName()?> has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by <?php echo $property->getName()?> of the site. Use of any such linked web site is at the user&#8217;s own risk.</p>
<b>7. Site Terms of Use Modifications</b>
<p><?php echo $property->getName()?> may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.</p>
<b>8. Governing Law</b>
<p>Any claim relating to <?php echo $property->getName()?>&#8217;s web site shall be governed by the laws of the State of <?php echo $property->getState()->getName()?> without regard to its conflict of law provisions.</p>
</div><!-- /content -->
	<div data-role="footer" data-theme="b">
	<?php if($propertyTemplate->getLogoImage()):?>
    <div style="float:left; width:50%;"><img style="width:100%;" src="/uploads/properties/<?php echo $propertyTemplate->getLogoImage()?>" alt="<?php echo $property->getName()?>" border="0" /></div>
  <?php endif;?>
		<h4 style="color:white;">
		<?php if($property->getPhone()):?>
      Phone: <a style="color:white;" href="tel:<?php echo $property->getPhone()?>"><?php echo $property->getPhone()?></a><br />
    <?php endif;?>
    <a style="color:white;" href="#privacy">Privacy Policy</a> | <a style="color:white;" href="#terms">Terms of Use</a><br />Copyright &copy;<?php echo date('Y');?>
    </h4>
	</div><!-- /footer -->
</div><!-- /page -->
<?php slot('tracking-code') ?>
    <?php if($propertyTemplate->getTrackingCode()):?>
    	<?php echo $propertyTemplate->getTrackingCode()?>
    <?php endif;?>
<?php end_slot() ?>