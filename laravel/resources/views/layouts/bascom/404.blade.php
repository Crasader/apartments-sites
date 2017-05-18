<?php
use App\Util\Util;

?>
<!DOCTYPE html>
<html lang="">
    <head>
        <title><?php echo $entity->getCity();?> <?php echo $entity->getAbbreviatedState();?> Apartments | Luxury Apartments For Rent | <?php echo $entity->getLegacyProperty()->name;?>></title>
@section('meta')
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@show
        <!-- CSS -->
@section('css')
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <?php foreach (['main','animate.min','owl.carousel','magnific-popup'] as $i => $sheet) {
    if (file_exists(public_path() . "/{$fsid}/css/{$sheet}.css")) {
        echo "<link rel='stylesheet' href='/" . $fsid . "/css/{$sheet}.css?v={$entity->getAssetsVersion($fsid . '/css/' . $sheet . '.css')}'>";
    }
}?>
        <?php $extraSheets = $entity->getCustomStyleSheets($page);
            foreach ($extraSheets as $i => $sheet): ?>
            <link rel="stylesheet" href="<?php echo $sheet;?>">
       <?php endforeach; ?>
@show
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="appear-animate">
      <!-- Page Wrap -->
                 <div class="page" id="top">
        <!-- End Page Loader -->
        @include('layouts/bascom/pages/inc/nav')
            <div class="row text-center">
                <?php if (isset($errorGeneric)): ?>
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">An unexpected error occurred</h1>
                <?php else: ?>
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Page not found</h1>
                <?php endif; ?>
            </div>
            @section('footer')
            	<!-- Footer -->
                @include('layouts/bascom/pages/inc/footer')
            	<!-- End Footer -->
            @show
            @yield('epop')

    </div><!-- end page wrap -->

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
