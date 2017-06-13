<?php use App\Util\Util;
use App\Legacy\Property;
use App\Property\Template as PropertyTemplate;

?>
@extends('layouts/bascom/main')
            @section('before-css')
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
            @stop
            @section('extra-css')
            <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css"/>
            <link rel="stylesheet" href="/css/neon-forms.css"/>
            @stop

            @section('after-nav')
    <!-- Page Title Section -->
    <section class="page-section page-title bg-dark-alfa-30" data-background="<?php echo $entity->getWebPublicDirectory('');?>/page-title-bg3.jpg">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><?php echo $entity->getText('schedule-a-tour-title',['oneshot' => 'Schedule a tour']);?></h1>
                    <div class="hs-line-4 font-alt">
						<?php echo $entity->getText('schedule-a-tour-description', ['oneshot' => 'Schedule a tour']);?>
                    </div>
                </div>

                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="/">Home</a>&nbsp;/&nbsp;<span>Schedule a tour</span>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Page Title Section -->
    @stop

            @section('content')
            <script src="https://www.google.com/recaptcha/api.js"></script>
             <!-- Schedule Form Section -->
            <section class="page-section pb-0" id="contact-form">
                <div class="container relative">
                    <?php if (isset($sent)): ?><h1 class='notice'>Your email has been submitted</h1><?php endif;?>
                    <?php if (isset($errors)) {
    foreach ($errors->all() as $message) {
        echo "<div class='error'>$message</div>";
    }
}
                    ?>
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">

                            <div class="col-md-7 col-sm-7 mb-sm-50 mb-xs-30">
                                @if(isset($_GET['submitted']))

                                <div class="col-md-7 col-sm-7 mb-sm-50 mb-xs-30">
                                    <h1 class=" notice">
                                        We have received your Schedule Request.
                                    </h1>
                                    <div>
                                        Your message has been sent. We will be contacting you shortly.

                                        For questions, give us a call:
                                        <?=Property::getPhoneByEntity($entity);?>


                                    </div>

                                </div>
                                @else
                                <form role="form" id="form1" name="form1" method="post" class="validate" action="/schedule">
                                    <?php //TODO: Find a form helper for laravel that will do this for us?>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" id="firstname" data-validate="required" data-message-required="First name is a required field" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" id="last_name" data-validate="required" data-message-required="Last name is a required field" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" data-validate="required" data-message-required="Email is a required field" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <label>Phone</label>
                                        <input type="tel" name="phone" id="phone" data-validate="required" data-message-required="Phone number is a required field" data-mask="phone" class="input-md form-control" maxlength="100">
                                    </div>
                                    <label>Approximate Move-in Date</label>
									<div class="mb-20 mb-md-10 input-group date" data-provide="datepicker" id="moveindatediv" style="margin-bottom: 0px;">
                                        <input type="text" class="form-control" id="moveindate" name="moveindate" readonly="true" placeholder="Approximate Move-In Date" autocomplete="off" onchange='$("#moveindateErrorDiv").css("margin-bottom","20px");$("#moveindate\-error").remove();$(this).removeClass("error");'/>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                    <div id='moveindateErrorDiv'>
                                        <label id="moveindate-error" class="error" for="moveindate" style='margin-bottom: 20px;'></label>
                                    </div>
									<div class="form-group">
                                    	<label for="visitdate">When would you like to visit us?</label>
										<div class="date-and-time">
											<input type="text" class="form-control datepicker" id='datepicker' name='visitdate' data-format="D, dd MM yyyy" placeholder="Select a date">
											<input type="text" class="form-control timepicker" id='timepicker' name='visittime' data-template="dropdown" data-default-time="10:00 AM"  data-show-seconds="false" data-show-meridian="true" data-minute-step="30" data-second-step="0" />
										</div>
									</div>
                                    <label id="datepicker-error" class="error" for="datepicker" style='margin-bottom: 20px;'></label>
                                    <label id="timepicker-error" class="error" for="timepicker" style='margin-bottom: 20px;'></label>
                                    {{csrf_field()}}
                                    <?php if (Util::isDev() == false): ?>
                                    <div class="mb-20 mb-md-10 form-group">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $entity->getRecaptchaKey();?>"></div>
                                    </div>
                                    <input type='hidden' id='hiddenRecaptcha' name='hiddenRecaptcha' class='hiddenRecaptcha required'/>
                                    <?php endif; ?>
                                    <div class="mb-20 mb-md-10">
                                        <button type="submit" style='margin-top: 5px;' class="btn btn-mod btn-brown btn-large btn-round submit-btn">Submit</button>
                                    </div>
                                </form>
                                @endif
                            </div>

                            <div class="col-md-5 col-sm-5 mb-sm-50 mb-xs-30 text-center">
                                <div class="row">
                                	<div class="col-sm-12">
                                		<!-- Google Map -->
                                            <div class="map-block">
                                                <div class="map">
                                                    <div class="map-container">
                                                        <?=PropertyTemplate::getGmapKey();?>
                                                        <div style="height:537px;overflow:hidden;max-width:100%;">
                                                            <div id="map-canvas" style="max-width:100%;"></div>
                                                        <div>
                                                    @include('layouts/bascom/pages/inc/google-maps-script')
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
		<script type="text/javascript">
		$(document).ready(function() {
            <?php
                /* TODO: Add custom messages for each field
                 * TODO: Create validation that doesn't let the user enter a time before or after the valid hours of the office
                 * TODO: Create a "slot" or something that we can utilize so that we don't have to duplicate this form code everywhere
                 */
            ?>
            $("#timepicker").timepicker({});
            $("#datepicker").datepicker({format: 'mm/dd/yyyy'});
            $("#moveindatediv").datepicker({format: 'mm/dd/yyyy'});
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
                    'moveindate': {
                        required: true,
                        'date': true
                    },
                    'visitdate': {
                        required: true,
                        'date': true
                    }
                    <?php if (Util::isDev() == false): ?>
                    ,hiddenRecaptcha: {
                        required: function(){
                            return grecaptcha.getResponse() == "";
                        }
                    }
                    <?php endif; ?>
                },
                'messages': {
                    visitdate: {
                        required: 'Please enter a valid visit date'
                    },
                    visittime: {
                        required: 'Please enter a valid visit time'
                    }
                }
            });
            amcMaskPhone('#phone','(999) 999-9999');
		});	//End document.ready

	</script>
		@stop
