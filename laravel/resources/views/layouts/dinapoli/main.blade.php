<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
@section('meta')
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@show
        <!-- CSS -->
@section('css')
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
@show
 
    </head>
    <body class="appear-animate">
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->

        <!-- Page Wrap -->
        <div class="page" id="top">

            <!-- Nav -->
			@include('layouts/dinapoli/pages/inc/nav')
            <!-- End Nav-->

            <!-- Page Title Section -->
            <section class="page-section bg-dark-alfa-30" data-background="img/bg1.jpg">
                <div class="relative container align-left">

                    <div class="row">
						@yield('page-title-row')
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="#">Home</a>&nbsp;/&nbsp;<span>@yield('page-title-span')</span>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- End Page Title Section -->

        	@yield('content')

           	<!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-dark" data-background="img/slides/home-top-slide2a.jpg">
                <div class="container relative">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mt-70 mt-lg70 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content text-shadow">
                                    <h3 class="banner-heading font-alt">Join Our community</h3>
                                    <div class="banner-decription">
                                        Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor.
                                        Integer non dapibus diam, ac eleifend lectus.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-50 mt-lg50 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content text-right">
                                    <div class="local-scroll">
                                        <p><a href="floor-plans.asp" class="btn btn-mod btn-brown btn-large btn-round">SEE FLOOR PLANS</a></p>
                                        <p><a href="schedule-a-tour.asp" class="btn btn-mod  btn-large btn-round">SCHEDULE A TOUR</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End Call Action Section -->
            @section('contact')
            <section class="contact-padding page-section" id="contact">
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
                                            702.435.4305
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
                                            3000 High View Drive<br>Henderson, NV 89014
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
                                            Weekdays: 9:00 am - 6:00 pm<br>Weekends: 10:00 am - 5:00 pm
                                        </div>
                                    </div>
                                </div>
                                <!-- End Office Hours-->

                            </div>
                        </div>

                    </div>

                </div>
            </section>
            @show

            @section('footer')
            	<!-- Footer -->
                @include('layouts/dinapoli/pages/inc/footer')
            	<!-- End Footer -->
            @show

       @section('js')
        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/slippry.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/gmap3.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        <script type="text/javascript">
            $(function(){
                $("#banner-special").slideDown(500);
                $("#banner-special-close").click(function(e) {
                    e.preventDefault();
                    $("#banner-special").slideUp();
                });
            });
        </script>
		@yield('page-specific-js')
        @show
    </body>
</html>
