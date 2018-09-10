// map taxonomy names with their IDs
const locationIndex = {
  'metro-vancouver-fraser-valley': 6,
  'vancouver-island': 7,
  'northern-bc': 8,
  'okanagan-interior-bc': 9
};

// container to keep track of open info windows on markers
let lastOpenWindow = new google.maps.InfoWindow({
  content: ''
});

// by default center on Vancouver
const vancouver = { lng: 49.2699305, lat: -123.0720043 };

// instantiate Google Maps
let map = {};

google.maps.event.addDomListener(window, 'load', () => {
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 9,
    center: new google.maps.LatLng(vancouver.lng, vancouver.lat)
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

    // Clear old values and declare arrays
    let postalCode = [],
      markers = [],
      infoWindows = [];

    // API call to decode address (portfolioLocation) to long/lat

    $.ajax({
      method: 'get',
      url: `https://maps.googleapis.com/maps/api/geocode/json?address=${portfolioLocation}`
    })
      .done(data => {
        let regionLng = data.results[0].geometry.location.lng;
        let regionLat = data.results[0].geometry.location.lat;
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
      .done(restData => {
        for (let property in restData) {
          postalCode[property] = restData[property].portfolio_zip.replace(
            /\s+/g,
            ''
          );
          $.ajax({
            method: 'get',
            url: `https://maps.googleapis.com/maps/api/geocode/json?address=${
              postalCode[property]
            }`
          })
            .done(apiData => {
              // @TODO: delete old markers on request
              //   if (typeof markers !== 'undefined') {
              //     for (let marker in markers) {
              //       markers[marker].setMap(null);
              //     }
              //   }

              // Add markers of property locations
              markers[property] = new google.maps.Marker({
                position: new google.maps.LatLng(
                  apiData.results[0].geometry.location.lat,
                  apiData.results[0].geometry.location.lng
                ),
                map: map,
                content: `<p class="marker-popup">${
                  restData[property].title.rendered
                }</p>`
              });
              infoWindows[property] = new google.maps.InfoWindow();
              // Add listener to open infoWindows on click
              google.maps.event.addListener(
                markers[property],
                'click',
                (() => {
                  return function() {
                    lastOpenWindow.close();

                    infoWindows[property].open(map, markers[property]);
                    infoWindows[property].setContent(markers[property].content);

                    lastOpenWindow = infoWindows[property];
                  };
                })(markers)
              );
            })
            .fail(() => ajaxFail());
        }
      })

      .fail(() => ajaxFail());
  });
});
