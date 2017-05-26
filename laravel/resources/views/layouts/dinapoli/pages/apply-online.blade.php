<?php use App\Util\Util;
use App\Util\UrlHelpers;

?>
@extends('layouts/dinapoli/main')
            @section('extra-css')
                <!-- Latest compiled and minified CSS -->
                <link id="bsdp-css" href="css/bootstrap-datepicker3.min.css" rel="stylesheet">
            @stop
                       @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Apply Online</h1>
                            <div class="hs-line-4 font-alt">
                                Begin the application process
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','apply online')
                        @section('recaptcha-js')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        @stop
            @section('content')
            <!-- Contact Form Section -->
            <section class="page-section pb-0" id="contact-form">
                <div class="container relative">
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            <?php foreach ($errors->all() as $i => $errorMessage): ?>
                                <h1 class='error'><?php echo $errorMessage;?></h1>
                            <?php endforeach; ?>
                            <?php if (isset($sent) || isset($redirectConfig['redirect'])): ?>
                                <div class="col-md-12 col-sm-12">
                            <?php endif; ?>
                            <?php if (isset($sent)): ?><h1 class="notice">Your information has been submitted successfully</h1><?php endif; ?>
                            <?php if (isset($redirectConfig['redirect'])): ?>
                                <b>We will be redirecting you in <span id='seconds'>&nbsp;</span> seconds...</b><br>
                                <p>If you are not redirected, you can <a id='redirect-link' href='<?php echo $redirectConfig['url'];?>' target='_blank' onclick='redirect();'>click here</a></p>
                                </div>
                            <?php else:?>
                            <?php if (isset($invalidRecaptcha)): ?><h1 class="error">Invalid ReCaptcha</h1><?php endif; ?>
                            <div class="col-md-12 col-sm-12 mb-sm-50 mb-xs-30">
                                <form id="form1" method="post" action="/apply-online?submitted=1&from=Apply-Online&b=<?php echo base64_encode(json_encode($_GET));?>">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-20 mb-md-10">
                                            <label>First Name</label>
                                            <input type="text" name="fname" id="first_name" class="input-md form-control" maxlength="64">
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-md-10 form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" id="last_name" class="input-md form-control" maxlength="64">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-20 mb-md-10">
                                            <label>Email</label>
                                            <input type="text" name="email" id="email" class="input-md form-control" maxlength="100">
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-md-10 form-group">
                                            <label>Phone</label>
                                            <input type="text" name="phone" id="phone" class="input-md form-control" maxlength="14">
                                        </div>
                                    </div>
                                    <div style='margin-bottom:0px;' id='dateErrorDiv'>
                                         <label id="date-error" class="error" for="date" style='margin-bottom:20px;'></label>
                                    </div>
                                    {{csrf_field()}}
                                    <?php if (!Util::isDev()): ?>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <div class="g-recaptcha" id='grecaptcha' data-sitekey="<?php echo $entity->getRecaptchaKey();?>"></div>
                                    </div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    <?php endif; ?>
                                    <div class="mb-20 mb-md-10">
                                        <button class="btn btn-mod btn-brown btn-large btn-round" onclick="btnsubmit();">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </section>
            @stop
            @section('schedule-a-tour','')
            @section('action','')
            @section('page-specific-js')
            <script type="text/javascript">
            $(document).ready(function(){
                <?php if (isset($redirectConfig['redirect'])): ?>
                var countdown = 10;
                window.redirectConfig = <?php echo json_encode($redirectConfig);?>;
                window.updateSeconds = function(){
                    if(countdown == -1){
                        location.href = redirectConfig.url;
                        return;
                    }
                    $("#seconds").html("<b>" + countdown-- + "</b>");
                    window.setTimeout(updateSeconds,1000);
                }
                window.redirect = function(){
                    location.href = redirectConfig.url;
                }
                <?php else: ?>
                window.btnsubmit = function(){ if($('#datediv').val().length){console.log(1);$('#datediv').css('margin-bottom','40px');}};
				amcBindValidate({
					'form': '#form1',
                    'ignore': '.ignore',
					'rules': {
						fname: "required",
						lname: "required",
						email: {
							required: true,
							minlength: 5,
							email: true
						},
						phone: "required"
                        <?php if (!Util::isDev()): ?>,
						hiddenRecaptcha: {
							required: function () {
								if (grecaptcha.getResponse() == '') {
									return true;
								} else {
									return false;
								}
							}
						}
                        <?php endif; ?>
					} /* End RULES */
           		});
            	amcMaskPhone('#phone','(999) 999-9999');
                <?php endif; ?>
        	});
            </script>
            @stop
