        @extends('layouts/material/main')
        @section('content')
			<!-- Slider -->
			<a href="/gallery">
				<img src="<?php echo $entity->getWebPublicDirectory('slides');?>/slide1-desktop.jpg" class="responsive-img animated fadeIn hide-on-small-only">
				<img src="<?php echo $entity->getWebPublicDirectory('slides');?>/slide1-mobile.jpg" class="responsive-img animated fadeIn hide-on-med-and-up">
			</a>
			
			<!-- End Slider -->
			
			<div class="section deep-orange darken-2 call-out">
				<div class="row container">
					<h2 class="white-text"><?php echo $entity->getLegacyProperty()->name;?></h2>
					<p class="white-text text-darken-3 lighten-3">
						<?php echo $entity->getText('material-title',['oneshot' => "<?php echo $entity->getLegacyProperty()->name;?> is Salt Lake City's newest downtown living destination. Located in the heart of the city, our community is within walking distance to the downtown business district, shopping, restaurants, and entertainment. With TRAX and FrontRunner stations just steps from your front door, you'll be minutes away from everything. At home, you'll enjoy spacious floor plans, granite counter tops, wood floors, elevated ceilings, walk-in closets and much more. Move up to downtown luxury at <?php echo $entity->getLegacyProperty()->name;?>. Ask about our Move in Specials!! "]);?>
					</p>
					<a href="/floorplans" class="waves-effect waves-light btn-large blue-grey darken-4 white-text"><i class="material-icons right">keyboard_arrow_right</i>Check Availability</a>
				</div>
			</div>

			<div class="section grey lighten-5">
				<div class="row container">
					<div class="col s12">
						<ul class="tabs grey lighten-5">
							<li class="tab col s6"><a class="active" href="#test1">Amenities</a></li>
                            <?php //TODO !launch !wtf what is #test2? ?>
							<li class="tab col s6"><a href="#test2">Neighborhood</a></li>
						</ul>
					</div>
					<div id="test1" class="col s12 tab-content">
						<ul class="collection">
							
							<li class="collection-item">Professional Management</li>
                            
							<li class="collection-item">Great Neighborhood</li>
                            
							<li class="collection-item">24 hr Emergency Maintenance Service</li>
                            
							<li class="collection-item">Flexible Lease Terms Available</li>
                            
							<li class="collection-item">24 hour Fitness Center</li>
                            
							<li class="collection-item">Spa</li>
                            
							<li class="collection-item">Underground Parking</li>
                            
							<li class="collection-item">Gated Community</li>
                            
							<li class="collection-item">Onsite Maintenance</li>
                            
						</ul>
					</div>
					<div id="test2" class="col s12 tab-content">
						   
						<div class="col s12 m4">
							<div class="card">
								<div class="card-image">
                                <?php //TODO !launch replace this with neighrbodhood code from bascom/dinapoli ;?>
									<img src="http://www.willowcoveapts.net/images/amc/04CIS/neighborhood1.jpg">
									<span class="card-title">Utah Hogle Zoo</span>
								</div>
								<div class="card-content eqheight">
									<p>Utah's Hogle Zoo dates from 1931 and is located at the mouth of Emigrations Canyon.  Its natural terrain covers 42 acres of tree-lined pathways where visitors can view over 800 animals.</p>
								</div>
							</div>
						</div>
						   
						<div class="col s12 m4">
							<div class="card">
								<div class="card-image">
									<img src="http://www.willowcoveapts.net/images/amc/04CIS/neighborhood2.jpg">
									<span class="card-title">University of Utah</span>
								</div>
								<div class="card-content eqheight">
									<p>Founded in 1850, The University of Utah is the flagship institution of higher learning in Utah, and offers over 100 undergraduate and more than 90 graduate degree programs to over 30,000 students.</p>
								</div>
							</div>
						</div>
						   
						<div class="col s12 m4">
							<div class="card">
								<div class="card-image">
									<img src="http://www.willowcoveapts.net/images/amc/04CIS/neighborhood3.jpg">
									<span class="card-title">Gateway Shopping Mall</span>
								</div>
								<div class="card-content eqheight">
									<p>Welcome to the Gateway. Salt Lake City's only open-air contemporary destination that delivers the ultimate in shopping, dining, entertainment and is located in the heart of downtown Salt Lake City.</p>
								</div>
							</div>
						</div>
						  
						
					</div>
				</div>
			</div>

			<div class="parallax-container">
				
				<div class="parallax"><img src="images/property2.jpg"></div>
				<div class="section center-align">
					<div class="row container">
						<h3 class="white-text"><?php echo $entity->getText('material-location-title',['oneshot' => 'Located in the heart of Downtown']);?></h3>
						<h2 class="white-text"><?php echo $entity->getFullAddress(['state'=>'abbrev']);?></h2>
                        <?php //TODO !launch make getdirections blade file ;?>
						<a href="/getdirections" class="waves-effect waves-light btn-large deep-orange darken-2 white-text"><i class="material-icons right">keyboard_arrow_right</i>Get Directions</a>
					</div>
				</div>
			</div>

			 <section>
                <div class="map-holder">
                    <iframe src="<?php echo $entity->getText('material-google-embed',['oneshot' => "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3021.564483039027!2d-111.90924430000001!3d40.771602699999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8752f454313fa3df%3A0x7f6ab1cbd34543d4!2s644+W+North+Temple%2C+Salt+Lake+City%2C+UT+84116!5e0!3m2!1sen!2sus!4v1410793864315"]);?>">
                </div>
            </section>

			<div class="section deep-orange darken-2 call-out">
				<div class="row container">
					<h2 class="white-text"><?php echo $entity->getText('material-callout',['oneshot' => "Where the Sky is The Limit!"]);?></h2>
					<p class="white-text text-darken-3 lighten-3">
						<?php echo $entity->getText('material-callout-body',['oneshot' => "SLC's premier urban living retreat! <br><br>Welcome to " . $entity->getLegacyProperty()->name . " Apartments. We have so much to offer and know that we will fit all of your needs. Located in Salt Lake City Utah, our 1, 2, & 3 bedroom apartments have it all: Gated community with a controlled access building, resident lounge, 24-hour fitness center, sun deck, year round spa, elevators and underground parking."]);?>
					</p>
					<a href="#tour_form" class="waves-effect waves-light btn-large blue-grey darken-4 white-text"><i class="material-icons right">keyboard_arrow_right</i>Schedule a  Tour</a>
				</div>
			</div>

		</div>
		<!-- End Content -->
        @stop

        @section('page-specific-js')
        <?php //TODO !launch Change these to compilde js ?>
		<script type="text/javascript" src="/temp/js/jquery-3.1.1.min.js"></script>
		<script src="/temp/js/materialize.min.js"></script>
		<script src="/temp/js/jquery.matchHeight-min.js"></script>
		<script type="text/javascript">
			$( document ).ready(function(){
				// Slider
				$('.carousel.carousel-slider').carousel({full_width: true});
				// Mobile Nav Slide Out Button
				$(".button-collapse").sideNav();
				$('select').material_select();
				// More Options Dropdown
				$('.modal').modal({
			      dismissible: false, // Modal can be dismissed by clicking outside of the modal
			      opacity: .5, // Opacity of modal background
			      in_duration: 200, // Transition in duration
			      out_duration: 200, // Transition out duration
			      starting_top: '0%', // Starting top style attribute
			      ending_top: '0%' // Ending top style attribute
			    });
			    $(document).ready(function(){
					$('.parallax').parallax();
				});
			    $('.datepicker').pickadate({
					selectMonths: true, // Creates a dropdown to control month
					selectYears: 15 // Creates a dropdown of 15 years to control year
				});

				$('input.autocomplete').autocomplete({
					data: {
					"1": null,
					"2": null,
					"3": null,
					"11": null,
					"22": null,
					"330": null,
					"215": null,
					"157": null,
					}
				});

				$(function() {
				$('.eqheight').matchHeight();
			});

			})
		</script>
		<!-- End Scripts -->
        @stop
