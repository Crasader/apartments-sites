<?php
use App\Property\Template as PropertyTemplate;

?>
@extends('layouts/dinapoli/main')
            @section('extra-css')
                <!-- Latest compiled and minified CSS -->
                <link id="bsdp-css" href="css/bootstrap-datepicker3.min.css" rel="stylesheet">
            @stop
                       @section('page-title-row') 
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Contact Us</h1>
                            <div class="hs-line-4 font-alt">
                                Have a question? Reach out to our helpful staff 24/7.
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','CONTACT')
                        @section('recaptcha-js')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        @stop
            @section('content')        
            <!-- Contact Form Section -->
            <section class="page-section pb-0" id="contact-form">
                <div class="container relative">
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            <?php if (isset($sent)): ?><h1 class="notice">Your contact information has been submitted</h1><?php endif;?>
                            <?php if (isset($invalidRecaptcha)): ?><h1 class="error">Invalid ReCaptcha</h1><?php endif; ?>
                            <div class="col-md-7 col-sm-7 mb-sm-50 mb-xs-30">
                                <form id="form1" method="post" action="/contact">
                                    <input type="hidden" name="form_id" value="contact"/>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" id="first_name" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" id="last_name" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" id="phone" class="input-md form-control" maxlength="100">
                                    </div>
                                    <label for="date">Approximate Move-In Date</label>
                                    <div class="mb-20 mb-md-10 input-group date" data-provide="datepicker" id="datediv" style='margin-bottom: 0px;'>
                                        <input type="text" class="form-control" id="date" name="date" value="" readonly="true" placeholder="Approximate Move-In Date" autocomplete="off" onchange='$("#dateErrorDiv").css("margin-bottom","40px");$("#date\-error").css("display","none");$(this).removeClass("error");'/>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
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
                    
                </div>
            </section>
            @stop
            <!-- End About Section -->
            @section('schedule-a-tour','')
            @section('action','')
            @section('page-specific-js')
            <script type="text/javascript">
            $(document).ready(function(){
			    $("#datediv").datepicker({ format: "mm/dd/yyyy" });	
				amcBindValidate({
					'form': '#form1',
                    'ignore': '.ignore',
					'rules': {
						firstname: "required",
						lastname: "required",
						email: {
							required: true,
							minlength: 5,
							email: true
						},
						phone: "required",
						'date': {
							required: true,
							'date': true
						},
						hiddenRecaptcha: {
							required: function () {
								if (grecaptcha.getResponse() == '') {
									return true;
								} else {
									return false;
								}
							}
						}
					} /* End RULES */
           		});
            	amcMaskPhone('#phone','(999) 999-9999');
        	}); //End document.ready
            </script>
            @stop
