var marker;

//Fills
//This uses jquery for selecting html elements, you can either use jquery in your project or change $("#coordinates") to document.getElementById(id)


//This just fills an input field with lat/lng where id=coordinates
function placeCoords(lat, lng) {
  $("#coordinates").val(lat+", "+lng);
}

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: {
      lat: -23.116667,
      lng: 132.133333
    },
    streetViewControl: true,
  });

  //If the input field comes prepopulated (from the query string or elsewhere) we have to put the inital marker
  if($("#coordinates").val().len != 0 && !marker){
    var coords = $("#coordinates").val().split(",");
    var latlng = new google.maps.LatLng(Number(coords[0]),Number(coords[1]))
    marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: 'Massacre Site'
    });
    map.center = latlng;
  }

    //This adds a listener to the map. It "listens" for an event (in this case right click).
    //When you rightclick on the map, it sends a "rightclick" event to all the listeners.
    //This event has a few properties, most importantantly the event.latlng.
    google.maps.event.addListener(map, "rightclick", function(event) {
      var lat = event.latLng.lat();
      var lng = event.latLng.lng();
      //If there isnt a marker, make one at the events latlng
      if(!marker){
        marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            title: 'Massacre Site'
          });
      }else{
        //if there is set its position.
        marker.setPosition(event.latLng);
      }
      // populate yor box/field with rounded lat, lng.
      //If you dont want the rounding, just remove the toFixed.
      placeCoords(lat.toFixed(3), lng.toFixed(3));
    });
  }