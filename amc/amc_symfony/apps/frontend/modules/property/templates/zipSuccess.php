      <div id="sec-content">
<div id="sec-title"><?php echo count($properties)?> Apartments <?php echo $title ?></div>
        <?php foreach($properties as $property): ?>
        <div class="listing">
          <div class="floatl">
            <div class="list-photo">
              <span></span>
              <img width="150" height="100" src="/uploads/properties/<?php echo $property->image ?>" alt="<?php echo "Apartments ".$property->city ?>" border="0" />
            </div>
          </div>
          <div class="listing-txt">
            <div class="listing-right">
              <div class="floatr"><?php echo $property->price_range ?></div>
              <div class="listing-right-txt">Rent:</div>
              <br />
              <div class="floatr"><?php echo $property->unit_type ?></div>
              <div class="listing-right-txt">Unit Type:</div>
              <br /><br />
              
              <div class="floatr"><a href="/<?php echo preg_replace('/\s/','',$property->state_name) ?>/<?php echo preg_replace('/\s/','',$property->city) ?>/<?php echo preg_replace('/\s/','',$property->name) ?>/Apartments/<?php echo $property->id ?>" title="Apartments <?php echo $property->city ?>, Apartments <?php echo $property->state_name ?>"><img src="/images/btn-viewproperty.gif" border="0" /></a></div>
            </div>
            <div class="listing-title"><a class="listing-title" href="/<?php echo preg_replace('/\s/','',$property->state_name) ?>/<?php echo preg_replace('/\s/','',$property->city) ?>/<?php echo preg_replace('/\s/','',$property->name) ?>/Apartments/<?php echo $property->id ?>" title="Apartments <?php echo $property->city ?>, Apartments <?php echo $property->state_name ?>" title="Apartments <?php echo $property->city ?>, Apartments <?php echo $property->state_name ?>"><?php echo $property->name ?></a></div><br />
            <span class="listing-br"><br /></span>
            <?php echo number_format($property->distance,0) ?> miles<br />
            <?php echo $property->address ?><br />
            <?php echo $property->city ?>, <?php echo $property->state_code ?> <?php echo $property->zip ?><br />
            (P) <?php echo $property->phone ?><br />
            (F) <?php echo $property->fax ?><br />
            <!-- div class="listing-info"><span class="blue">Apartment Features:</span> <?php /*foreach($property->getPropertyApartmentFeatures() as $feature): ?><?php echo //$feature->getApartmentFeature()->getName() ?>, <?php endforeach;*/ ?></div-->
            <!-- div class="listing-info"><span class="blue">Community Features:</span> <?php /*foreach($property->getPropertyCommunityFeatures() as $feature): ?><?php echo //$feature->getCommunityFeature()->getName() ?>, <?php endforeach;*/ ?></div-->
          </div>
        </div>
        <br />
        <?php endforeach; ?>
        </div>