      <div id="sec-content">
        <h1 id="sec-title"><?php echo $property->getCity() ?> Apartments at <?php echo $property->getName() ?>!</h1>
        <div class="detail">
        <br />
          <div class="detail-l">
            <div class="list-photo">
              <span></span>
              <img width="150" height="100" src="/uploads/properties/<?php echo $property->getImage() ?>" alt="<?php echo "Apartments ".$property->getCity() ?>" border="0" />
            </div>
            <br />
            <div class="listing-title"><a class="listing-title" href="<? echo $property->getURL() ?>" target="_blank" title="<?php echo "Apartments in ".$property->getCity().", ".$property->getState()->getName() ?>"><?php echo $property->getName() ?></a></div><br />
            <span class="listing-br"><br /></span>
            <?php echo $property->getAddress() ?><br />
            <?php echo $property->getCity() ?>, <?php echo $property->getState()->getCode() ?> <?php echo $property->getZip() ?><br />
            (P) <?php echo $property->getPhone() ?><br />
            (F) <?php echo $property->getFax() ?><br />
            <br />
            <br />
            <div class="listing-title">Office Hours</div><br />
            <span class="listing-br"><br /></span>
            <?php echo nl2br($property->getHours()) ?>
          </div>
          <div class="detail-txt">
            <div class="listing-right">
              <div class="floatr"><?php echo $property->getPriceRange() ?></div>
              <div class="listing-right-txt">Rent:</div>
              <br />
              <div class="floatr"><?php echo nl2br($property->getUnitType()) ?></div>
              <div class="listing-right-txt">Unit Type:</div>
            </div>
            <div class="floatl"><a href="<? echo $property->getURL() ?>" target="_blank" title="<?php echo "Apartments in ".$property->getCity().", ".$property->getState()->getCode() ?>"><img src="/images/btn-viewsite.gif" border="0" /></a></div>
            <div class="detail-info"><span class="red"><?php echo $property->getSpecial()?></span></div>
            <div class="detail-info2">
              <span class="blue14">Apartment Features:</span> 
              <ul>
              <?php foreach($property->getPropertyApartmentFeatures() as $feature): ?>
                <li><?php echo $feature->getApartmentFeature()->getName() ?></li>
              <?php endforeach; ?>
              </ul>
            </div>
            <div class="detail-info2">
              <span class="blue14">Community Features:</span>
              <ul>
              <?php foreach($property->getPropertyCommunityFeatures() as $feature): ?>
                <li><?php echo $feature->getCommunityFeature()->getName() ?></li>
              <?php endforeach; ?>
              </ul>
            </div>
            <div class="detail-info">
              <span class="blue14">Pet Policy</span><br />
              <?php echo $property->getPetPolicy() ?>
            </div>
            <div class="detail-info">
              <span class="blue14">Property Description</span><br />
              <?php echo nl2br($property->getDescription()) ?>
            </div>
          </div>
          <div id="detail-table">
            <div id="detail-table-top"></div>
            <div  id="detail-table-rowh">
              <div class="detail-table-floorplan">Floor Plan</div>
              <div class="detail-table-bed">Bed</div>
              <div class="detail-table-bath">Bath</div>
              <div class="detail-table-sqfeet">Sq. Feet</div>
              <div class="detail-table-price">Price</div>
              <div class="detail-table-term">Term</div>
              <div class="detail-table-deposit">Deposit</div>
            </div>
            <?php foreach($property->getPropertyFloorplans() as $floorplan): ?>
            <div class="detail-table-row">
              <div class="detail-table-floorplan2"><?php echo $floorplan->getName() ?></div>
              <div class="detail-table-bed"><?php echo $floorplan->getBedrooms() ?></div>
              <div class="detail-table-bath"><?php echo $floorplan->getBathrooms() ?></div>
              <div class="detail-table-sqfeet"><?php echo $floorplan->getSquareFeet() ?></div>
              <div class="detail-table-price"><?php echo $floorplan->getPrice() ?></div>
              <div class="detail-table-term"><?php echo $floorplan->getLeaseTerm() ?></div>
              <div class="detail-table-deposit2"><?php echo $floorplan->getDeposit() ?></div>
            </div>
            <?php endforeach; ?>
            <div id="detail-table-bot"></div>
          </div>
        </div>
      </div>