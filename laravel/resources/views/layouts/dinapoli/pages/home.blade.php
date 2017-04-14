<?php
    $specials = app()->make('App\Property\Specials');
    $spec = $specials->fetchAllSpecials();
    
?>
@extends('layouts/dinapoli/main')
        @section('content')
        <!-- Page Wrap -->
        <div class="page" id="top">
            <!-- Home Section -->
            <section class="home-section" id="home">
                <!-- Scroll Down -->
                <div class="local-scroll">
                    <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                </div>
                <!-- End Scroll Down -->
            	<!-- Main Slider -->
                <div class="main-slider">
                    <ul class="slippry">
                        <li>
                            <?php //TODO: Loop through and dump slideshow ?>
                            <div class="container">
                                <div class="slide-title text-shadow">
                                    <h1>The Gateway to Henderson Nevada</h1>
                                    <h2>Live seconds from shopping, dining, arts & culture.</h2>
                                    <a href="schedule-a-tour" class="btn btn-block btn-mod btn-brown btn-large btn-round">Schedule a Tour</a>
                                </div>
                            </div>
                            <img src="<?php echo $entity->getWebPublicDirectory('slides') ;?>/home-top-slide1a.jpg" class="visible-md visible-lg">
                            <img src="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide1a.jpg" class="visible-xs visible-sm">
                        </li>
                        <li>
                            <div class="container">
                                <div class="slide-title text-shadow">
                                    <h1>Modern Living in the Heart of the Green Valley</h1>
                                    <h2>One- and two-bedroom apartment <br>homes in a tree-lined community.</h2>
                                    <a href="schedule-a-tour" class="btn btn-block btn-mod btn-brown btn-large btn-round">Schedule a Tour</a>
                                </div>
                            </div>
                            <img src="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide2a.jpg" class="visible-md visible-lg">
                            <img src="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide2a.jpg" class="visible-xs visible-sm">
                        </li>
                        <li>
                            <div class="container">
                                <div class="slide-title text-shadow">
                                    <h1>Comfort and Luxuries</h1>
                                    <h2>24 hour town, scenic pool area, <br>and outdoor lounges. </h2>
                                    <a href="schedule-a-tour" class="btn btn-block btn-mod btn-brown btn-large btn-round">Schedule a Tour</a>
                                </div>
                            </div>
                            <img src="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide3a.jpg" class="visible-md visible-lg">
                            <img src="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide3a.jpg" class="visible-xs visible-sm">
                        </li>
                    </ul>
                </div>
                <?php if(isset($spec['website'])): ?>
                <div class="specials-gallery visible-xs visible-sm visible-md visible-lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <b><?php echo $spec['website']; ?></b> - CALL FOR DETAILS
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </section>
            <!-- End Home Section -->

            
            <!-- About Section -->
            <section class="page-section" id="about">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-40 mb-sm-40">
                        About <?php echo $entity->getText('apartment-title');?>
                    </h2>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="section-text align-center mb-40 mb-xs-40">
                                    <?php echo $entity->getText('home-about'); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->

            
            <!-- Community Section -->
            <section class="page-section pt-0 pb-30 banner-section bg-dark-alfa-70" data-background="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide4.jpg" id="community">
                <div class="container relative">
                    
                    <div class="row">
                        
                        <div class="col-sm-12 text-center">
                            
                            <div class="mt-140 mt-lg-80 mb-80 mb-lg-80 mb-sm-30">
                                <div class="banner-content text-shadow">
                                    <h3 class="banner-heading font-alt">Your New Neighborhood</h3>
                                    <div class="banner-decription">
                                        <?php echo $entity->getText('home-neighborhood-description');//,'Immerse yourself in the culture of Downtown Henderson at Martinique Bay.<br>Located just seconds from all the fun, food, and entertainment, and near the freeway, our location is ideal for every lifestyle.');
                                        ?>
                                        <ul>
                                        <?php
                                            foreach($entity->hasNeighborhood()->get()->toArray() as $index => $nFeature):
                                        ?>
                                                <li><a href="neighborhood"><?php echo strtoupper($nFeature['name']); ?></a></li>
                                        <?php
                                            endforeach
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="local-scroll">
                                        <a href="neighborhood" class="btn btn-mod btn-brown btn-large btn-round">SEE ALL THE ATTRACTIONS</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            </section>
            <!-- End Community Section -->


            <!-- Other Features Section -->
            <section class="page-section" id="other-features">
                <div class="container relative">
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                        <?php
                            $features = app()->make('App\Property\Feature');
                            $features->setFeaturesLimit(['apartment' => 6,'community' => 6]);
                            $features->loadSelectedFeatures(['apartment','community']);
                            $features->setFeaturesFormatter(new App\Util\Formatter('li'));
                            foreach(['apartment' => 'Apartment Features',
                                'community' => 'Community Features'
                                ] as $section => $label):
                        ?>
                            <div class="col-sm-6">
                                <h2 class="section-title font-alt mb-40 mb-sm-40">{{ $label }}</h2>
                                <div class="col-md-6">
                                     <div class="text">
                                        <ul style="list-style-type:none; line-height: 30px;">
                                            <?php echo implode('',$features->getEntireFeaturesSection($section)); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 no-padding">
                                    <img src="<?php echo $entity->getWebPublicDirectory('features');?>/<?php echo $section;?>.png"  class="img-responsive">
                                </div>
                            </div>
                        <?php
                            endforeach;
                        ?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- End Other Features Section -->

            
            <!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-light" data-background="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide2a.jpg">
                <div class="container relative">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mt-70 mt-lg-70 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content">
                                    <h3 class="banner-heading font-alt text-shadow mt-120 mt-sm-70 mt-xs-70"><b>Join Our community</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-50 mt-lg50 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content text-right">
                                    <div class="local-scroll">
                                        <p><a href="floorplans" class="btn btn-mod btn-brown btn-large btn-round">SEE FLOOR PLANS</a></p>
                                        <p><a href="schedule-a-tour" class="btn btn-mod  btn-large btn-round">SCHEDULE A TOUR</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Call Action Section -->
            
                       
            
            <!-- Gallery Section -->
            <section class="page-section pb-0 " id="portfolio">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        GALLERY
                    </h2>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="section-text align-center mb-70 mb-xs-40">
                                <?php echo $entity->getText('gallery-intro-section'); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php $galleryLimit = 6; ?>
                    @include('layouts/dinapoli/pages/inc/gallery')
                </div>
            </section>
            <!-- End Gallery Section -->
            
            <!-- Google Map -->
            <section class="page-section pb-0">
				<div class="relative">
           			<h2 class="section-title font-alt mb-70 mb-sm-40">
                        OUR LOCATION
                    </h2>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="section-text align-center mb-70 mb-xs-40">
                                    <?php echo $entity->getText('gallery-our-location'); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
            		<!-- Google Map -->
                    <div class="map-block">
                        <div class="map">
                            <div class="map-container">
                                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                                <div style="overflow:hidden;height:537px;max-width:100%;">
                                    <div id="map-canvas" style="max-width:100%;"></div>
                                <div>
                            @include('layouts/dinapoli/pages/inc/google-maps-script')   
                            @include('layouts/dinapoli/pages/inc/google-maps-apartment-feature')
                        </div>
                    </div>
           	 	</div>
                        </div>
             </section>
            <!-- End Google Map -->
			@stop
            @section('schedule-a-tour')
                @include('layouts/dinapoli/pages/inc/schedule-a-tour')
            @stop
            @section('contact')
			<section class="contact-padding page-section pb-0" id="contact">
                <div class="container relative">
                    
                    <div class="row">
                        
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                
                                <!-- Phone -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Call Us
                                        </div>
                                        <div class="ci-text">
                                            <?php echo $entity->getPhone(); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Phone -->
                                
                                <!-- Address -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Address
                                        </div>
                                        <div class="ci-text">
                                            <?php echo strtoupper($entity->getFullAddressBr()); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address -->
                                
                                <!-- Office Hours -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Office Hours
                                        </div>
                                        <div class="ci-text">
                                        <?php echo $entity->getHours(); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Office Hours-->
                                
                            </div>
                        </div>
                        
                    </div>
            	
            	</div>        
            </section>
                      
            @stop
            
        @section('google-map-js')
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below 
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKPvpp1b3YxfaEfOZQ6ySdzcpkDSfwqs8"></script>
        @stop
        @section('page-specific-js')
        <script type="text/javascript">
            $(function(){
                if(localStorage.getItem('#banner-special') != 'shown'){
                    $("#banner-special").slideDown();
                }

                $("#banner-special-close").click(function(e) {
                    e.preventDefault();

                    if(localStorage.getItem('#banner-special') != 'shown'){
                        $("#banner-special").slideUp();
                        localStorage.setItem('#banner-special','shown')
                    }

                    
                });
            });
        </script>
        @stop

        @section('page-specific-js')
	    <script type="text/javascript">
            $(function(){
                if(localStorage.getItem('#banner-special') != 'shown'){
                    $("#banner-special").slideDown();
                }

                $("#banner-special-close").click(function(e) {
                    e.preventDefault();

                    if(localStorage.getItem('#banner-special') != 'shown'){
                        $("#banner-special").slideUp();
                        localStorage.setItem('#banner-special','shown')
                    }


                });
            });
        </script>
        @stop
