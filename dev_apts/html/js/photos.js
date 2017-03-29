jQuery.noConflict();
jQuery(document).ready(function() {
    var $boxes = jQuery(".photoItem"),
        $current = $boxes.first();

  jQuery(".photoItem").click(function() {
       var newPhoto = jQuery(this).attr('ref');

       jQuery('#currentPhoto').attr('src', newPhoto);
       //alert(jQuery('#currentPhoto').attr('src'));
  });

    jQuery(".photoNavRight").click(function() {
        //var newScroll = jQuery(".photoNavScroller").scrollLeft() + 20;
            $current = $current.next(".photoItem");
            if (!$current.length) {
                $current = $boxes.first();
            }
            jQuery(".photoNavScroller").stop().animate({scrollLeft: '+=60'}, 250);

  });

   jQuery(".photoNavLeft").click(function() {
        //var newScroll = jQuery(".photoNavScroller").scrollLeft() + 20;
            $current = $current.prev(".photoItem");
            if (!$current.length) {
                $current = $boxes.last();
            }

            jQuery(".photoNavScroller").stop().animate({scrollLeft: '-=60'}, 250);

  });

     var newWidth = jQuery(window).width();
     jQuery('.containerScale').css('font-size', newWidth+'px');

     //alert(jQuery(window).width());

	 jQuery.validator.addMethod("phoneCustom", function(phone_number, element) {
				phone_number = phone_number.replace(/\s+/g, "");
				return this.optional(element) || phone_number.length > 9 &&
				phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
		}, "<div class='error_shell'><div class='error_inner'>Please enter a valid phone number.</div></div>");

	 jQuery("#mContact").validate({
			 errorContainer: ".error_shell",
			 errorLabelContainer: ".error_inner",
			 errorElement: "div",
				rules: {
					firstname: "required",
					lastname: "required",
					email: {
						required: true,
						email: true
					},
					phone: {
						phoneCustom: true
					}
				},
				messages: {
					firstname: "<div class='error_shell'><div class='error_inner'>First Name Required</div></div>",
					lastname: "<div class='error_shell'><div class='error_inner'>Last Name Required.</div></div>",
					email: "<div class='error_shell'><div class='error_inner'>Email Invalid.</div></div>",
			 }
	 });

});




