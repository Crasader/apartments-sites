$(document).ready(function() {
	$(function() {
		// Use this example, or...
		$('a[rel="lightbox"]').lightBox(); // Select all links that contains lightbox in the attribute rel
	});
	
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

