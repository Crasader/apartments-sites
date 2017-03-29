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

<div id="availcontain" class="clearfix">

    <div class="row">
      <div id="availtitle">
        <h1>Check out what's available</h1>
        <div id="move-in">
          <?php /*<form id="contactform">
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
      <img src="/images/resp/down-arrow.svg" width="30px" class="hr-arrow" />
    </div>
 <?php /*
    <?php $fpcount=0;
      foreach($property->getPropertyFloorPlans() as $floorplan):
      $fpcount++;?>
    <div id="floorplan" class="clearfix">
      <div id="floorplanhdr">
        <h2><?php echo $floorplan->getName();?></h2>
        <a target="_blank" href="property-detail.html">2 available &raquo;</a> </div>
      <div class="floorplancell cell1">
        <h2>RENT</h2>
        <p><?php echo $floorplan->getPrice();?></p>
      </div>
      <div class="floorplancell cell2">
        <h2>DEPOSIT</h2>
        <p><?php echo $floorplan->getDeposit();?></p>
      </div>
      <div class="floorplancell cell3">
        <h2>SQ FEET</h2>
        <p><?php echo $floorplan->getSquareFeet();?></p>
      </div>
      <div class="floorplancell cell4">
        <h2>BED/BATH</h2>
        <p><?php echo $floorplan->getBedrooms();?> bed/<?php echo $floorplan->getBathrooms();?> ba</p>
      </div>
      <div class="floorplancell cell5"><a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" class="fancybox"><img src="/uploads/floorplans/169/<?php echo $floorplan->getImage()?>" /></a>
        <div class="floorplan-linkbox"><a href="/uploads/floorplans/<?php echo $floorplan->getImage()?>" class="fancybox">Floor Plan »</a></div>
      </div>
    </div>
    <?php endforeach;?>

  </div>*/?>
  <div id="floorplan remove-margin white-bottom-border" class="clearfix">
    <div class="floorplandetailhdr hdrcell1">&nbsp; </div>
    <div class="floorplandetailhdr hdrcell2">
    <p>RENT</p>
    </div>
    <div class="floorplandetailhdr hdrcell3">
    <p>UNIT</p>
    </div>
    <div class="floorplandetailhdr hdrcell4">
    <p>ADDITIONAL INFO</p>
    </div>
    <div class="floorplandetailhdr hdrcell5">
    <p>AVAILABLE</p>
    </div>
  </div>
  <div id="floorplandata">
  <?php
      $fpcount = 0;
      foreach($arrUnityAvailability as $arrUnit):
      $fpcount++;
      $rowColor = 'odd-row';
      $fpcount % 2 == 0 ? $rowColor = 'even-row' : '' ;
      ?>

    <div id="floorplan remove-margin clearfix">
      <div class="floorplandetailcell detailcell1 <?php echo $rowColor;?>">
        <div class="radiodetailcell">
          <!--input type="radio" name="unit-select" value="<?php echo $arrUnit["UnitNumber"];?>"-->
        </div>
      </div>
      <div class="floorplandetailcell detailcell2 <?php echo $rowColor;?>">
        <p>$<?php echo $arrUnit["UnitAskingPrice"];?> per month</p>
      </div>
      <div class="floorplandetailcell detailcell3 <?php echo $rowColor;?>">
        <p><?php echo $arrUnit["UnitNumber"];?></p>
      </div>
      <div class="floorplandetailcell detailcell4 <?php echo $rowColor;?>">
        <p><?php echo $arrUnit["UnitTypeDescription"];?></p>
      </div>
      <div class="floorplandetailcell detailcell5 <?php echo $rowColor;?>">
        <p><?php echo $arrUnit["DateVacated"];?></p>
      </div>
    </div>
    <?php endforeach;?>
    <?php /*<div id="floorplan remove-margin clearfix">
      <div class="floorplandetailcell detailcell1 even-row">
        <div class="radiodetailcell">
          <input type="radio" name="unit-select" value="property1">
        </div>
      </div>
      <div class="floorplandetailcell detailcell2 even-row">
        <p>$909 per month</p>
      </div>
      <div class="floorplandetailcell detailcell3 even-row">
        <p>Standard Unit</p>
      </div>
      <div class="floorplandetailcell detailcell4 even-row">
        <p>9,10,11,12</p>
      </div>
      <div class="floorplandetailcell detailcell5 even-row">
        <p>04/06/2015</p>
      </div>
    </div>*/?>
  </div>


  <div id="CTA" class="clearfix">
      <div id="checkitout">
        <h1>Come and check it out</h1>
      </div>
      <div id="call"> Call today for an appointment <?php echo $property->getPhone()?><br />
      </div>
  </div>
  <div class="detailbox"><p>*Pricing and availability are subject to change. Valid for new residents only. Square footages displayed are approximate. Discounts will be calculated upon lease execution. Minimum lease terms and occupancy guidelines may apply. Deposits may fluctuate based on credit, rental history, income, and/or other qualifying standards. Additional taxes and fees may apply and will be disclosed as per governing laws and company policies. </p></div>

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
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="<?php echo $propertyTemplate->getOnlineApplicationUrl();?>" target="_blank">Online Application</a>
    <?php elseif($propertyTemplate->getRentalappFile() != ''):?>
    <a title="<?php echo $property->getCity()?> Apartments For Rent - Rental Application" href="/uploads/properties/<?php echo $propertyTemplate->getRentalappFile();?>" target="_blank">Rental Application</a>
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