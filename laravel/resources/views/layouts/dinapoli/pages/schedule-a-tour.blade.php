@extends('layouts/dinapoli/main')
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Schedule a Tour</h1>
                            <div class="hs-line-4 font-alt">
                                <?php echo $entity->getText('schedule-a-tour-title','Want to see our units? What time works best for you?'); ?>
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','SCHEDULE A TOUR')
                        @section('recaptcha-js')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        @stop
            @section('content')
             <!-- Schedule Form Section -->
            <section class="page-section pb-0" id="contact-form">
                <div class="container relative">
                    
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            
                            <div class="col-md-7 col-sm-7 mb-sm-50 mb-xs-30 form-container">
                                <form role="form" id="form1" name="form1" method="post" class="validate" action="/" novalidate="novalidate">
                                    <?php //TODO: Find a form helper for laravel that will do this for us ?>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>First Name</label>
                                        <input type="hidden" name="ActionRequested" id="ActionRequested" value="schedule-a-tour">
                                        <input type="text" name="first_name" id="first_name" data-validate="required" data-message-required="First name is a required field" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" id="last_name" data-validate="required" data-message-required="Last name is a required field" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" data-validate="required" data-message-required="Email is a required field" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" id="phone" data-validate="required" data-message-required="Phone number is a required field" data-mask="phone" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Approximate Move-in Date</label>
                                        <input type="date" name="date" id="date" class="input-md form-control">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>When would you like to visit us?</label>
                                        <input type="date" name="visit-date" id="visit-date" class="input-md form-control">
                                    </div>
                                    {{csrf_field()}}
                                    <div class="mb-20 mb-md-10">
                                        <button type="submit" class="btn btn-mod btn-brown btn-large btn-round submit-btn">Submit</button>
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
                                                        <?php //TODO: grab google maps stuff here ?>
                                                        <script type='text/javascript'>
                                                            function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(<?php echo $entity->getLatitude() . ", " . $entity->getLongitude();?>),scrollwheel:false,mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);iconBase='';marker = new google.maps.Marker({position: new google.maps.LatLng(<?php echo $entity->getLatitude() . "," . $entity->getLongitude(); ?>),gestureHandling: 'cooperative',map: map,icon: iconBase + 'img/custom-marker.png'});infowindow = new google.maps.InfoWindow({content:'<?php echo $entity->getText('google-maps-title');?>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
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

        @section('page-specific-js')
        <?php //TODO: !optimization add version numbers to the end of .js files for caching validation/invalidation ?>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/TweenMax.min.js"></script>
		<script src="js/resizeable.js"></script>
		<script src="js/neon-api.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/neon-custom.js"></script>
		<script src="js/neon-demo.js"></script>
		<script src="js/jquery.inputmask.bundle.js"></script>
		@stop
