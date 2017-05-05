        <!-- Header -->
                <header>
            <!-- Filter Modal -->
            <div id="tour_form" class="modal">
                <div class="modal-content">
                    <form method="post" action="/schedule-a-tour">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col s2 m1 left-align">
                            <h5><i class="material-icons modal-close">arrow_back</i></h5>
                        </div>
                        <div class="col s8 m10 center-align">
                            <h5>Schedule a Tour</h5>
                        </div>
                        <div class="col s2 m1 right-align">
                            <h5><i class="material-icons modal-close">close</i></h5>
                        </div>
                    </div>
                    <form>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="first_name" type="text">
                            <label for="first_name" class="">First Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="last_name" type="text">
                            <label for="last_name" class="">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="text">
                            <label for="email" class="">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="phone" type="text">
                            <label for="phone" class="">Phone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="date" class="datepicker" placeholder="Please select a date">
                            <label class="active">Approximate Move-in Date</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <a href="/#!" class="btn-block btn-large modal-action modal-close waves-effect waves-light deep-orange darken-2 white-text center-align">Submit</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- End Filter Modal -->
			<!-- Top Nav -->

			<div class="top-nav blue-grey darken-4 white-text">

				<div class="row">

					<div class="col s12">

						<ul class="top-nav-left">

							<li><i class="material-icons">phone</i> <b>Call Today</b>&nbsp;:&nbsp;(801) 869-8200 </li>

							<li><i class="material-icons">location_on</i> <a href="/https://goo.gl/maps/dEyTw" target="_blank"><span class="hide-on-small-only"><b>Location&nbsp;:&nbsp;</b></span>644 West North Temple Salt Lake City, UT 84116</a></li>

							<li><i class="material-icons">directions_car</i> <a href="/getdirections">Map It</a></li>

						</ul>

					</div>

				</div>

			</div> 

			<!-- End Top Nav -->

			<!-- Nav Residents Dropdown -->

			<!-- Dropdown Structure -->

			<ul id="dropdown1" class="dropdown-content">

				<li><a href="/resident-portal">Pay Online</a></li>

				<li class="divider"></li>

				<li><a href="/resident-portal">Apply Online</a></li>

				<li class="divider"></li>

				<li><a href="/resident-portal">Maintenance Request</a></li>

				<li class="divider"></li>

				<li><a href="/resident-portal">Suggestion Box</a></li>

				<li class="divider"></li>

				<li><a href="/resident-portal">Reviews</a></li>

				<li class="divider"></li>

				<li><a href="/resident-portal">Pet Policies</a></li>

			</ul>

			<!-- End Nav Residents Dropdown -->

			<!-- Nav -->

			<nav>

				<div class="nav-wrapper white black-text">

					<a href="/" class="brand-logo"><img src="<?php echo $entity->getWebPublicDirectory('logo');?>/logo.png" class="responsive-img"></a>

					<a href="#" data-activates="mobile-demo" class="mobile-toggle button-collapse"><i class="material-icons">menu</i></a>

					<ul class="right hide-on-med-and-down">

						<li><a href="/" id="homeNavLink">Home</a></li>

						<li><a href="/gallery" id="galleryNavLink">Gallery</a></li>

						<li><a href="/amenities" id="amenitiesNavLink">Amenities</a></li>

						<li><a href="/floorplans" id="floorplansNavLink">Floor Plans</a></li>

						<li><a href="/neighborhood" id="neighborhoodNavLink">Neighborhood</a></li>

						<li><a href="/contact" id="contactNavLink">Contact</a></li>

						<li><a href="#tour_form" id="scheduleNavLink">Schedule a Tour</a></li>

						<!-- Dropdown Trigger -->

      					<li><a class="dropdown-button" href="#!" data-activates="dropdown1" id="residentsNavLink">Residents<i class="material-icons right">arrow_drop_down</i></a></li>

      					<li><a href="/apply-online" id="applyNavLink">Apply online</a></li>

					</ul>

					<ul class="side-nav" id="mobile-demo">

						<li><a href="/" id="homeMobileNavLink">Home</a></li>

						<li><a href="/gallery" id="galleryMObileNavLink">Gallery</a></li>

						<li><a href="/amenities" id="amenitiesMobileNavLink">Amenities</a></li>

						<li><a href="/floorplans" id="floorplansMobileNavLink">Floor Plans</a></li>

						<li><a href="/neighborhood" id="neighborhoodMobileNavLink">Neighborhood</a></li>

						<li><a href="/contact" id="contactMobileNavLink">Contact</a></li>

						<li><a href="#tour_form" id="scheduleMobileNavLink">Schedule a Tour</a></li>

						<li class="no-padding">

							<ul class="collapsible collapsible-accordion">

								<li>

									<a class="collapsible-header" id="residentsMobileNavLink">Residents</a>

									<div class="collapsible-body">

										<ul>

											<li><a href="/resident-portal">Resident Pay Online</a></li>

											<li><a href="/resident-portal">Resident Apply Online</a></li>

											<li><a href="/resident-portal">Resident Maintenance Request</a></li>

											<li><a href="/resident-portal">Resident Suggestion Box</a></li>

											<li><a href="/resident-portal">Resident Reviews</a></li>

											<li><a href="/resident-portal">Pet Policies</a></li>

										</ul>

									</div>

								</li>

							</ul>

						</li>

						<li><a href="/apply-online" id="applyMobileNavLink">Apply online</a></li>

					</ul>

				</div>

			</nav>

			<!-- End Nav -->

		</header>

