@extends('layouts/dinapoli/main')
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Schedule a Tour</h1>
                            <div class="hs-line-4 font-alt">
                                Want to see our untis? What time works best for you?
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','SCHEDULE A TOUR')
            @section('content')
             <!-- Schedule Form Section -->
            <section class="page-section pb-0" id="contact-form">
                <div class="container relative">
                    
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            
                            <div class="col-md-7 col-sm-7 mb-sm-50 mb-xs-30">
                                <form>
                                    <div class="mb-20 mb-md-10">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <label>Phone</label>
                                        <input type="text" name="phone" id="phone" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <label>Approximate Move-in Date</label>
                                        <input type="date" name="date" id="date" class="input-md form-control">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <label>When would you like to visit us?</label>
                                        <input type="date" name="visit-date" id="visit-date" class="input-md form-control">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <button type="submit" class="btn btn-mod btn-brown btn-large btn-round">Submit</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="col-md-5 col-sm-5 mb-sm-50 mb-xs-30 text-center">
                                <div class="row">
                                	<div class="col-sm-12">
                                		<!-- Google Map -->
                                            <div class="map-block">
                                                <div class="map">
                                                    <div class="map-container">
                                                        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                                                        <div style="overflow:hidden;height:537px;max-width:100%;">
                                                            <div id="map-canvas" style="max-width:100%;"></div>
                                                        <div>

                                                        <script type='text/javascript'>
                                                            function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(36.0670112,-115.0839982),scrollwheel:false,mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);iconBase='';marker = new google.maps.Marker({position: new google.maps.LatLng(36.0670112,-115.0839982),gestureHandling: 'cooperative',map: map,icon: iconBase + 'img/custom-marker.png'});infowindow = new google.maps.InfoWindow({content:'<strong>Martinique Bay</strong><br>3000 High View Drive Henderson, NV<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                	</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Schedule Section -->
            @stop

            @section('contact')
            <section class="page-section pt-0" id="contact">
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
                                            <?php echo $entity->getStreet() . "<br>" . $entity->getCity() . ", " . $entity->getState() . " " . $entity->getZipCode(); ?>
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

        @section('google-maps-js')
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKPvpp1b3YxfaEfOZQ6ySdzcpkDSfwqs8"></script>
        @stop
