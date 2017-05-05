<?php
use App\Util\Util;
use App\Assets\Css;
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" >
@section('meta')
        <meta name="description" content="<?php echo $entity->getMeta('description',$_SERVER['REQUEST_URI']);?>">
        <meta name="keywords" content="<?php echo $entity->getMeta('keywords',$_SERVER['REQUEST_URI']);?>">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@show

        <title><?php echo $entity->getLegacyProperty()->name;?></title>
        <link rel="shortcut icon" href="http://www.willowcoveapts.net/images/amc/04CIS/favicon.ico" />

@section('css')
        <!-- CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <?php foreach(Css::fetch() as $index => $value) echo $value; ?>
        <!-- End CSS -->
@show
        <link rel='canonical' href='<?php echo $entity->getLegacyProperty()->url;?>' />
        <link rel='prerender' href='<?php echo $entity->getLegacyProperty()->url;?>' />
    </head>
        <style type='text/css'>
            .exitpop-inner {
                background: url(<?php echo $entity->getWebPublicDirectory('');?>/popup.jpg);
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

    <body id='homepage'>
	@include('layouts/material/pages/inc/header')
<?php //TODO: !organization !redundancy Remove this and put it in a slot/include file. <3 loves you ?>
<?php if(\App\System\Session::isCmsUser()): ?>          
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="mmbutton" data-target="#myModal" style='display:none;'>Open Modal</button>
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
<?php endif; ?>
		<!-- start content -->
		<div class='content'>
       	@yield('content')
		</div><!-- end content -->
        @section('js')
        <!-- JS -->
        //@yield('google-maps-js')
        <script type="text/javascript" src="/js/build/marketapts.min.js?v=<?php echo uniqid() . time();?>"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
		@yield('page-specific-js')
        @show
        @section('footer')
            @include('layouts/material/pages/inc/footer')
        @show
    </body>
</html>
