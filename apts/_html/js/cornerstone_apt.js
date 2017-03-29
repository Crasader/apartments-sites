  WebFontConfig = {
    google: { families: [ 'Montserrat::latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

	jQuery(function($){
    	     $( '.menu-btn' ).click(function(){
    	     $('.responsive-menu').toggleClass('expand')
    	     })
        })

$(document).click(function(e) {
  //if the click has happend inside the mobile-nav-menu or mobile-nav-toggle then ignore it
  if (!$(e.target).closest('.menu-btn, .responsive-menu').length) {
  	if ($('.responsive-menu').hasClass('expand')){
  		$('.responsive-menu').toggleClass('expand')
    }
  }
})

$(function(){ // document ready
	$('.history_nav ol li').on('click',function(){
			$('.history_nav ol li').removeClass('historyActive');
			$(this).addClass('historyActive');
	});
});


$( document ).ready(function() {

	$(window).resize(function(){
			// If there are multiple elements with the same class, "main"
			$('.circleMask').each(function() {
					$(this).height($(this).width());
			});

	}).resize();

	$(window).trigger('resize');
});

$(document).ready(function() {
	
	$('input[title]').each(function() {
		if($(this).val() === '') {
			$(this).val($(this).attr('title'));	
		}
		
		$(this).focus(function() {
			if($(this).val() == $(this).attr('title')) {
				$(this).val('').addClass('focused');	
			}
		});
		$(this).blur(function() {
			if($(this).val() === '') {
				$(this).val($(this).attr('title')).removeClass('focused');	
			}
		});
	});
	
	
});
