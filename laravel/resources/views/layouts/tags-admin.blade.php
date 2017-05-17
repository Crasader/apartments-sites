<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/custom.css">
        <style type='text/css'>
        .border{
            /* border: 1px solid red; */
            }
        </style>
    </head>
    <body>
			<section class="contact-padding page-section" id="contact">
                <div class="container text-center">
                    <div class="row col-md-offset-4">
                    <?php if(isset($error)): ?><div class='error col-md-6 text-center border'>Invalid username or password</div><?php endif; ?>
                    </div>
                    <div class="row col-md-offset-4 col-md-4 border">
                        <form method="post">
                        <div class="col-md-12">
                            <div class="row border">
                                <!-- Address -->
                                <div class="col-md-2 col-sm-12 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Username
                                        </div>
                                        <div class="ci-text">
                                            <input type='text' name='user'>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address -->
                                
                            </div>
                            <div class="row border">
                                <!-- Office Hours -->
                                <div class="col-md-2 col-sm-12 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Password
                                        </div>
                                        <div class="ci-text">
                                            <input type='password' name='password'>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Office Hours-->
                               {{csrf_field()}} 
                            </div>
                        </div>
                    </div>
                    <div class="row">	
                        <div class="col-md-2 col-sm-12 col-lg-12 pt-20 pb-20 pb-xs-20">
                            <div class="ci-text">
                                <input type='submit' name='submit' value='Login'>
                            </div>
                        </div>
                    </div>
                    </form>
            	</div>        
            </section>
            
            
            
            <!-- Footer -->
            <!--#include virtual="/inc/footer.asp" -->
            <!-- End Footer -->
        
        
        </div>
        <!-- End Page Wrap -->
        
        
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
    </body>
</html>
