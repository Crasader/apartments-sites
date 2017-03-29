 $(document).ready(function() {
//     var venderPrefix = (jQuery.browser.webkit)  ? 'Webkit' :
//                   (jQuery.browser.mozilla) ? 'Moz' :
//                   (jQuery.browser.ms)      ? 'Ms' :
//                   (jQuery.browser.opera)   ? 'O' : '';
//        var ratio = jQuery(window).width() / jQuery('#mainContainer').width();
//        jQuery('#mainContainer').css(venderPrefix + 'Transform', 'scale(' + ratio + ')');
 var newWidth = jQuery(window).width();
 jQuery('.containerScale').css('font-size', newWidth+'px');

 alert(jQuery(window).width());
 });

