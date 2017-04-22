            <footer class="page-section bg-gray-lighter footer pb-60">
                <div class="container">
                    
                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeIn" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeIn;">
                        <a href="#top"><img src="<?php echo $entity->getWebPublicDirectory('logo');?>/logo.png" alt=""></a>
                    </div>
                    <!-- End Footer Logo -->
                    
                    <!-- Social Links -->
                    <div class="footer-social-links mb-30">
                    <?php 
                        
                        $fb = $entity->getSocialMedia('fb');
                        $twitter = $entity->getSocialMedia('twitter');
                        $insta = $entity->getSocialMedia('insta');
                        $li = $entity->getSocialMedia('li');
                        $pin = $entity->getSocialMedia('pinterest');
                        $google = $entity->getSocialMedia('google');
                        $yelp = $entity->getSocialMedia('yelp');

                        \Debugbar::info("$fb $twitter $insta $li");
                    ?>
                        <?php if(strlen($fb)): ?> <a href="<?php echo $fb?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a> <?php endif; ?>
                        <?php if(strlen($google)): ?> <a href="<?php echo $google?>" title="Google" target="_blank"><i class="fa fa-google"></i></a> <?php endif; ?>
                        <?php if(strlen($yelp)): ?> <a href="<?php echo $yelp?>" title="Yelp" target="_blank"><i class="fa fa-yelp"></i></a> <?php endif; ?>
                        <?php if(strlen($twitter)): ?> <a href="<?php echo $twitter?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a> <?php endif; ?>
                        <?php if(strlen($insta)): ?> <a href="<?php echo $insta?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a> <?php endif; ?>
                        <?php if(strlen($li)): ?> <a href="<?php echo $li?>" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a> <?php endif; ?>
                        <?php if(strlen($pin)): ?> <a href="<?php echo $pin?>" title="LinkedIn+" target="_blank"><i class="fa fa-pinterest"></i></a> <?php endif; ?>
                    </div>
                    <!-- End Social Links -->

                    <div class="row mb-30">
                        <div class="col-md-12">
                            <h2 class="section-title font-alt">
                                <?php echo $entity->getStreet() . " " . 
                                $entity->getCity() . ", " . 
                                $entity->getAbbreviatedState() . " " . 
                                $entity->getZipCode(); ?>
                            </h2>
                        </div>
                    </div>

                    <div class="row mb-30">

                        <div class="col-md-3"></div>

                        <div class="col-md-2">
                            <ul class="text-center">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="gallery">Gallery</a></li>
                                <li><a href="amenities">Amenities</a></li>
                                <li><a href="floorplans">Floor Plans</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2">
                            <ul class="text-center">
                                <li><a href="neighborhood">Neighborhood</a></li>
                                <li><a href="schedule-a-tour">Schedule a Tour</a></li>
                                <li><a href="floorplans">View Available Units</a></li>
                                <li><a href="apply-online">Apply Online</a></li>
                            </ul>
                        </div>

                        <div class="col-md-2">
                            <ul class="text-center">
                                <li><a href="resident-portal">Resident Portal</a></li>
                                <li><a href="contact">Contact Us</a></li>
                                <li><a href="privacy">Privacy Policy</a></li>
                                <li><a href="terms">Terms of Service</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-md-3"></div>

                    </div>  
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <img src="<?php echo $entity->getWebPublicDirectory('logo');?>/hudimg.png" width="30" height="20" alt="Equal Housing" title="Equal Housing" class="eq-house-img"> 
                            <img src="<?php echo $entity->getWebPublicDirectory('logo');?>/pet.png" width="30" height="20" alt="Pet Friendly" title="Pet Friendly" class="eq-house-img"> 
                            <img src="<?php echo $entity->getWebPublicDirectory('logo');?>/disabled.png" width="30" height="20" alt="Disability Access" title="Disability Access" class="eq-house-img"> 
                        </div>
                        
                        <div class="footer-made">
                            Copyright © <?php echo date("Y");?><br>
                            <?php echo $entity->getLegacyProperty()->name;?> Apartments. All rights reserved.
                        </div>
                        
                    </div>
                    <!-- End Footer Text --> 
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 <div class="marketapts"><a href="https://www.marketapts.com/" style='font-size: 10px;' target="_blank" title="Powered by MarketApts.com&reg;">Powered by MarketApts.com&reg;</a></div> 
            </footer>
