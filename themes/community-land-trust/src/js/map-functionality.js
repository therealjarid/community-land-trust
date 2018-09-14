// author: Jarid Warren
// <github.com/jaridwarren>
// <jaridwarren@gmail.com>

jQuery(document).ready(function($) {
  // @TODO: hand off API to client, remove key from git repo
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
    $('.fetch-property').removeClass('selected');
    $(this).toggleClass('selected');
    let termId = $(this).attr('id');

    // Clear old markers
    for (let marker in gMarkers) {
      gMarkers[marker].setMap(null);
    }
    gMarkers = [];
    gInfoWindows = [];

    // get postal codes matching the taxonomy id
    const foundBounds = await placeMarkers(termId);

    map.setZoom(calculateZoom(foundBounds));
    map.panTo({
      lat: getCenter(foundBounds.minLat, foundBounds.maxLat),
      lng: getCenter(foundBounds.minLng, foundBounds.maxLng)
    });
  });

  async function placeMarkers(termId) {
    // reset bound on each call
    let bounds = { minLat: 90, maxLat: 0, minLng: 180, maxLng: 0 };
    try {
      // get zip codes from REST api
      const restResult = await $.ajax({
        beforeSend: xhr => xhr.setRequestHeader('X-WP-Nonce', apiVars.nonce),
        url: `${
          apiVars.restUrl
        }wp/v2/portfolio?portfolio_location=${termId}&_embed`,
        method: 'GET'
      });

      // for each zip code
      for (let i = 0; i < restResult.length; i++) {
        // get image of property
        let propertyImage = '';
        if (typeof restResult[i]._embedded['wp:featuredmedia'] != 'undefined') {
          propertyImage = `<img src="${
            restResult[i]._embedded['wp:featuredmedia'][0].media_details.sizes
              .medium_large.source_url
          }" ></img>`;
        }

        let zipCode = restResult[i].portfolio_zip.replace(/\s+/g, '');
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
          content: `<a class="marker-link" href="${
            restResult[i].link
          }" ><div class="marker-popup">${
            restResult[i].title.rendered
          }${propertyImage}</div></a>`
        });

        // create infoWindow for each marker
        let infoWindow = new google.maps.InfoWindow({ maxWidth: 180 });

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
    styleWindow(infoWindow);
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

  function calculateZoom(bounds) {
    // see https://stackoverflow.com/questions/6048975/google-maps-v3-how-to-calculate-the-zoom-level-for-a-given-bounds
    // for more information
    const GLOBE_WIDTH = 256;
    let angle = bounds.maxLng - bounds.minLng;
    let angle2 = bounds.maxLat - bounds.minLat;
    let delta = -0.5;
    if (angle2 > angle) {
      angle = angle2;
      delta = 2.5;
    }
    if (angle < 0) {
      angle += 360;
    }

    return Math.floor(
      Math.log(($('#map-canvas').width() * 360) / angle / GLOBE_WIDTH) /
        Math.LN2 -
        delta
    );
  }

  function getCenter(min, max) {
    return (min + max) / 2;
  }

  function ajaxFail() {
    $('.error-message').addClass('ajax-error');
  }

  /*
  * The google.maps.event.addListener() event waits for
  * the creation of the infowindow HTML structure 'domready'
  * and before the opening of the infowindow defined styles
  * are applied.
  */
  function styleWindow(infoWindow) {
    google.maps.event.addListener(infoWindow, 'domready', function() {
      // Reference to the DIV which receives the contents of the infowindow using jQuery
      let iwOuter = $('.gm-style-iw');

      /* The DIV we want to change is above the .gm-style-iw DIV.
   * So, we use jQuery and create a iwBackground variable,
   * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
   */
      let iwBackground = iwOuter.prev();

      // hide arrow
      $('div:eq(0)', iwBackground).hide();
      $('div:eq(2)', iwBackground).hide();

      // Remove the background shadow DIV
      iwBackground.children(':nth-child(2)').css({ display: 'none' });

      // Remove the white background DIV
      iwBackground.children(':nth-child(4)').css({ display: 'none' });
    });
  }
});
