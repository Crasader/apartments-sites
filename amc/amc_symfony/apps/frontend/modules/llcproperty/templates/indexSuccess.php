      <div id="sec-content2">
      	<div style="float:right; margin:0 0 0 20px;"><a href="javascript: history.go(-1)"><img src="/images/btn-apartmentmap-llc.gif" border="0" /></a></div>
<div id="llc-sec-title"><?php echo $title ?> Apartments</div>
        <?php foreach($properties as $property): ?>
        <div class="llc-listing">
          <div class="floatl">
            <div class="llc-list-photo">
              <span></span>
              <img src="/uploads/properties/<?php echo $property->getImage() ?>" alt="<?php echo $property->getName() ?>" border="0" />
            </div>
          </div>
          <div class="llc-listing-txt">
            <div class="llc-listing-right">
              <div class="floatr"><?php echo $property->getPriceRange() ?></div>
              <div class="llc-listing-right-txt">Rent:</div>
              <br />
              <div class="floatr"><?php echo $property->getUnitType() ?></div>
              <div class="llc-listing-right-txt">Unit Type:</div>
              <br /><br />
              <div class="floatr"><a href="<? echo $property->getURL() ?>" target="_blank"><img src="/images/btn-viewsite-llc.gif" border="0" alt="view site" /></a></div>
            </div>
            <div class="llc-listing-title"><?php echo $property->getName() ?></div><br />
            <span class="llc-listing-br"><br /></span>
            <?php echo $property->getAddress() ?><br />
            <?php echo $property->getCity() ?>, <?php echo $property->getState()->getCode() ?> <?php echo $property->getZip() ?><br />
            (P) <?php echo $property->getPhone() ?><br />
            (F) <?php echo $property->getFax() ?><br />
            <div class="llc-listing-info"><span class="llc-brown">Apartment Features:</span> <?php foreach($property->getPropertyApartmentFeatures() as $feature): ?><?php echo $feature->getApartmentFeature()->getName() ?>, <?php endforeach; ?></div>
            <div class="llc-listing-info"><span class="llc-brown">Community Features:</span> <?php foreach($property->getPropertyCommunityFeatures() as $feature): ?><?php echo $feature->getCommunityFeature()->getName() ?>, <?php endforeach; ?></div>
          </div>
        </div>
        <br />
        <?php endforeach; ?>
        </div>