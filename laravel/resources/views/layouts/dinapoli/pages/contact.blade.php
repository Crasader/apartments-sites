@extends('layouts/dinapoli/main')
                       @section('page-title-row') 
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Contact Us</h1>
                            <div class="hs-line-4 font-alt">
                                Have a question? Reach out to our helpful staff 24/7.
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','CONTACT')
            @section('content')        
            <!-- Contact Form Section -->
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
                                                            <?php //TODO: Grab latitude and longitude? Would that work here? Test it out. ?>
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
            @stop
            <!-- End About Section -->
            @section('schedule-a-tour','')
            @section('action','')
