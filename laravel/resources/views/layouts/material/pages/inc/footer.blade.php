     <!-- Footer -->
                <footer class="page-footer blue-grey darken-4 white-text">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h3 class="white-text">Come check us out!</h3>
                <ul class="footer-list">
                    <li><b>Call Today</b>&nbsp;:&nbsp;(801) 869-8200 </li>
                    <li><b>Location</b>&nbsp;:&nbsp;644 West North Temple Salt Lake City, UT 84116</li>
                    <li>

                    </li>
                    <li>
                        <a href="" target="_blank"><img src="images/facebook.png"></a>
                        <a href="" target="_blank"><img src="images/twitter.png"></a>
                        <a href="" target="_blank"><img src="images/instagram.png"></a>
                        <a href="" target="_blank"><img src="images/google-plus.png"></a>

                    </li>
                </ul>
              </div>
              <div class="col l4 s12">
                <h4 class="white-text">644 City Station</h4>
                <ul>
                    <li><a href="gallery">Gallery</a></li>
                    <li><a href="amenities">Amenities</a></li>
                    <li><a href="floorplans">Floor Plans</a></li>
                    <li><a href="neighborhood">Neighborhood</a></li>
                    <li><a href="contact">Contact</a></li>
                    <li><a href="floorplans">Schedule a Tour</a></li>
                    <li>
<?php //TODO: Make dinapoli and bascom use these Util::common calls :) ?>
                        <a href=""><img class="hud-img" src="<?php echo Util::common('images','fair-housing');?>" alt="Equal Housing" title="Equal Housing"></a>
                        <a href="resident-portal"><img class="hud-img" src="<?php echo Util::common('images','pet-friendly');?>" width="30" height="20" alt="Pet Friendly" title="Pet Friendly"></a>
                        <a href=""><img class="hud-img" src="<?php echo Util::common('images','disability');?>" width="30" height="20" alt="Disability Access" title="Disability Access"></a>
                    </li>

                </ul>
              </div>
              <div class="col l2 s12">
                <h4 class="white-text">Residents</h4>
                <ul>
                    <li><a href="resident-portal">Pay Online</a></li>
                    <li><a href="resident-portal">Apply Online</a></li>
                    <li><a href="resident-portal">Maintenance Request</a></li>
                    <li><a href="resident-portal">Suggestion Box</a></li>
                    <li><a href="resident-portal">Reviews</a></li>
                    <li><a href="resident-portal">Pet Policies</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <ul class="legal-links">
                            <li>&reg; <?php echo $entity->getLegacyProperty()->name;?></li>
                            <li><a href="privacy-policy">Privacy Policy</a></li>
                            <li><a href="terms-of-service">Terms of Service</a></li>
                            <li><a href="https://www.marketapts.com/" target="_blank" title="Powered by MarketApts.com&reg;">Powered by MarketApts.com&reg;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          </div>
        </footer>
        <!-- End Footer -->
     
