// instantiate Google Maps
google.maps.event.addDomListener(window, 'load', gmapsResultsInitialize);

function gmapsResultsInitialize() {
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 10,
    center: new google.maps.LatLng(49.2699305, -123.0720043)
  });
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
    $.ajax({})
      .done(data => {
        // console.log(data);
      })

      .fail(() => {});

    // Zoom map on portfolioLocation

    // REST call to fetch property zip codes
    $.ajax({
      beforeSend: xhr => xhr.setRequestHeader('X-WP-Nonce', apiVars.nonce),
      url: `${apiVars.restUrl}wp/v2/posts/`,
      method: 'GET'
    })
      .done(data => {
        // console.log(data);
      })

      .fail(() => {});

    // Add pins of property locations
  });
});

// REST API to fetch postal code
// `https://maps.googleapis.com/maps/api/geocode/json?address=${postalCode}&key=AIzaSyDhvBO_mzcQWohzRiHKmgdfzPrOw3Bu6mE`
