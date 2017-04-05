@extends('layouts/dinapoli/main')
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">NEIGHBORHOOD</h1>
                        </div>
                        @stop
                        @section('page-title-span','NEIGHBORHOOD')
            @section('content')
            <!-- About Section -->
            <section class="page-section" id="about">
                <div class="container relative">
                    
                    <div class="section-text mb-80 mb-sm-20">
	                    <div class="row">
	                        <?php //TODO: Grab team items and dump them accordingly ?>
	                        <!-- Team item -->
	                        <div class="col-sm-4 mb-xs-50 wow fadeInUp">
	                            <div class="team-item ">
	                                
	                                <div class="team-item-image">
	                                    
	                                    <img src="img/shopping-dining-img.jpg" alt="" class="mb-40 mb-sm-20"/>
	                                    
	                                    <div class="team-item-detail">
	                                        
	                                        <h4 class="font-alt normal">Galleria at Sunset</h4>
	                                        
	                                        <p>
	                                            Minutes from 80 On Gibson, enjoy Dining and Shopping at The Galleria at Sunset . 
	                                        </p>
	                                        
	                                    </div>
	                                    
	                                </div>
	                                <div class="text">
	                               	
	                               		Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis. Maecenas  volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus.
	                           		
	                           		</div>
	                            </div>
	                            
	                            
	                        </div>
	                        <!-- End Team item -->
	                        
	                        <!-- Team item -->
	                        <div class="col-sm-4 mb-xs-50 wow fadeInUp" data-wow-delay="0.1s">
	                            <div class="team-item">
	                                <div class="team-item-image">
	                                    
	                                    <img src="img/acacia-park-img.jpg" alt="" class="mb-40 mb-sm-20"/>
	                                    
	                                    <div class="team-item-detail">
	                                        
	                                        <h4 class="font-alt normal">Acacia Park</h4>                            
	                                       
	                                    </div>
	                                </div>    
                                    <div class="text">	
                                    	
                                    	In maximus ligula semper metus pellentesque mattis. Maecenas  volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus. 
                                    
                                    </div>
	                                
	                              
	                            </div>
	                        </div>
	                        <!-- End Team item -->
	                        
	                        <!-- Team item -->
	                        <div class="col-sm-4 mb-xs-50 wow fadeInUp" data-wow-delay="0.2s">
	                            <div class="team-item">
	                                <div class="team-item-image">
	                                    
	                                    <img src="img/farmers-market-img.jpg" alt="" class="mb-40 mb-sm-20" />
	                                    
	                                    <div class="team-item-detail">
	                                        
	                                        <h4 class="font-alt normal">Country Fresh Farmers Market</h4>
	                                        
	                                        <p>Every Thursday (weather permitting) from 9 a.m. to 3 p.m. at The Henderson Events Plaza at 200 Water Street</p>
	                                    </div>
	                                </div>
	                                <div class="text">
	                                
	                                	 Etiam sit amet fringilla lacus. Pellentesque suscipit ante at ullamcorper pulvinar neque porttitor. Integer lectus. Praesent sed nisi eleifend, fermentum orci amet, iaculis libero. Donec vel ultricies purus. Nam dictum sem, eu aliquam.
	                                
	                                </div>                               
	                            </div>
	                        </div>
	                        <!-- End Team item -->
                    	</div>
						
                    </div>
                    
                </div>
            </section>
            <!-- End About Section -->
            
            <!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-dark" data-background="img/slides/home-top-slide2a.jpg">
                <div class="container relative">
                    
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <div class="mt-70 mt-lg70 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content text-shadow">
                                    <h3 class="banner-heading font-alt">Join Our community</h3>
                                    <div class="banner-decription">
                                        Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor. 
                                        Integer non dapibus diam, ac eleifend lectus.
                                    </div>
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
            
            <section class="page-section pb-0">
            	<div class="container relative">
            		<div class="section-text mb-60 mb-sm-20">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mb-70 mb-sm-40 align-center">
                            	<h2 class="section-title font-alt">An Easier Commute</h2>
                                <div class="section-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis. Maecenas  volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus.</div>
                            </div>
                    
                        </div>
	                </div>
            	</div>
            </section>
            
            
            <!-- Google Map -->
            <section class="page-section pb-0">
                <div class="relative"> 
                    <!-- Google Map -->
                    <div class="map-block">
                        <div class="map">
                            <div class="map-container">
                                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                                <div style="overflow:hidden;height:537px;max-width:100%;">
                                    <div id="map-canvas" style="max-width:100%;"></div>
                                <div>
                                
                                <script type='text/javascript'>
                                <?php //TODO: generate this via php and dump it here ?>
                                    function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(36.0670112,-115.0839982),scrollwheel:false,mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);iconBase='';marker = new google.maps.Marker({position: new google.maps.LatLng(36.0670112,-115.0839982),gestureHandling: 'cooperative',map: map,icon: iconBase + 'img/custom-marker.png'});infowindow = new google.maps.InfoWindow({content:'<strong>Martinique Bay</strong><br>3000 High View Drive Henderson, NV<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                            </div>
                            <div class="container overlap-ds box-shadow--2dp hidden-sm hidden-xs">
                                <div class="location">
                                    <b><?php //TODO grab entity title ?>Martinique Bay</b>
                                    <p>
                                        <?php echo $entity->getStreet() . '<br>';
                                        echo $entity->getCity() . ', ' . $entity->getState() . ' ';
                                        echo $entity->getZipCode() . '<br>';
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
             </section>
            <!-- End Google Map -->
             @stop
            
            @section('action','')
            @section('contact','')
            @section('schedule-a-tour')
            <!-- Schedule a Tour Section -->
                @include('layouts/dinapoli/pages/inc/schedule-a-tour')
            <!-- End Schedule a Tour Section -->
            @stop


        @section('google-maps-js')
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below 
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKPvpp1b3YxfaEfOZQ6ySdzcpkDSfwqs8"></script>
        @stop
