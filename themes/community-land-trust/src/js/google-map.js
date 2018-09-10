// map taxonomy names with their IDs
const locationIndex = {
  'metro-vancouver-fraser-valley': 6,
  'vancouver-island': 7,
  'northern-bc': 8,
  'okanagan-interior-bc': 9
};

// by default center on Vancouver
let regionLng = 49.2699305,
  regionLat = -123.0720043;

// instantiate Google Maps
let map = {};

google.maps.event.addDomListener(window, 'load', () => {
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 9,
    center: new google.maps.LatLng(regionLng, regionLat)
  });
});

function ajaxFail() {
  $('.map-and-buttons').append(
    '<p class="error-message">Please refresh the page and try again.</p>'
  );
}

// start of main
jQuery(document).ready(function($) {
  'use strict';
  $('.fetch-property').click(function() {
    // set background color of only the selected button
    $('.fetch-property').css('background-color', 'white');
    $(this).css('background-color', '#bed73d');

    let portfolioLocation = $(this)
      .text()
      .replace(/[^\w\s]/gi, '')
      .replace(/\s+/g, '-')
      .toLowerCase();

    // API call to decode address (portfolioLocation) to long/lat
    $.ajax({
      method: 'get',
      url: `https://maps.googleapis.com/maps/api/geocode/json?address=${portfolioLocation}`
    })
      .done(data => {
        regionLng = data.results[0].geometry.location.lng;
        regionLat = data.results[0].geometry.location.lat;
        // Set map on portfolioLocation
        map.setCenter({ lat: regionLat, lng: regionLng });
        map.setZoom(8);
      })

      .fail(() => ajaxFail());

    // REST call to fetch property zip codes, inside .done() another ajax call decodes the zip to lng/lat

    $.ajax({
      beforeSend: xhr => xhr.setRequestHeader('X-WP-Nonce', apiVars.nonce),
      url: `${apiVars.restUrl}wp/v2/portfolio?portfolio_location=${
        locationIndex[portfolioLocation]
      }`,
      method: 'GET'
    })
      .done(data => {
        let postalCode = [],
          marker = [];
        for (let property in data) {
          postalCode[property] = data[property].portfolio_zip.replace(
            /\s+/g,
            ''
          );
          $.ajax({
            method: 'get',
            url: `https://maps.googleapis.com/maps/api/geocode/json?address=${
              postalCode[property]
            }`
          })
            .done(data => {
              // Add markers of property locations
              marker[property] = new google.maps.Marker({
                position: new google.maps.LatLng(
                  data.results[0].geometry.location.lat,
                  data.results[0].geometry.location.lng
                ),
                map: map
              });
              // @TODO: add information windows for each marker
            })
            .fail(() => ajaxFail());
        }
      })

      .fail(() => ajaxFail());
  });
});

// REST API to fetch postal code
// `https://maps.googleapis.com/maps/api/geocode/json?address=${postalCode}&key=AIzaSyDhvBO_mzcQWohzRiHKmgdfzPrOw3Bu6mE`
