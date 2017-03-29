var rM = jQuery.noConflict();
var curSlideStatus = 'play';
var currentSlide = 0;

rM(document).ready(function() {
    DoCycle();
});

function DoCycle() {
 rM(".banner_home_wide_inner").cycle({
    fx:           'scrollLeft',  // name of transition effect (or comma separated names, ex: fade,scrollUp,shuffle)
    timeout:       6000,   // milliseconds between slide transitions (0 to disable auto advance)
   // speed:         200,    // speed of the transition (any valid fx speed value)
    fit:           1,     // force slides to fit container
	slideResize: false,
    sync:          1
});
}
