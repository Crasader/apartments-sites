<!-- banner:start -->
<div style="float:left; width:999px;">
	<img src="/images/jsp/banner_contact.jpg" alt="<?php echo $property->getName();?>" title="<?php echo $property->getName();?>" />
</div>
<!-- banner:end -->

<!-- Content -->
<div class="content_container">
	<div class="content_container_params">
		<div class="content_container_margins">

			<div class="page_title_shell">
				<div style="width:140px;" class="page_title_params_secondary">
				Terms of Use
				</div>
			</div>

			<div class="content_secondary">


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
  <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
  <a href="<?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink())?>" class="nav_item"><?php echo strtoupper($propertyTemplate->getCustomPageName())?></a>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank" class="nav_item">RENTAL APPLICATION PDF</a>
  <?php endif;?>
<?php else:?>
  <?php if($propertyTemplate->getOnlineApplicationUrl() != ''):?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
    <a href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank" class="nav_item">ONLINE RENTAL APPLICATION</a>
  <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a href="https://amcrentpay.com" target="_blank" class="nav_item_end">ONLINE RENT PAY</a>
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