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
                            <img src="img/slides/home-top-slide1a.jpg" class="visible-md visible-lg">
                            <img src="img/slides/home-top-slide1a-m.jpg" class="visible-xs visible-sm">
                        </li>
                        <li>
                            <div class="container">
                                <div class="slide-title text-shadow">
                                    <h1>Modern Living in the Heart of the Green Valley</h1>
                                    <h2>One- and two-bedroom apartment <br>homes in a tree-lined community.</h2>
                                    <a href="schedule-a-tour" class="btn btn-block btn-mod btn-brown btn-large btn-round">Schedule a Tour</a>
                                </div>
                            </div>
                            <img src="img/slides/home-top-slide2a.jpg" class="visible-md visible-lg">
                            <img src="img/slides/home-top-slide2a-m.jpg" class="visible-xs visible-sm">
                        </li>
                        <li>
                            <div class="container">
                                <div class="slide-title text-shadow">
                                    <h1>Comfort and Luxuries</h1>
                                    <h2>24 hour town, scenic pool area, <br>and outdoor lounges. </h2>
                                    <a href="schedule-a-tour" class="btn btn-block btn-mod btn-brown btn-large btn-round">Schedule a Tour</a>
                                </div>
                            </div>
                            <img src="img/slides/home-top-slide3a.jpg" class="visible-md visible-lg">
                            <img src="img/slides/home-top-slide3a-m.jpg" class="visible-xs visible-sm">
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
                        About <?php //TODO grab apartment title ?>Martinique Bay
                    </h2>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="section-text align-center mb-40 mb-xs-40">
                                    <?php //TODO get welcome text for about section ?>
                                    No more endless searching when you visit this gated community in the heart of Green Valley. This tree lined community offers two bedroom or three bedroom apartments loaded with convenience and comfort. We offer both contemporary and classic designs with oversized garden tubs, window seating in almost every room, wood burning fireplaces, sky lights, and lofty vaulted ceilings.
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->

            
            <!-- Community Section -->
            <section class="page-section pt-0 pb-30 banner-section bg-dark" data-background="img/slides/home-top-slide3.jpg" id="community">
                <div class="container relative">
                    
                    <div class="row">
                        
                        <div class="col-sm-12 text-center">
                            
                            <div class="mt-140 mt-lg-80 mb-80 mb-lg-80 mb-sm-30">
                                <div class="banner-content text-shadow">
                                    <h3 class="banner-heading font-alt">Your New Neighborhood</h3>
                                    <div class="banner-decription">
                                        <?php //TODO: grab neighborhood description ?>
                                        Immerse yourself in the culture of Downtown Henderson at Martinique Bay.<br>Located just seconds from all the fun, food, and entertainment, and near the freeway, our location is ideal for every lifestyle.
                                        <?php //TODO: grab neighborhood points of interest ?>
                                        <ul>
                                            <li><a href="neighborhood">GALLERIA AT SUNSET</a></li>
                                            <li><a href="neighborhood">ACACIA PARK</a></li>
                                            <li><a href="neighborhood">COUNTRY FRESH FARMERS MARKET</a></li>
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
                            <div class="col-sm-6">
                                <h2 class="section-title font-alt mb-40 mb-sm-40">Apartment Features</h2>
                                <?php //TODO: re-use the apartment features cruft ?>
                                <div class="col-md-6">
                                     <div class="text">
                                        <ul style="list-style-type:none; line-height: 30px;">
                                            <li>- All Electric Kitchen</li>
                                            <li>- Breakfast Bar</li>
                                            <li>- Vaulted Ceiling</li>
                                            <li>- Wood Burning Fireplaces</li>
                                            <li>- Private Patios/Balconies</li>
                                            <li>- New Renovations</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 no-padding">
                                    <img src="img/gallery/am2.png"  class="img-responsive">
                                </div>
                               
                            </div>
                            <div class="col-sm-6">
                                <h2 class="section-title font-alt mb-40 mb-sm-40">Community Features</h2>
                                <?php //TODO: re-use the community features cruft ?>
                                <div class="col-md-6">
                                    <div class="text">
                                        <ul style="list-style-type:none; line-height: 30px;">
                                            <li>- Soothing Spa/Hot Tub</li>
                                            <li>- Washer Dryer in Unit</li>
                                            <li>- Furnished Units Available</li>
                                            <li>- Fitness Center</li>
                                            <li>- Gated Acces</li>
                                            <li>- And many more!</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 no-padding">
                                    <img src="img/gallery/am1.png"  class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Other Features Section -->

            
            <!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-light" data-background="img/slides/home-top-slide2a.jpg">
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
                                        <p><a href="floor-plans" class="btn btn-mod btn-brown btn-large btn-round">SEE FLOOR PLANS</a></p>
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
                                <?php //TODO: grab gallery description ?>
                                    In&nbsp;auctor ex&nbsp;id&nbsp;urna faucibus porttitor. Lorem ipsum dolor sit amet, 
                                    consectetur adipiscing elit. In&nbsp;maximus ligula semper metus pellentesque mattis.  
                                    Maecenas volutpat, diam enim sagittis quam, id&nbsp;porta quam. Sed id&nbsp;dolor 
                                    consectetur fermentum nibh volutpat, accumsan purus.
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Filter -->                    
                    <div class="works-filter font-alt align-center">
                    <?php //TODO: grab gallery filters ?>
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <a href="#exterior" class="filter" data-filter=".exterior">Community</a>
                        <a href="#interior" class="filter" data-filter=".interior">Apartment</a>
                    </div>                    
                    <!-- End Works Filter -->
                    
                    <!-- Gallery Grid -->
                    <ul class="works-grid work-grid-3 work-grid-gut clearfix font-alt hover-white hide-titles" id="work-grid">
                        <?php //TODO: grab gallery items ?>
                        <!-- Gallery Item (Lightbox) -->
                        <li class="work-item mix exterior">
                            <a href="img/gallery/ext1.jpg" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="img/gallery/ext1.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Exterior</h3>
                                    <div class="work-descr">
                                        Lorem ipsum dolor sit amet 
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Gallery Item -->


                        <!-- Gallery Item (Lightbox) -->
                        <li class="work-item mix interior">
                            <a href="img/gallery/int1.jpg" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="img/gallery/int1.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Interior</h3>
                                    <div class="work-descr">
                                        Lorem ipsum dolor sit amet 
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Gallery Item -->


                        <!-- Gallery Item (Lightbox) -->
                        <li class="work-item mix exterior">
                            <a href="img/gallery/ext2.jpg" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="img/gallery/ext2.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Exterior</h3>
                                    <div class="work-descr">
                                        Lorem ipsum dolor sit amet 
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Gallery Item -->

                         <!-- Gallery Item (Lightbox) -->
                        <li class="work-item mix interior">
                            <a href="img/gallery/int2.jpg" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="img/gallery/int2.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Interior</h3>
                                    <div class="work-descr">
                                        Lorem ipsum dolor sit amet 
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Gallery Item -->


                        <!-- Gallery Item (Lightbox) -->
                        <li class="work-item mix exterior">
                            <a href="img/gallery/ext3.jpg" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="img/gallery/ext3.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Exterior</h3>
                                    <div class="work-descr">
                                        Lorem ipsum dolor sit amet 
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Gallery Item -->

                        <!-- Gallery Item (Lightbox) -->
                        <li class="work-item mix interior">
                            <a href="img/gallery/int3.jpg" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="img/gallery/int3.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Interior</h3>
                                    <div class="work-descr">
                                        Lorem ipsum dolor sit amet 
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Gallery Item -->
                        
                    </ul>
                    <!-- End Gallery Grid -->
                    
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
                                    Curabitur eu adipiscing lacus, a iaculis diam. Nullam placerat blandit auctor. Nulla accumsan ipsum et nibh rhoncus, eget tempus sapien ultricies. Donec mollis lorem vehicula.
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
                                
                                <script type='text/javascript'>
                                <?php //TODO: update this google maps information ?>
                                    function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(36.0670112,-115.0839982),scrollwheel:false,mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);iconBase='';marker = new google.maps.Marker({position: new google.maps.LatLng(36.0670112,-115.0839982),gestureHandling: 'cooperative',map: map,icon: iconBase + 'img/custom-marker.png'});infowindow = new google.maps.InfoWindow({content:'<strong>Martinique Bay</strong><br>3000 High View Drive Henderson, NV<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                            </div>
                            <div class="container overlap-ds box-shadow--2dp hidden-sm hidden-xs">
                                <div class="location">
                                    <b><?php //TODO get property title ?>Martinique Bay</b>
                                    <p>
                                        <?php echo $entity->getStreet() . "<br>";
                                        echo $entity->getCity() . ", " . $entity->getState() . " " ;
                                        echo $entity->getZipCode() . "<br>";
                                        echo $entity->getPhone();
                                        ?>
                                    </p>
                                </div>
                                <div class="hours">
                                    <b>Office Hours</b>
                                    <p>
                                    <?php echo $entity->getHours(); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
           	 	</div>
                        </div>
             </section>
            <!-- End Google Map -->
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
                                            <?php echo $entity->getFullAddressBr(); ?>
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
