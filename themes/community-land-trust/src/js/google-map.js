google.maps.event.addDomListener(window, 'load', gmapsResultsInitialize);

function gmapsResultsInitialize() {
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 10,
    center: new google.maps.LatLng(49.2699305, -123.0720043)
  });
}

jQuery(document).ready(function($) {
  // `https://maps.googleapis.com/maps/api/geocode/json?address=${postalCode}&key=AIzaSyCSva0--zNZru1Uv8ykh8y9WnpqA64ivxk`
});
