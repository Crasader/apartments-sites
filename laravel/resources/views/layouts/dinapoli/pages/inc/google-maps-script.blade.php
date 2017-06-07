<!-- Google Map -->
<?php
$lat = $entity->getLatitude();
$long = $entity->getLongitude();

?>
<script type='text/javascript'>
	function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(<?php echo "$lat,$long";?>),scrollwheel:false,mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);iconBase='';marker = new google.maps.Marker({position: new google.maps.LatLng(<?php echo "$lat,$long"; ?>),gestureHandling: 'cooperative',map: map,icon: '<?php echo $entity->getWebPublicDirectory('template-common');?>/custom-marker.png'});infowindow = new google.maps.InfoWindow({content:'<?php echo "<strong>" . $entity->getLegacyProperty()->name . "</strong><br>" . $entity->getFullAddress();?>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
