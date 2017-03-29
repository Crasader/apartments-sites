<?php /*<div id="sec-content">
  <div id="sec-left3">
    <h1 class="title">Floor Plans at <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?></h1>
    <p><?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> offers <?php echo $property->getUnitType()?> apartments. Our floor plans are designed with your comfort and enjoyment in mind. Choose <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> as your new home and enjoy the convenient location and superior service.</p>
    <span class="font-10i">- Click a floorplan to enlarge</span><br />

    <div class="floorplan-row">
    <?php $fpcount=0;
      foreach($property->getPropertyFloorPlans() as $floorplan):
      $fpcount++;?>
      <div class="floorplan-item">
        <?php if($floorplan->getImage()):?>
        <a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" rel="lightbox[floorplans]" title="<?php echo $floorplan->getName();?>"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" alt="<?php echo $floorplan->getName();?>" align="right" border="0" /></a>
        <?php endif;?>
        <strong><?php echo $floorplan->getName();?></strong><br />
        <?php echo $floorplan->getBedrooms();?> Bedroom(s), <?php echo $floorplan->getBathrooms();?> Bath<br />
        <?php echo $floorplan->getSquareFeet();?> Sq. Ft.
        <?php if($floorplan->getPrice()):?>
          <br />Rent: <?php echo $floorplan->getPrice();?>
        <?php endif; ?>
        <?php if($floorplan->getLeaseTerm()):?>
          <br />Lease: <?php echo $floorplan->getLeaseTerm();?>
        <?php endif; ?>
        <?php if($floorplan->getDeposit()):?>
          <br />Deposit: <?php echo $floorplan->getDeposit();?>
          <br /><small><em>*Prices are subject to change</em></small>
        <?php endif; ?>
        <?php if($floorplan->getAvailabilityLink()):?>
        <p><button onclick="window.open('<?php echo $floorplan->getAvailabilityLink();?>','mywindow','width=640,height=480,resizable=yes,scrollbars=yes')">Availability</button></p>
        <?php endif; ?>
      </div>
      <?php if($fpcount % 2 == 0 && $property->countPropertyFloorplans() > $fpcount):?>
      </div><div class="floorplan-row">
    <?php endif;?>
    <?php endforeach;?>
    </div>
    *Prices are subject to change, based on availability and qualification of applicant, additional fees may apply
  </div>
</div>
*/?>

