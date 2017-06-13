<!-- Google Map -->
<?php
$lat = $entity->getLatitude();
$long = $entity->getLongitude();
?>
<script type='text/javascript'>
function init_map() {
	var myOptions = {
			zoom: 17,
			center: new google.maps.LatLng(<?php echo "$lat,$long";?>),
			scrollwheel: false,
			styles: [{
					featureType: "water",
					elementType: "geometry.fill",
					stylers: [{
							color: ""
					}]
			}, {
					featureType: "transit",
					stylers: [{
							color: ""
					}, {
							visibility: "off"
					}]
			}, {
					featureType: "road.highway",
					elementType: "geometry.stroke",
					stylers: [{
							visibility: "on"
					}, {
							color: ""
					}]
			},{
					featureType: "poi.business",
					elementType: "labels",
					stylers: [{
							visibility: "off"
					}]
			},{
					featureType: "road.highway",
					elementType: "geometry.fill",
					stylers: [{
							color: ""
					}]
			}, {
					featureType: "road.local",
					elementType: "geometry.fill",
					stylers: [{
							visibility: "on"
					}, {
							color: "#ffffff"
					}, {
							weight: 8
					}]
			}, {
					featureType: "road.local",
					elementType: "geometry.stroke",
					stylers: [{
							color: ""
					}]
			}, {
					featureType: "poi",
					elementType: "geometry.fill",
					stylers: [{
							visibility: "on"
					}, {
							color: "black"
					}]
			}, {
					featureType: "administrative",
					elementType: "geometry",
					stylers: [{
							color: ""
					}]
			}, {
					featureType: "road.arterial",
					elementType: "geometry.fill",
					stylers: [{
							color: ""
					}]
			}, {
					featureType: "road.arterial",
					elementType: "geometry.fill",
					stylers: [{
							color: ""
					}]
			}, {
					featureType: "landscape",
					elementType: "geometry.fill",
					stylers: [{
							visibility: "on"
					}, {
							color: ""
					}]
			}, {
					featureType: "road",
					elementType: "labels.text.fill",
					stylers: [{
							color: ""
					}]
			}, {
					featureType: "administrative",
					elementType: "labels.text.fill",
					stylers: [{
							visibility: "on"
					}, {
							color: ""
					}]
			},  {
					featureType: "road.arterial",
					elementType: "geometry.stroke",
					stylers: [{
							color: "#d6d6d6"
					}]
			}, {
					featureType: "road",
					elementType: "labels.icon",
					stylers: [{
							visibility: "on"
					}]
			}, {}, {
					featureType: "poi",
					elementType: "geometry.fill",
					stylers: [{
							color: ""
					}]
			}],
			mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);
	iconBase = '';
	marker = new google.maps.Marker({
			position: new google.maps.LatLng(<?php echo "$lat,$long"; ?>),
			gestureHandling: 'cooperative',
			map: map,
			icon: '<?php echo $entity->getWebPublicDirectory('template-common');?>/custom-marker.png'
	});
	infowindow = new google.maps.InfoWindow({
			content: "<?php echo "<strong>" . $entity->getLegacyProperty()->name . "</strong><br>" . $entity->getFullAddress();?>"
	});
	google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map, marker);
	});
	infowindow.open(map, marker);
}
google.maps.event.addDomListener(window, 'load', init_map);
</script>
