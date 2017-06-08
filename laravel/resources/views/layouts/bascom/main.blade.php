<?php
use App\Util\Util;
use Jenssegers\Agent\Agent;
$agent = new Agent();
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <title><?php echo $entity->getCity();?> <?php echo $entity->getAbbreviatedState();?> Apartments | Luxury Apartments For Rent | <?php echo $entity->getLegacyProperty()->name;?>></title>
        <script>
        window._template = 2;
        window.isMobile = function(){
            var mobile = "<?=($agent->isMobile() ? 1 : '');?>";
            if (mobile == 1){
                return true;
            }
            return false;
        }
        </script>
@section('meta')
        <meta name="description" content="<?php echo $entity->getMeta('description', $_SERVER['REQUEST_URI']);?>">
        <meta name="keywords" content="<?php echo $entity->getMeta('keywords', $_SERVER['REQUEST_URI']);?>">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
@show
@section('before-css')
@show
        <!-- CSS -->
@section('css')
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <?php $customSheet = null; ?>
        <?php //TODO: !refactor move this to a library function so we can utilize this code in every template?>
        <?php
        foreach (glob(public_path() . "/bascom/css/*.css") as $i => $sheet) {
            // if (preg_match("|bascom/css/([0-9A-Z]{6,}\.css)|", $sheet, $matches)) {
            //     if (strcmp($matches[1], $site->getEntity()->getLegacyProperty()->code . ".css") == 0) {
            //         $customSheet = "/bascom/css/{$matches[1]}";
            //     }
            //     continue;
            // }
            if (preg_match("|/bascom/css/([^\.]*)\.css|", $sheet, $matches)
                    &&
                    !strstr($sheet, $site->getEntity()->getLegacyProperty()->code)) {
                echo "<link rel='stylesheet' href='/bascom/css/{$matches[1]}.css?v={$entity->getAssetsVersion('bascom/css/' . $matches[1] . '.css')}'/>\n\t";
            }
        }
        if ($customSheet) {
            // echo "<link rel='stylesheet' href='{$customSheet}?v={$entity->getAssetsVersion('$customSheet')}'/>";
        }
        ?>
        <?php
        $extraSheets = $entity->getCustomStyleSheets($page);
            foreach ($extraSheets as $i => $sheet): ?>
            <link rel="stylesheet" href="<?php echo $sheet . "?v={$entity->getAssetsVersion($sheet)}"; ?>">
       <?php
   endforeach; ?>

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
    <body class="appear-animate page-<?=Request::segment(1);?>">
        @include('layouts/bascom/pages/inc/nav')
<?php if (\App\System\Session::isCmsUser()): ?>
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
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- page warp -->
        <div class="page" id="top">
        <!-- End Page Loader -->
        @include('flash::message')
        @yield('content')
            @yield('schedule-a-tour')
            @section('footer')
            	<!-- Footer -->
                @include('layouts/bascom/pages/inc/footer')
            	<!-- End Footer -->
            @show
            @yield('epop')
       </div><!-- end page warp -->
       @section('js')
        <!-- JS -->
        @yield('google-maps-js')
        <!-- <script type="text/javascript" src="/js/build/marketapts.concat.js?v=<?php echo uniqid() . time();?>"></script> -->
        <script type="text/javascript" src="/js/build/marketapts.min.js?<?php echo fileatime(public_path() . "/js/build/marketapts.min.js");?>"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
		@yield('page-specific-js')
        @show
    </body>
</html>
