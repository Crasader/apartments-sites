      <div id="home-content">
        <div id="featured-title"><img src="/images/featured-title.gif" alt="featured properties" /></div>
        <?php $count = 0;
        foreach($properties as $property): 
          $count++;?>
        <div id="featured-listing<?php echo $count ?>">
          <div class="photo">
            <span></span>
            <img width="150" height="100" src="/uploads/properties/<?php echo $property->getImage() ?>" alt="<?php echo $property->getName() ?>" />
          </div>
          <div class="featured-name"><?php echo $property->getName() ?></div>
          <div class="featured-txt">
            <span class="blue">Apartment Features</span><br />
            <ul>
               <?php foreach($property->getPropertyApartmentFeatures() as $feature): ?>
                <li><?php echo $feature->getApartmentFeature()->getName() ?></li>
              <?php endforeach; ?>
            </ul>
            <br />
            <span class="blue">Property Description</span><br />
            <?php echo nl2br($property->getDescription()) ?>
            <div class="featured-view"><a href="<?php echo url_for('property/list?view=detail&id='.$property->getId()) ?>"><img src="/images/btn-viewproperty.gif" alt="view property" border="0" /></a></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>