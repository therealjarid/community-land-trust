jQuery(document).ready(function($) {
  // by default center on CLT
  const clt = { lng: 49.2699305, lat: -123.0720043 };
  let map = {};

  google.maps.event.addDomListener(window, 'load', () => {
    map = new google.maps.Map($('#map-canvas')[0], {
      zoom: 15,
      center: new google.maps.LatLng(clt.lng, clt.lat)
    });
    let marker = new google.maps.Marker({
      position: new google.maps.LatLng(clt.lng, clt.lat),
      map: map,
      animation: google.maps.Animation.DROP
    });
  });
});
