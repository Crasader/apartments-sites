
var placesMap = function(Lat, Lng, ApartmentIcon, MapElement) {


    /*
    if (this.__proto__.constructor !== placesMap) {
        return new placesMap(Lat, Lng, Icon, MapElement);
    }
    */

    var map;
    var loadCount = 0;
    //this.placesList = null;

    this.initialize = function () {

    var apartment = new google.maps.LatLng(Lat,Lng);

    map = new google.maps.Map(document.getElementById(MapElement), {
      center: apartment,
      zoom: 18
    });

    var request = {
      location: apartment,
      radius: 2000,
      types: ['store','school','restaurant',"campground","zoo","amusement_park","aquarium","bowling_alley","casino","movie_theater","night_club"]
    };
    //placesList = document.getElementById('places');

    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

    var marker = new google.maps.Marker({
      map: map,
      icon: ApartmentIcon,
      title: document.title,
      position: apartment
    });

    }

    function callback(results, status, pagination) {

        loadCount++;

    if (status != google.maps.places.PlacesServiceStatus.OK) {
      return;
    } else {
      createMarkers(results);

      if (pagination.hasNextPage && loadCount < 2) {
      google.maps.event.addListenerOnce(map, 'idle', function(){
        pagination.nextPage();
      });


      }
    }
    }

    var infoWindows = [];

    function closeAllInfoWindows() {
        for (var i=0;i<infoWindows.length;i++) {
            infoWindows[i].close();
        }
    }

    function pushInfoWindow(infowindow){
      infoWindows.push( infowindow );
    }

    function createMarkers(places){
    var infowindow = new google.maps.InfoWindow();

    google.maps.event.addListener(infowindow, 'domready', function() {
          pushInfoWindow(infowindow);
    });



    var bounds = new google.maps.LatLngBounds();

    for (var i = 0, place; place = places[i]; i++) {
    var markerIcon = null;

        if (place.types.indexOf("restaurant") != -1){
        markerIcon = "/images/restaurants.png";
        }

        if (place.types.indexOf("store") != -1){
        markerIcon = "/images/shopping.png";
        }

        if (place.types.indexOf("school") != -1){
        markerIcon = "/images/schools.png";
        }

        if (place.types.indexOf("campground") != -1){
        markerIcon = "/images/outdoor-activities.png";
        }

        if (place.types.indexOf("zoo") != -1){
        markerIcon = "/images/outdoor-activities.png";
        }

        if (place.types.indexOf("amusement_park") != -1){
        markerIcon = "/images/entertainment.png";
        }

        if (place.types.indexOf("aquarium") != -1){
        markerIcon = "/images/entertainment.png";
        }

        if (place.types.indexOf("bowling_alley") != -1){
        markerIcon = "/images/entertainment.png";
        }

        if (place.types.indexOf("casino") != -1){
        markerIcon = "/images/entertainment.png";
        }

        if (place.types.indexOf("night_club") != -1){
        markerIcon = "/images/entertainment.png";
        }

        if (place.types.indexOf("movie_theater") != -1){
        markerIcon = "/images/entertainment.png";
        }


      var image = {
        //url: place.icon,
        url:markerIcon,
        size: new google.maps.Size(35, 35),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(15, 15)
      };

      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      bounds.extend(place.geometry.location);



      function setInfoWindow(marker,place){

          google.maps.event.addListener(marker, 'click', function() {
              closeAllInfoWindows();
              //console.log(place);
             infowindow.setContent('<strong>'+place.name+'</strong><br /><span>'+place.vicinity+'</span>');
            /*infowindow.setContent('<span style="padding: 0px; text-align:left" align="left"><h5>' + place.name + '&nbsp; &nbsp; ' + place.rating
                            + '</h5><p>' + place.formatted_address + '<br />' + place.formatted_phone_number + '<br />' +
                            '<a  target="_blank" href=' + place.website + '>' + place.website + '</a></p>' );
            */
            infowindow.open(map, this);

          });
      }

      setInfoWindow(marker,place);


    }
    map.fitBounds(bounds);
    }


    google.maps.event.addDomListener(window, 'load', this.initialize);

  // Resize stuff...
  google.maps.event.addDomListener(window, "resize", function() {
     var center = map.getCenter();
     google.maps.event.trigger(map, "resize");
     map.setCenter(center);
  });

};
