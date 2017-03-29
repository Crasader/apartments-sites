      <div id="sec-content">
<div id="sec-title"><?php echo $title ?> Apartments</div>
<?php if($stateCode == 'CA'): ?>
  <p>AMC-CA, Inc. dba Apartment Management Consultants- BRE #1525033</p>
<?php endif;?>
        <?php foreach($properties as $property): ?>
        <div class="listing">
          <div class="floatl">
            <div class="list-photo">
              <span></span>
              <img width="150" height="100" src="/uploads/properties/<?php echo $property->getImage() ?>" alt="<?php echo "Apartments ".$property->getCity() ?>" border="0" />
            </div>
          </div>
          <div class="listing-txt">
            <div class="listing-right">
              <div class="floatr"><?php echo $property->getPriceRange() ?></div>
              <div class="listing-right-txt">Rent:</div>
              <br />
              <div class="floatr"><?php echo $property->getUnitType() ?></div>
              <div class="listing-right-txt">Unit Type:</div>
              <br /><br />
              <div class="floatr"><a href="/<?php echo preg_replace('/\s/','',$property->getState()->getName()) ?>/<?php echo preg_replace('/\s/','',$property->getCity()) ?>/<?php echo preg_replace('/[\s\.]/','',$property->getName()) ?>/Apartments/<?php echo $property->getId() ?>" title="Apartments <?php echo $property->getCity() ?>, Apartments <?php echo $property->getState()->getName() ?>"><img src="/images/btn-viewproperty.gif" border="0" /></a></div>
            </div>
            <div class="listing-title"><a class="listing-title" href="/<?php echo preg_replace('/\s/','',$property->getState()->getName()) ?>/<?php echo preg_replace('/\s/','',$property->getCity()) ?>/<?php echo preg_replace('/[\s\.]/','',$property->getName()) ?>/Apartments/<?php echo $property->getId() ?>" title="Apartments <?php echo $property->getCity() ?>, Apartments <?php echo $property->getState()->getName() ?>"><?php echo $property->getName() ?></a></div>
            <span class="listing-br"><br /></span>
            <?php echo $property->getAddress() ?><br />
            <?php echo $property->getCity() ?>, <?php echo $property->getState()->getCode() ?> <?php echo $property->getZip() ?><br />
            (P) <?php echo $property->getPhone() ?><br />
            (F) <?php echo $property->getFax() ?><br />
            <div class="listing-info"><span class="blue">Apartment Features:</span> <?php foreach($property->getPropertyApartmentFeatures() as $feature): ?><?php echo $feature->getApartmentFeature()->getName() ?>, <?php endforeach; ?></div>
            <div class="listing-info"><span class="blue">Community Features:</span> <?php foreach($property->getPropertyCommunityFeatures() as $feature): ?><?php echo $feature->getCommunityFeature()->getName() ?>, <?php endforeach; ?></div>
          </div>
        </div>
        <br />
        <?php endforeach; ?>
        <div style="text-align: center; padding-top:15px; clear:both;"><br />
    <b>Find Apartments for Rent, Studio, Townhomes using Apartment Locator by Popular Cities:</b><br />
<a href="/city/Aurora" title="Aurora Apartments">Aurora Apartments</a> |
<a href="/city/Denver" title="Denver Apartments">Denver Apartments</a> |
<a href="/city/Fresno" title="Fresno Apartments">Fresno Apartments</a> |
<a href="/city/Henderson" title="Henderson Apartments">Henderson Apartments</a><br />
<a href="/city/Las+Vegas" title="Las Vegas Apartments">Las Vegas Apartments</a> |
<a href="/city/Mesa" title="Mesa Apartments">Mesa Apartments</a> |
<a href="/city/Phoenix" title="Phoenix Apartments">Phoenix Apartments</a> |
<a href="/city/Salt+Lake+City" title="Salt Lake City Apartments">Salt Lake City Apartments</a><br />
<a href="/city/San+Francisco" title="San Francisco Apartments">San Francisco Apartments</a> |
<a href="/city/Seattle" title="Seattle Apartments">Seattle Apartments</a> |
<a href="/city/West+Valley+City" title="West Valley City Apartments">West Valley City Apartments</a>
<br /><br />
<b>View Virtual Tours, Photos, Floor Plans and Rental Information by Popular States:</b><br />
<a href="/state/AZ" title="Arizona Apartments">Arizona Apartments</a> |
<a href="/state/CA" title="CaliforniaApartments">California Apartments</a> |
<a href="/state/CO" title="Colorado Apartments">Colorado Apartments</a> |
<a href="/state/FL" title="Florida Apartments">Florida Apartments</a><br />
<a href="/state/IL" title="Illinois Apartments">Illinois Apartments</a> |
<a href="/state/NV" title="Nevada Apartments">Nevada Apartments</a> |
<a href="/state/OH" title="Ohio Apartments">Ohio Apartments</a> |
<a href="/state/UT" title="Utah Apartments">Utah Apartments</a> |
<a href="/state/WA" title="Washington Apartments">Washington Apartments</a><br />
<a href="/state/WY" title="Wyoming Apartments">Wyoming Apartments</a>
  </div>
</div>