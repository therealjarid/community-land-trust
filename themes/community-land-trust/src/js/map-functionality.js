jQuery(document).ready(function($) {
  // @TODO: hand off API to client, remove key from git repo on handoff
  let googleKey = 'AIzaSyDhvBO_mzcQWohzRiHKmgdfzPrOw3Bu6mE';

  let map = {};

  // by default center on Vancouver
  const vancouver = { lng: 49.2699305, lat: -123.0720043 };
  google.maps.event.addDomListener(window, 'load', () => {
    map = new google.maps.Map($('#map-canvas')[0], {
      zoom: 9,
      center: new google.maps.LatLng(vancouver.lng, vancouver.lat)
    });
  });

  // container to keep track of open info windows on markers
  let lastOpenWindow = new google.maps.InfoWindow({
    content: ''
  });

  // Declare array of markers
  let gMarkers = [],
    gInfoWindows = [];

  // start of main
  $('.fetch-property').click(async function() {
    // set background color of only the selected button
    $('.fetch-property').css('background-color', 'white');
    $(this).css('background-color', '#bed73d');

    let termId = $(this).attr('data-id');

    // Clear old markers
    for (let i in gMarkers) {
      gMarkers[i].setMap(null);
    }
    gMarkers = [];
    gInfoWindows = [];

    // get postal codes matching the taxonomy id
    const foundBounds = await placeMarkers(termId);

    map.setCenter({
      lat: getCenter(foundBounds.minLat, foundBounds.maxLat),
      lng: getCenter(foundBounds.minLng, foundBounds.maxLng)
    });

    map.setZoom(getZoom(foundBounds));
  });

  async function placeMarkers(termId) {
    // reset bound on each call
    let bounds = { minLat: 90, maxLat: 0, minLng: 180, maxLng: 0 };
    try {
      // get zip codes from REST api
      const result = await $.ajax({
        beforeSend: xhr => xhr.setRequestHeader('X-WP-Nonce', apiVars.nonce),
        url: `${apiVars.restUrl}wp/v2/portfolio?portfolio_location=${termId}`,
        method: 'GET'
      });

      // for each zip code
      for (let i = 0; i < result.length; i++) {
        let zipCode = result[i].portfolio_zip.replace(/\s+/g, '');
        // decode postal code into lng/lat
        const markerResult = await $.ajax({
          method: 'get',
          url: `https://maps.googleapis.com/maps/api/geocode/json?address=${zipCode}&key=${googleKey}`
        });
        // get lng/lat for new marker
        let markerLat = markerResult.results[0].geometry.location.lat,
          markerLng = markerResult.results[0].geometry.location.lng;

        // add new marker
        let marker = new google.maps.Marker({
          position: new google.maps.LatLng(markerLat, markerLng),
          map: map,
          animation: google.maps.Animation.DROP,
          content: `<p class="marker-popup">${result[i].title.rendered}</p>`
        });

        // create infoWindow for each marker
        let infoWindow = new google.maps.InfoWindow();

        // store marker and infoWindow into global array
        gInfoWindows.push(infoWindow);
        gMarkers.push(marker);

        // Add listener to open infoWindow on click
        windowListener(marker, infoWindow);

        // update bounds
        bounds.minLat = Math.min(markerLat, bounds.minLat);
        bounds.maxLat = Math.max(markerLat, bounds.maxLat);
        bounds.minLng =
          Math.sign(markerLng) *
          Math.min(Math.abs(markerLng), Math.abs(bounds.minLng));
        bounds.maxLng =
          Math.sign(markerLng) *
          Math.max(Math.abs(markerLng), Math.abs(bounds.maxLng));
      }
      return bounds;
    } catch (e) {
      ajaxFail();
    }
  }

  function windowListener(marker, infoWindow) {
    google.maps.event.addListener(
      marker,
      'click',
      (() => {
        return function() {
          lastOpenWindow.close();
          infoWindow.open(map, marker);
          infoWindow.setContent(marker.content);
          lastOpenWindow = infoWindow;
        };
      })(marker)
    );
  }

  function getZoom(bounds) {
    const GLOBE_WIDTH = 256;
    let angle = bounds.maxLng - bounds.minLng;
    let angle2 = bounds.maxLat - bounds.minLat;
    if (angle2 > angle) {
      angle = angle2;
    }
    if (angle < 0) {
      angle += 360;
    }

    return Math.floor(
      Math.log(($('#map-canvas').width() * 360) / angle / GLOBE_WIDTH) /
        Math.LN2 -
        2
    );
  }

  function getCenter(min, max) {
    return (min + max) / 2;
  }

  function ajaxFail() {
    $('.map-and-buttons').append(
      '<p class="error-message">Please refresh the page and try again.</p>'
    );
  }
});
