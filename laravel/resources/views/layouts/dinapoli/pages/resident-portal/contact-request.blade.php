        <?php
            use App\Property\Template as PropertyTemplate;

$residentName = "john doe"; //TODO  !launch
            $residentEmail = "foo@gmail.com"; //TODO !launch
            ?>
        @extends($extends)

        @section('content')

		<!-- Content -->
		<section class="content">
			<!-- Content Blocks -->
			<div class="container">
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
                            </div>

                            <div class="col-md-5 col-sm-5 mb-sm-50 mb-xs-30 text-center">
                                <div class="row">
                                	<div class="col-sm-12">
                                		<!-- Google Map -->
                                            <div class="map-block">
                                                <div class="map">
                                                    <div class="map-container">
                                                        <?=PropertyTemplate::getGmapKey();?>
                                                        <div style="overflow:hidden;height:537px;max-width:100%;">
                                                            <div id="map-canvas" style="max-width:100%;"></div>
                                                        <div>
                                                        @include('layouts/dinapoli/pages/inc/google-maps-script')
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