var rM = jQuery.noConflict();
var curSlideStatus = 'play';
var currentSlide = 0;

rM(document).ready(function() {
    DoCycle();
});

function DoCycle() {
 rM(".banner_home_wide_inner").cycle({
    containerResize: 1,
    width: 'fit',
    height:'fit',
    fit:           1,
    fx:           'scrollLeft',  // name of transition effect (or comma separated names, ex: fade,scrollUp,shuffle)
    timeout:       6000,   // milliseconds between slide transitions (0 to disable auto advance)
   // speed:         200,    // speed of the transition (any valid fx speed value)
    fit:           1,     // force slides to fit container
	slideResize: false,
    sync:          1
});
}

jQuery(document).ready(function() {
jQuery(function() {
    jQuery( "#dialog" ).dialog({
      autoOpen: false,
      modal: true
    });

    jQuery( "#opener" ).click(function() {
      jQuery( "#dialog" ).dialog( "open" );
    });
  });
});
