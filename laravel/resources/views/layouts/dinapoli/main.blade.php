<?php
use App\Util\Util;
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <title><?php echo $entity->getCity();?> <?php echo $entity->getAbbreviatedState();?> Apartments | Luxury Apartments For Rent | <?php echo $entity->getLegacyProperty()->name;?>></title>
@section('meta')
        <meta name="description" content="<?php echo $entity->getMeta('description',$page);?>">
        <meta name="keywords" content="<?php echo $entity->getMeta('keywords',$page);?>">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@show
        <!-- CSS -->
@section('css')
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <?php foreach(['main','custom','animate.min','owl.carousel','magnific-popup'] as $i => $sheet){
            echo "<link rel='stylesheet' href='/" . $fsid . "/css/{$sheet}.css?v={$entity->getAssetsVersion($fsid . '/css/' . $sheet . '.css')}'>";
        }?>
        <?php $extraSheets = $entity->getCustomStyleSheets($page);
            foreach($extraSheets as $i => $sheet): ?>
            <link rel="stylesheet" href="<?php echo $sheet;?>">
       <?php endforeach; ?>
@show
        <style type='text/css'>
            .exitpop-inner {
                background: url(<?php echo $entity->getWebPublicDirectory('popup');?>/popup.jpg);
            }
        </style>
        <?php echo $entity->getGoogleAnalytics(); ?>
        @yield('extra-css')
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		@yield('recaptcha-js')
    </head>
    <body class="appear-animate">
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="mmbutton" data-target="#myModal" style='display:none;'>Open Modal</button>

<?php //TODO: make this a slot or include it from a file ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit that content</h4>
        <div id='editMeStatus'>&nbsp;</div>
      </div>
      <div class="modal-body">
		<textarea id="editMe" cols=50 rows=15></textarea>
		<button type="button" class="btn btn-default" onclick="submitEditTag()">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="logoutEditTag()">Logout</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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

            @section('title-section')
            <!-- Page Title Section -->
            <?php if(Util::isPage('unit')): ?>
            <section class="page-section bg-dark-alfa-30" data-background="<?php echo $entity->getWebPublicDirectory('img');?>/bgunit.jpg">
            <?php else: ?>
            <section class="page-section bg-dark-alfa-30" data-background="<?php echo $entity->getWebPublicDirectory('img');?>/bg1.jpg">
            <?php endif; ?>
                <div class="relative container align-left">
                    <div class="row">
						@yield('page-title-row')
                        @section('home-title')
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="#">Home</a>&nbsp;/&nbsp;<span>@yield('page-title-span')</span>@yield('page-title-span-suffix')
                            </div>
                        </div>
                        @show
                    </div>
                </div>
            </section>
            @show
            <!-- End Page Title Section -->
        	@yield('content')
            @yield('action')
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
                                            <?php echo strtoupper($entity->getStreet() . "<br>" . $entity->getCity() . ", " .
                                                $entity->getState() . " " . $entity->getZipCode()); 
                                            ?>
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
                                            <?php echo $entity->getHours() ?>
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
            @yield('schedule-a-tour')
            @section('footer')
            	<!-- Footer -->
                @include('layouts/dinapoli/pages/inc/footer')
            	<!-- End Footer -->
            @show
            @yield('epop')

       @section('js')
        <!-- JS -->
        @yield('google-maps-js')
        <script type="text/javascript" src="/js/build/marketapts.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
		@yield('page-specific-js')
        @show
    </body>
</html>