<div id="availcontain" class="clearfix" style="border-bottom: 1px solid #a1afa7; padding-bottom: 30px;">
    <div class="row">
      <div id="availtitle">
      <h1>Floor Plans at <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?></h1>
      <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> offers <?php echo $property->getUnitType()?> apartments. Our floor plans are designed with your comfort and enjoyment in mind. Choose <?php echo $property->getName()?> Apartments in <?php echo $property->getCity()?> as your new home and enjoy the convenient location and superior service.
        <?php /*<h1>Check out our floor plans</h1>*/?>
        <div id="move-in"><?php /*
          <form id="contactform">
            <ul >
              <li>
                <label class="description" for="element_1">Move In Day </label>
                <div class="mobilemaxwidth">
                  <input type="text" id="datepicker"  maxlength="255" value=""/>
                </div>
              </li>
            </ul>
          </form>*/?>
        </div>
      </div>
    </div>
    <div id="availhr">
      <hr>
      <img src="/images/resp/down-arrow.svg" width="30px" class="hr-arrow" /> </div>
    <?php if(in_array($property->getCode(),array('607SET'))):?>
    <iframe src="https://www.marketapts.com/apartment_availability/floor_plans_amc.asp" frameborder="0" width="100%" scrolling="no" class="myiframe" id="myiframe"></iframe>  
    <?php else:?>

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
        <p><?php echo $row['floorplan']['price'];?></p>
      </div>
      <div class="floorplancell cell2">
        <h2>DEPOSIT</h2>
        <p><?php echo $row['floorplan']['deposit'];?></p>
      </div>
      <div class="floorplancell cell3">
        <h2>SQ FEET</h2>
        <p><?php echo $row['floorplan']['squarefeet'];?></p>
      </div>
      <div class="floorplancell cell4">
        <h2>BED/BATH</h2>
        <?php if($row['floorplan']['bedrooms'] == 0 ):?>
          <p> studio/<?php echo $row['floorplan']['bathrooms'];?> ba</p>
        <?php else:?>
          <p><?php echo $row['floorplan']['bedrooms'];?> bed/<?php echo $row['floorplan']['bathrooms'];?> ba</p>
        <?php endif;?> 
      </div>
      <div class="floorplancell cell5"><a href="/uploads/floorplans/<?php echo $row['floorplan']['image'];?>" class="fancybox"><img src="/uploads/floorplans/169/<?php echo $row['floorplan']['image'];?>" alt="<?php echo $row['floorplan']['name'];?>" title="<?php echo $row['floorplan']['name'];?>"/></a>
        <div class="floorplan-linkbox"><a href="/uploads/floorplans/<?php echo $row['floorplan']['image'];?>" class="fancybox">Floor Plan »</a></div>
      </div>
    </div>
    <?php endforeach;?>
    <p>*Pricing and availability are subject to change. Valid for new residents only. Square footages displayed are approximate. Discounts will be calculated upon lease execution. Minimum lease terms and occupancy guidelines may apply. Deposits may fluctuate based on credit, rental history, income, and/or other qualifying standards. Additional taxes and fees may apply and will be disclosed as per governing laws and company policies.</p>
    <?php /*<div id="floorplan" class="clearfix">
      <div id="floorplanhdr">
        <h2>Name of floorplan</h2>
        <a target="_blank" href="property-detail.html">2 available &raquo;</a> </div>
      <div class="floorplancell cell1">
        <h2>RENT</h2>
        <p>$1200 per month</p>
      </div>
      <div class="floorplancell cell2">
        <h2>DEPOSIT</h2>
        <p>$1500</p>
      </div>
      <div class="floorplancell cell3">
        <h2>SQ FEET</h2>
        <p>1341</p>
      </div>
      <div class="floorplancell cell4">
        <h2>BED/BATH</h2>
        <p>2 bed/1 ba</p>
      </div>
      <div class="floorplancell cell5"><a href="img/floorplan.jpg" class="fancybox"><img src="img/floorplan.svg" /></a>
        <div class="floorplan-linkbox"><a href="img/floorplan.jpg" class="fancybox">Floor Plan »</a></div>
      </div>
    </div>
    <div id="floorplan" class="clearfix">
      <div id="floorplanhdr">
        <h2>Name of floorplan</h2>
        <a target="_blank" href="property-detail.html">2 available &raquo;</a> </div>
      <div class="floorplancell cell1">
        <h2>RENT</h2>
        <p>$1200 per month</p>
      </div>
      <div class="floorplancell cell2">
        <h2>DEPOSIT</h2>
        <p>$1500</p>
      </div>
      <div class="floorplancell cell3">
        <h2>SQ FEET</h2>
        <p>1341</p>
      </div>
      <div class="floorplancell cell4">
        <h2>BED/BATH</h2>
        <p>2 bed/1 ba</p>
      </div>
      <div class="floorplancell cell5"><a href="img/floorplan.jpg" class="fancybox"><img src="img/floorplan.svg" /></a>
        <div class="floorplan-linkbox"><a href="img/floorplan.jpg" class="fancybox">Floor Plan »</a></div>
      </div>
    </div>
    <div id="floorplan" class="clearfix">
      <div id="floorplanhdr">
        <h2>Name of floorplan</h2>
        <a target="_blank" href="property-detail.html">2 available &raquo;</a> </div>
      <div class="floorplancell cell1">
        <h2>RENT</h2>
        <p>$1200 per month</p>
      </div>
      <div class="floorplancell cell2">
        <h2>DEPOSIT</h2>
        <p>$1500</p>
      </div>
      <div class="floorplancell cell3">
        <h2>SQ FEET</h2>
        <p>1341</p>
      </div>
      <div class="floorplancell cell4">
        <h2>BED/BATH</h2>
        <p>2 bed/1 ba</p>
      </div>
      <div class="floorplancell cell5"><a href="img/floorplan.jpg" class="fancybox"><img src="img/floorplan.svg" /></a>
        <div class="floorplan-linkbox"><a href="img/floorplan.jpg" class="fancybox">Floor Plan »</a></div>
      </div>
    </div>
    <div id="floorplan" class="clearfix">
      <div id="floorplanhdr">
        <h2>Name of floorplan</h2>
        <a target="_blank" href="property-detail.html">2 available &raquo;</a> </div>
      <div class="floorplancell cell1">
        <h2>RENT</h2>
        <p>$1200 per month</p>
      </div>
      <div class="floorplancell cell2">
        <h2>DEPOSIT</h2>
        <p>$1500</p>
      </div>
      <div class="floorplancell cell3">
        <h2>SQ FEET</h2>
        <p>1341</p>
      </div>
      <div class="floorplancell cell4">
        <h2>BED/BATH</h2>
        <p>2 bed/1 ba</p>
      </div>
      <div class="floorplancell cell5"><a href="img/floorplan.jpg" class="fancybox"><img src="img/floorplan.svg" /></a>
        <div class="floorplan-linkbox"><a href="img/floorplan.jpg" class="fancybox">Floor Plan »</a></div>
      </div>
    </div>
    <div id="floorplan" class="clearfix">
      <div id="floorplanhdr">
        <h2>Name of floorplan</h2>
        <a target="_blank" href="property-detail.html">2 available &raquo;</a> </div>
      <div class="floorplancell cell1">
        <h2>RENT</h2>
        <p>$1200 per month</p>
      </div>
      <div class="floorplancell cell2">
        <h2>DEPOSIT</h2>
        <p>$1500</p>
      </div>
      <div class="floorplancell cell3">
        <h2>SQ FEET</h2>
        <p>1341</p>
      </div>
      <div class="floorplancell cell4">
        <h2>BED/BATH</h2>
        <p>2 bed/1 ba</p>
      </div>
      <div class="floorplancell cell5"><a href="img/floorplan.jpg" class="fancybox"><img src="img/floorplan.svg" /></a>
        <div class="floorplan-linkbox"><a href="img/floorplan.jpg" class="fancybox">Floor Plan »</a></div>
      </div>
    </div>*/?>
  <?php endif;?> 
  </div>

     <div id="CTA" class="clearfix">
      <div id="checkitout">
        <h1>Come and check it out</h1>
      </div>
      <div id="call"> Call today for an appointment <?php echo $property->getPhone()?><br />
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
  <div class="nav-item" title="Apartments for Rent in <?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> - Floor Plans">Floor Plans</a></div>
  <div class="nav-item"><a title="<?php echo $property->getCity()?>, <?php echo $property->getState()->getCode()?> Homes - Photos"href="<?php echo url_for('photos/index')?>">Photos</a></div>
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

<?php slot('main-repeat') ?>
<div id="main-repeat2">
<?php end_slot() ?>

<?php slot('main-bot') ?>
<div id="main-bot2">
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