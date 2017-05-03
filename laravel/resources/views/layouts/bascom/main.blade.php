<?php
use App\Util\Util;
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <title><?php echo $entity->getCity();?> <?php echo $entity->getAbbreviatedState();?> Apartments | Luxury Apartments For Rent | <?php echo $entity->getLegacyProperty()->name;?>></title>
@section('meta')
        <meta name="description" content="<?php echo $entity->getMeta('description',$_SERVER['REQUEST_URI']);?>">
        <meta name="keywords" content="<?php echo $entity->getMeta('keywords',$_SERVER['REQUEST_URI']);?>">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@show
        <!-- CSS -->
@section('css')
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <?php $customSheet = null; ?>
        <?php foreach(glob(public_path() . "/bascom/css/*.css") as $i => $sheet){
                if(preg_match("|bascom/css/([0-9A-Z]{6,}\.css)|",$sheet,$matches)){
                    $customSheet = "/bascom/css/{$matches[1]}";
                }
                if(preg_match("|/bascom/css/([^\.]*)\.css|",$sheet,$matches) && !strstr($sheet,$site->getEntity()->getLegacyProperty()->code)){
                    echo "<link rel='stylesheet' href='/bascom/css/{$matches[1]}.css?v={$entity->getAssetsVersion('bascom/css/' . $matches[1] . '.css')}'/>";
                }
        }
        if($customSheet){
            echo "<link rel='stylesheet' href='{$customSheet}?v={$entity->getAssetsVersion('$customSheet')}'/>";
        }
        ?>

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
      <!-- Page Wrap -->
                 <div class="page" id="top">
          

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
        @include('layouts/bascom/pages/inc/nav')
        @yield('content')
            @yield('schedule-a-tour')
            @section('footer')
            	<!-- Footer -->
                @include('layouts/bascom/pages/inc/footer')
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
