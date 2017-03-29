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



});
