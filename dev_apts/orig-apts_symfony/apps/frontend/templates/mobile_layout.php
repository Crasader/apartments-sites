<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
	<meta id="viewport" name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, width=device-width" />
	<?php if (has_slot('tracking-code')): ?>
		<?php include_slot('tracking-code') ?>
	<?php endif; ?>
  <script type="text/javascript">
     $(document).ready(function() {
//     var venderPrefix = (jQuery.browser.webkit)  ? 'Webkit' :
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
