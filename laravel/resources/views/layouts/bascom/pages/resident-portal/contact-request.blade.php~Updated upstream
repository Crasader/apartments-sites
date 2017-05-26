        <?php
            $residentName = "john doe"; //TODO  !launch
            $residentEmail = "foo@gmail.com"; //TODO !launch
            ?>
        @extends($extends)
        @section('content')
		<!-- Content -->
		<section class="content">
			<!-- Content Blocks -->
			<div class="container">
<<<<<<< Updated upstream:laravel/resources/views/layouts/resident-portal/pages/contact-request.blade.php
				<div class="row">
					<div class="col-md-12">
						<div class="page-title">
							<h1>Contact us</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>Contact the property and we will get your concern taken care of as quickly as possible.</p>
                        <?php if (isset($sent)): ?><h1>Your information was received</h1><?php endif;?>
						<div class="schedule-a-tour-form form-container">
							<form class="form-horizontal" action="resident-contact-mailer" name="form1" method="post">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" id="ResidentName" value="">
									<span class="required">*</span>
								</div>
							
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email" id="email" value="">
									<span class="required">*</span>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" class="form-control" name="phone" id="phone">
								</div>
								<div class="form-group">
									<label>Memo</label><br>
									<textarea name="memo" id="memo"></textarea>
								</div>
                                {{csrf_field()}}
								<input type="submit" value="Submit" class="btn submit-btn">
							</form>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-2">
						<div class="contact-right-container">
							<div class="map">
								<div class="embed-responsive embed-responsive-4by3">
                                    <?php //TODO: replace this?>
									<?php //<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3274.454756233728!2d-82.4098738844121!3d34.84479908039779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8858303520e7b549%3A0xd5cd3705dfa142fd!2s400+Rhett+St%2C+Greenville%2C+SC+29601!5e0!3m2!1sen!2sus!4v1465319930295" class="embed-responsive-item" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    ?>
								</div>
							</div>
							<div class="location">
								<b><?php echo $entity->getCity(). ", " . $entity->getState();?></b>
								<p>
                                <?php echo $entity->getFullAddress(['city' => 'break','state'=>'abbrev']); ?><br>
                                <?php echo $entity->getPhone(); ?>
								</p>
							</div>
							<div class="hours">
								<b>Office Hours</b>
								<p>
                                <?php echo $entity->getHours(); ?>
								</p>
							</div>
                            <?php /*
                            <div class="social-icons">
                                <ul>
                                    <li><a href="<?php echo $entity->getSocialMedia('fb');?>" target="_blank"><i class="fa fa-facebook social-icon" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $entity->getSocialMedia('twitter');?>" target="_blank"><i class="fa fa-twitter social-icon" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $entity->getSocialMedia('insta');?>" target="_blank"><i class="fa fa-instagram social-icon" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo $entity->getSocialMedia('google');?>" target="_blank"><i class="fa fa-google-plus social-icon" aria-hidden="true"></i></a></li>
                                </ul>
=======
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row mt-50">
                            <?php if (isset($sent)): ?><h1 class="notice">Your contact information has been submitted</h1>
                            <?php elseif (isset($invalidRecaptcha)): ?><h1 class="error">Invalid ReCaptcha</h1>
                            <?php else: ?>
                                <div class="col-md-12">
                                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Contact Us</h1>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            Contact the property and we will get your concern taken care of as quickly as possible.
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-7 col-sm-7 mb-sm-50 mb-xs-30">
                                <form id="form1" method="post" action="/resident-portal/resident-contact-mailer">
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="ResidentName"
                                        data-msg-required="Please Enter your Name"
                                        class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="input-md form-control"
                                        data-msg-required="Please Enter Your Email"
                                        maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" id="phone" class="input-md form-control"
                                        data-msg-required="Please Enter The Best Phone Number to Reach You"
                                         maxlength="100">
                                    </div>
                                    <label for="date">Memo</label>
                                    <textarea name="memo" id="memo" class="form-control"
                                        data-msg-required="Please Enter A Brief Description Of The Issue"
                                        cols="70" rows="10"></textarea>
                                    <div style='margin-bottom:0px;' id='dateErrorDiv'>
                                         <label id="date-error" class="error" for="date" style='margin-bottom:20px;'></label>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="mb-20 mb-md-10 form-group">
                                        <div class="g-recaptcha" id='grecaptcha' data-sitekey="<?php echo $entity->getRecaptchaKey();?>"></div>
                                    </div>

                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    <div class="mb-20 mb-md-10">
                                        <button class="btn btn-mod btn-brown btn-large btn-round" onclick="if($('#datediv').val().length){console.log(1);$('#datediv').css('margin-bottom','40px');}">Submit</button>
                                    </div>
                                </form>
>>>>>>> Stashed changes:laravel/resources/views/layouts/bascom/pages/resident-portal/contact-request.blade.php
                            </div>
                            */?>
						</div>
					</div>
				</div>
			</div>
		</section>
        @stop
        
        @section('page-specific-js')
		<script type='text/javascript'>
        $(document).ready(function() {
            $(".nav-main-right a").on("click", function(){
               $(".nav-main-right").find(".active").removeClass("active");
               $(this).parent().addClass("active");
            });
        });
        </script>
        @stop
