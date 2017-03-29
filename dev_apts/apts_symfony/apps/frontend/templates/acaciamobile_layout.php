<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Pheasant Run Apartments</title>
        <meta name="description" content="Pheasant Run Apartments" />
        <meta name="keywords" content="pheasant, run, apartments" />
        <meta id="viewport" name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, width=device-width" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/js/photos.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" media="all" href="/css/acaciamobile.css" />

        <script type="text/javascript">
       jQuery(document).ready(function() {
//        var venderPrefix = (jQuery.browser.webkit)  ? 'Webkit' :
//                   (jQuery.browser.mozilla) ? 'Moz' :
//                   (jQuery.browser.ms)      ? 'Ms' :
//                   (jQuery.browser.opera)   ? 'O' : '';
//        var ratio = jQuery(window).width() / jQuery('#mainContainer').width();
//        jQuery('#mainContainer').css(venderPrefix + 'Transform', 'scale(' + ratio + ')');
        var newWidth = jQuery(window).width();
        jQuery('.containerScale').css('font-size', newWidth+'px');

        //alert(jQuery(window).width());
        });
       </script>
    </head>
    <body>
<?php echo $sf_content ?>
  </body>
</html>
